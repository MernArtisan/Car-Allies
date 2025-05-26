<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{ 
    public function addToCart(Request $request)
    {
        // dd($request->all());
        $product = Product::with(['category', 'images', 'vendor.shipping'])->findOrFail($request->product_id);
        $primaryImage = $product->images->where('is_primary', 1)->first();
        $qty = max(1, (int) $request->input('qtybutton', 1));

        if ($product->qty <= 0) {
            return response()->json(['error' => 'This product is out of stock.'], 400);
        }

        $sessionKey = auth()->check() ? auth()->id() : session()->getId();
        $existingItem = Cart::session($sessionKey)->get($product->id);
        $action = 'added';

        if ($existingItem) {
            Cart::session($sessionKey)->update($product->id, [
                'quantity' => [
                    'relative' => true,
                    'value' => $qty
                ]
            ]);
            $action = 'updated';
        } else {
            Cart::session($sessionKey)->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $qty,
                'attributes' => [
                    'slug' => $product->slug,
                    'category' => $product->category->name ?? '',
                    'image' => $primaryImage ? asset('uploads/productImages/' . $primaryImage->image) : '',
                ],
                'associatedModel' => $product,
            ]);
        }

        return response()->json([
            'success' => $action === 'added' ? 'Product added to cart successfully!' : 'Quantity updated in cart!',
            'product' => [
                'name' => $product->name,
                'image' => $primaryImage ? asset('uploads/productImages/' . $primaryImage->image) : asset('default-image.jpg'),
                'action' => $action,
            ],
        ]);
    }








    public function cart()
    {
        $sessionKey = auth()->check() ? auth()->id() : session()->getId();
        $cart = Cart::session($sessionKey)->getContent();
        return view('web.cart.index', compact('cart'));
    }

    public function updateCart(Request $request)
    {
        // $sessionKey = auth()->check() ? auth()->id() : session()->getId();
        // $item = Cart::session($sessionKey)->get($request->id);

        // if (!$item) {
        //     return redirect()->back()->with('error', 'Item not found in cart');
        // }

        // if ($request->type === 'increase') {
        //     Cart::session($sessionKey)->update($request->id, [
        //         'quantity' => ['relative' => true, 'value' => 1]
        //     ]);
        // } elseif ($request->type === 'decrease') {
        //     if ($item->quantity > 1) {
        //         Cart::session($sessionKey)->update($request->id, [
        //             'quantity' => ['relative' => true, 'value' => -1]
        //         ]);
        //     } else {
        //         Cart::session($sessionKey)->remove($request->id);
        //     }
        // }

        // return redirect()->back()->with('success', 'Quantity updated successfully!');
        $sessionKey = auth()->check() ? auth()->id() : session()->getId();
        $item = \Cart::session($sessionKey)->get($request->id);

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }

        if ($request->type === 'increase') {
            \Cart::session($sessionKey)->update($request->id, [
                'quantity' => ['relative' => true, 'value' => 1]
            ]);
        } elseif ($request->type === 'decrease') {
            if ($item->quantity > 1) {
                \Cart::session($sessionKey)->update($request->id, [
                    'quantity' => ['relative' => true, 'value' => -1]
                ]);
            }else {
                // Don't remove, return error
                return response()->json([
                    'success' => false,
                    'message' => 'Minimum quantity is 1'
                ]);
            }
        }

        // Recalculate totals
        $cart = \Cart::session($sessionKey)->getContent();

        $subtotal = $cart->sum(fn($item) => $item->price * $item->quantity);

        $vendorIds = $cart->map(fn($item) => $item->associatedModel->vendor_id ?? null)->filter()->unique();

        $shipping = \App\Models\Vendor::whereIn('id', $vendorIds)
            ->with('shipping')
            ->get()
            ->sum(fn($vendor) => $vendor->shipping->shipping_cost ?? 0);

        $grandTotal = $subtotal + $shipping;

        $newItem = \Cart::session($sessionKey)->get($request->id);

        return response()->json([
            'success' => true,
            'qty' => $newItem->quantity ?? 0,
            'subtotal' => number_format($subtotal, 2),
            'shipping' => number_format($shipping, 2),
            'total' => number_format($grandTotal, 2),
        ]);
    }


    public function removeFromCart($rowId)
    {
        $sessionKey = auth()->check() ? auth()->id() : session()->getId();
        Cart::session($sessionKey)->remove($rowId);
        return redirect()->back()->with('success', 'Item removed from cart!');
    }
}
