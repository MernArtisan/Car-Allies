<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session as LaravelSession;

class CheckoutController extends Controller
{
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->guest(route('login'))->with('error', 'Please login to proceed to checkout.');
        }
        $user = Auth::user();
        $cart = \Cart::session(auth()->check() ? auth()->id() : session()->getId())->getContent();
        $subtotal = $cart->sum(fn($item) => $item->price * $item->quantity);

        $vendorIds = $cart->map(fn($item) => $item->associatedModel->vendor_id ?? null)->filter()->unique();

        $shipping = \App\Models\Vendor::whereIn('id', $vendorIds)
            ->with('shipping')
            ->get()
            ->sum(fn($vendor) => $vendor->shipping->shipping_cost ?? 0);

        $grandTotal = $subtotal + $shipping;
        // return [
        //     'cart' => $cart,
        //     'subtotal' => $subtotal,
        //     'shipping' => $shipping,
        //     'grandTotal' => $grandTotal,
        //     'user' => $user,
        // ];
        // dd($cart);
        return view('web.checkout.index', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'grandTotal' => $grandTotal,
            'user' => $user,
        ]);
    }
    private function validateCheckoutData(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'company_name' => 'nullable|string|max:255',
            'company_address' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            'order_notes' => 'nullable|string|max:1000',
            'address' => 'required|string|max:255',
        ]);
    }

    public function checkoutStore(Request $request)
    {
        $form = $this->validateCheckoutData($request);

        $cart = Cart::session(auth()->id())->getContent();

        // Calculate total + vendor-wise shipping
        $subtotal = $cart->sum(fn($item) => $item->price * $item->quantity);
        $shippingCost = $cart->sum(function ($item) {
            return optional($item->associatedModel->vendor->shipping)->shipping_cost ?? 0;
        });

        $grandTotal = $subtotal + $shippingCost;

        // Save shipping cost in session for later use
        LaravelSession::put('checkout_data', [
            ...$form,
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'grand_total' => $grandTotal,
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $lineItems = $cart->map(function ($item) {
            return [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => $item->name],
                    'unit_amount' => $item->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
        })->values()->toArray(); // Fix array keys

        // Add shipping as a separate item
        if ($shippingCost > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => 'Shipping'],
                    'unit_amount' => $shippingCost * 100,
                ],
                'quantity' => 1,
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.cancel'),
            'customer_email' => $request->email,
        ]);

        return redirect($session->url);
    }

    public function stripeSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));

        if ($session->payment_status === 'paid') {
            $cart = Cart::session(auth()->id())->getContent();
            $data = LaravelSession::get('checkout_data');

            // Group items by vendor
            $groupedCart = $cart->groupBy(fn($item) => $item->associatedModel->vendor_id);

            foreach ($groupedCart as $vendorId => $items) {
                $subtotal = $items->sum(fn($item) => $item->price * $item->quantity);
                $shippingCost = optional($items->first()->associatedModel->vendor->shipping)->shipping_cost ?? 0;
                $grandTotal = $subtotal + $shippingCost;

                $lastOrder = Order::orderBy('id', 'desc')->first();
                $lastOrderId = $lastOrder ? $lastOrder->id : 0;
                $newOrderId = $lastOrderId + 1;
                $uniqueOrderId = 'CAOI-' . str_pad($newOrderId, 6, '0', STR_PAD_LEFT);

                $order = Order::create([
                    'user_id' => auth()->id(),
                    'orderId' => $uniqueOrderId,
                    'vendor_id' => $vendorId,
                    'subtotal' => $subtotal,
                    'shipping_cost' => $shippingCost,
                    'grand_total' => $grandTotal,
                    'status' => 'in-progress',
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'company_name' => $data['company_name'],
                    'company_address' => $data['company_address'],
                    'country' => $data['country'],
                    'state' => $data['state'],
                    'city' => $data['city'],
                    'zip' => $data['zip'],
                    'order_notes' => $data['order_notes'],
                ]);

                foreach ($items as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->id,
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                    ]);
                }
                Payment::create([
                    'user_id'        => auth()->id(),
                    'vendor_id'      => $vendorId,
                    'order_id'       => $order->id,
                    'status'         => 'paid',
                    'payment_method' => 'online',
                    'transaction_id' => $session->payment_intent,
                    'paid_at'        => now(),
                    'amount'         => $grandTotal, // ✅ include this line
                ]);
            }

            Cart::session(auth()->id())->clear();
            LaravelSession::forget('checkout_data');

            return view('web.order-success');
        }

        return redirect()->route('checkout')->with('error', 'Payment failed');
    }
}
