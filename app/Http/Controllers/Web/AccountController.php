<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function orders()
    {
        $user = auth()->user();
        $orderCount = Order::where('user_id', $user->id)->count();
        $BookingCount = Booking::where('user_id', $user->id)->count();
        $orders = Order::where('user_id', $user->id)->get();
        return view('web.account.index', [
            'user' => $user,
            'orderCount' => $orderCount,
            'BookingCount' => $BookingCount,
            'orders' => $orders
        ]);
    }

    public function bookings()
    {
        $user = auth()->user();
        $bookings = Booking::where('user_id', $user->id)->get();
        $orderCount = Order::where('user_id', $user->id)->count();
        $BookingCount = Booking::where('user_id', $user->id)->count();
        return view('web.account.bookings', [
            'user' => $user,
            'orderCount' => $orderCount,
            'BookingCount' => $BookingCount,
            'bookings' => $bookings
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('web.account.profile', compact('user'));
    }

    public function editprofile()
    {
        $user = Auth::user();
        return view('web.account.editprofile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = Auth::user();

            // Validate fillable fields
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|integer',
                'country' => 'nullable|string',
                'state' => 'nullable|string',
                'city' => 'nullable|string',
                'zip' => 'nullable|string',
                'address' => 'nullable|string',
                'gender' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'about_me' => 'nullable|string',
            ]);
 
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
 
                $image->move(public_path('uploads/profileImage'), $imageName);
 
                $validatedData['image'] = $imageName;
            }
 
            $user->fill($validatedData);
            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Profile update failed: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update profile. Please try again.');
        }
    }
    public function resetpassword()
    {
        return view('web.account.resetpassword');
    }

    public function updatepassword(Request $request)
    {
        try {
            $user = Auth::user();
            $request->validate([
                'previous_password' => ['required'],
                'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            if (!Hash::check($request->previous_password, $user->password)) {
                return back()->withErrors(['previous_password' => 'Your current password does not match.']);
            }
            $user->update([
                'password' => Hash::make($request->new_password),
                'remember_token' => Str::random(60),
            ]);
            return redirect()->back()->with('success', 'Password updated successfully!');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function Itemsshow($orderId)
    {
        $user = Auth::user();
        $order = Order::with('orderItems.product.images', 'vendor', 'payments')->find($orderId);
        // return $order;
        return view('web.account.order_details', compact('order', 'user'));
    }

    public function wishlist()
    {
        $wishlists = Wishlist::with('product.images', 'product.wishlists')
        ->where('user_id', auth()->id())
        ->get();
    
        return view('web.account.wishlist', compact('wishlists'));
    }
    public function removewishlist($id)
    {
        $wishlist = Wishlist::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist.');
        }

        return redirect()->back()->with('error', 'Wishlist item not found.');
    }
}
