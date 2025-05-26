<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class BookingStripeController extends Controller
{
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'user_id'         => 'required|exists:users,id',
            'vendor_id'       => 'required|exists:vendors,id',
            'service_id'      => 'required|exists:services,id',
            'availability_id' => 'required|exists:availabilities,id',
            'date'            => 'required|date',
            'time_slot'       => 'required|string',
            'note'            => 'nullable|string',
        ]);

        $service = \App\Models\Service::findOrFail($validated['service_id']);
        $amountInCents = intval($service->price * 100);

        // Save booking data to session
        $bookingData = $validated;
        $bookingData['amount'] = $service->price; // store real amount for later
        Session::put('booking_data', $bookingData);

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $stripeSession = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $service->name,
                        ],
                        'unit_amount' => $amountInCents,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripeBooking.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => url()->previous(),
            ]);

            return redirect($stripeSession->url);
        } catch (\Exception $e) {
            \Log::error('Stripe Checkout Error: ' . $e->getMessage());
            return back()->with('error', 'Stripe checkout failed.');
        }
    }

    public function success(Request $request)
    {
        $data = Session::get('booking_data');

        if (!$data) {
            return redirect('/')->with('error', 'Booking session expired.');
        }

        try {
            $booking = Booking::create([
                'user_id'         => $data['user_id'],
                'vendor_id'       => $data['vendor_id'],
                'service_id'      => $data['service_id'],
                'availability_id' => $data['availability_id'],
                'date'            => $data['date'],
                'time_slot'       => $data['time_slot'],
                'note'            => $data['note'],
                'status'          => 'confirmed',
            ]);

            Payment::create([
                'user_id'        => $data['user_id'],
                'vendor_id'      => $data['vendor_id'],
                'booking_id'     => $booking->id,
                'amount'         => $data['amount'], // coming from session
                'transaction_id' => $request->get('session_id'),
                'paid_at'        => now(),
                'status'         => 'completed',
            ]);

            Availability::where('id', $data['availability_id'])->update(['status' => 'booked']);

            Session::forget('booking_data');

            return view('web.booking-success');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Booking could not be completed.');
        }
    }
}
