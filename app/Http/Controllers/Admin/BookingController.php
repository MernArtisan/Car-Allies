<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $vendors = Vendor::where('status', 2)->get();

        $bookings = Booking::with('user', 'vendor', 'service', 'availability')
            ->orderBy('id', 'desc');

        if ($request->has('status') && $request->status != '') {
            $bookings->where('status', $request->status);
        }

        if ($request->has('vendor') && $request->vendor != '') {
            $bookings->where('vendor_id', $request->vendor);
        }

        if (auth()->user()->hasRole('vendor')) {
            $bookings->where('vendor_id', auth()->user()->vendor->id);
        }

        $bookings = $bookings->get();

        // ✅ THIS FIXES YOUR FILTER PROBLEM
        if ($request->ajax()) {
            return view('admin.booking.partials.booking_rows', compact('bookings'))->render();
        }

        return view('admin.booking.index', [
            'bookings' => $bookings,
            'vendors' => $vendors,
        ]);
    }


    public function show($id)
    {
        $booking = Booking::with('user', 'vendor', 'service', 'availability')->find($id);

        return view('admin.booking.show', compact('booking'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        // ✅ Fetch user from booking
        $user = $booking->user; // Ensure relation exists: $booking->user()

        if ($user && $user->fcm_token) {
            $firebasePath = base_path(config('services.firebase.credentials'));
            $factory = (new Factory)->withServiceAccount($firebasePath);
            $messaging = $factory->createMessaging();

            $title = 'Booking Status Updated';
            $body = "Your booking #{$booking->id} status is now '{$booking->status}'.";

            $message = CloudMessage::withTarget('token', $user->fcm_token)
                ->withNotification(Notification::create($title, $body));

            try {
                $messaging->send($message);
            } catch (\Throwable $e) {
                // Optional logging
                \Log::error("FCM Error: " . $e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Booking status updated and user notified!');
    }
}
