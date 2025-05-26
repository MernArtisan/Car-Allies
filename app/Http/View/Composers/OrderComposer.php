<?php

namespace App\Http\View\Composers;

use App\Models\Booking;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use App\Models\Order;

class OrderComposer
{
    public function compose(View $view)
    {
        $inProgressOrdersCount = 0;
        $inProgressBookingsCount = 0;

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasRole('vendor')) {
                $vendor = Vendor::where('user_id', $user->id)->first();

                if ($vendor) {
                    $inProgressOrdersCount = Order::where('status', '!=' ,'completed')
                        ->where('vendor_id', $vendor->id)
                        ->count();

                    $inProgressBookingsCount = Booking::where('status',  '!=' ,'completed')
                        ->where('vendor_id', $vendor->id)
                        ->count();
                }
            } else {
                $inProgressOrdersCount = Order::where('status', '!=' ,'completed')->count();
                $inProgressBookingsCount = Booking::where('status', '!=' ,'completed')->count();
            }
        }

        $view->with([
            'inProgressOrdersCount' => $inProgressOrdersCount,
            'inProgressBookingsCount' => $inProgressBookingsCount
        ]);
    }
}
