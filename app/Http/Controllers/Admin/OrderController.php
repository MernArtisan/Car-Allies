<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification as ModelsNotification;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $query = Order::with('vendor');
        } else {
            $query = Order::with('vendor')->where('vendor_id', $user->vendor->id);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('vendor') && $request->vendor != '') {
            $query->where('vendor_id', $request->vendor);
        }

        $query->orderByRaw("CASE WHEN status = 'In Progress' THEN 1 ELSE 2 END")
            ->orderBy('created_at', 'desc');

        $orders = $query->get();
        $vendors = Vendor::where('status', 2)->get();

        return view('admin.order.index', compact('orders', 'vendors'));
    }


    public function show($orderId)
    {
        $order = Order::with('orderItems.product.images', 'vendor', 'payments')->find($orderId);
        // return $order;
        return view('admin.order.show', compact('order'));
    }



    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|string|in:completed,ready to deliver,packing,delivered',
        ]);

        $order->status = $request->status;
        $order->save();

        $user = $order->user;

        if ($user && $user->fcm_token) {
            $firebasePath = base_path(config('services.firebase.credentials'));
            $factory = (new Factory)->withServiceAccount($firebasePath);
            $messaging = $factory->createMessaging();
            $nofify = ModelsNotification::create([
                'user_id' => $user->id,
                'title' => 'Order Status Updated',
                'message' => "Your order #{$order->id} is now '{$order->status}'.",
                'notifyBy' => '..',
            ]);

            $message = CloudMessage::withTarget('token', $user->fcm_token)->withNotification(Notification::create($nofify->title, $nofify->message));
            try {
                $messaging->send($message);
            } catch (\Throwable $e) {
                \Log::error("FCM Error: " . $e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Order status updated and user notified!');
    }
}
