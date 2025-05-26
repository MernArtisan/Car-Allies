<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        $totalRevenue = Order::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('grand_total');

        $platformCommission = $totalRevenue * 0.15;
        $vendorsRevenue = $totalRevenue - $platformCommission;

        // Defaults
        $orders = 0;
        $ordersList = collect();
        $newBookings = 0;
        $totalOrders = 0;
        $vendorRevenue = 0;
        $vendorCommission = 0;
        $carAlliesCommission = 0;
        $vendorName = 'N/A';

        if ($user->hasRole('vendor')) {
            $orders = $this->getVendorOrders($user->id, $month, $year);
            $newBookings = $this->getVendorBookings($user->id, $month, $year, 'confirmed');

            $totalOrders = Order::whereHas('vendor', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->count();

            $vendorRevenue = Order::whereHas('vendor', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->sum('grand_total');

            $vendorCommission = $vendorRevenue * 0.85;
            $carAlliesCommission = $vendorRevenue * 0.15;

            $vendorName = optional($user->vendor)->name ?? 'N/A';
            $ordersList = $this->getVendorOrdersList($user->id, $month, $year);
        } else {
            $orders = Order::where('status', 'in-progress')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->orderBy('id', 'desc')
                ->count();

            $ordersList = Order::where('status', 'in-progress')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->orderBy('id', 'desc')
                ->get();

            $newBookings = Booking::where('status', 'confirmed')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->count();

            $totalOrders = Order::count();
            $carAlliesCommission = $platformCommission;
        }

        $totalBookings = Booking::count();
        $activeVendors = Vendor::where('status', 2)->count();
        $blockedVendors = Vendor::where('status', 0)->count();
        $requestedVendors = Vendor::where('status', 1)->count();
        $customers = User::role('user')->count();
        $contacts = Contact::where('seen', 0)->count();
        $totalAmount = Payment::where('status', 'paid')->sum('amount');

        return view('admin.dashboard', [
            'activeVendors' => $activeVendors,
            'blockedVendors' => $blockedVendors,
            'requestedVendors' => $requestedVendors,
            'customers' => $customers,
            'orders' => $orders,
            'newBookings' => $newBookings,
            'totalBookings' => $totalBookings,
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'platformCommission' => $platformCommission,
            'vendorsRevenue' => $vendorsRevenue,
            'vendorName' => $vendorName,
            'vendorRevenue' => $vendorRevenue,
            'vendorCommission' => $vendorCommission,
            'carAlliesCommission' => $carAlliesCommission,
            'month' => $month,
            'year' => $year,
            'ordersList' => $ordersList,
            'contacts' => $contacts,
            'totalAmount' => $totalAmount
        ]);
    }


    private function getVendorOrders($vendorId, $month, $year)
    {
        return Order::where('status', 'in-progress')
            ->whereHas('vendor', function ($query) use ($vendorId) {
                $query->where('user_id', $vendorId);
            })
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->count();
    }

    private function getVendorOrdersList($vendorId, $month, $year)
    {
        return Order::where('status', 'in-progress')
            ->whereHas('vendor', function ($query) use ($vendorId) {
                $query->where('user_id', $vendorId);
            })
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->get();
    }

    private function getVendorBookings($vendorId, $month, $year, $status)
    {
        return Booking::where('status', $status)
            ->whereHas('vendor', function ($query) use ($vendorId) {
                $query->where('user_id', $vendorId);
            })
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->count();
    }
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Successfully logged out');
    }

    public function profile()
    {
        $user = auth()->user();

        $vendor = Vendor::where('user_id', $user->id)->first();
        return view('admin.profile.index', compact('user', 'vendor'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'vendor_name' => 'nullable|string|max:255', // Add validation for vendor name
            'description' => 'nullable|string', // Add validation for description
            'lat' => 'nullable|numeric', // Add validation for latitude
            'long' => 'nullable|numeric', // Add validation for longitude
            'location' => 'nullable|string|max:255', // Add validation for location
        ]);

        // Update User Table
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        // Check if user is admin or vendor
        if ($user->hasRole('admin')) {
            // Update image in users table for admin
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/profileImage'), $imageName);
                $user->image = $imageName;
            }
        } elseif ($user->hasRole('vendor')) {
            // Update vendor details in vendors table
            $vendor = $user->vendor; // Assuming a relationship between User and Vendor

            // Update vendor name, description, lat, long, and location
            $vendor->name = $request->vendor_name;
            $vendor->description = $request->description;
            $vendor->lat = $request->lat;
            $vendor->long = $request->long;
            $vendor->location = $request->location;

            // Update image in vendors table for vendor
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/vendors'), $imageName);
                $vendor->image = $imageName;
            }

            $vendor->save();
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    public function PermissionDenied()
    {
        return view('admin.permission-denied');
    }

    public function markAllRead()
    {
        Contact::where('seen', 0)->update(['seen' => 1]);

        return response()->json(['success' => true, 'message' => 'All notifications marked as read']);
    }

    public function payments(Request $request)
    {
        $user = auth()->user();
        $tab = $request->input('tab', 'orders'); // default to orders
        $from = $request->input('from');
        $to = $request->input('to');
        $vendorFilter = $request->input('vendor_id');

        $orderQuery = Payment::with('user', 'vendor', 'order')->whereNotNull('order_id');
        $bookingQuery = Payment::with('user', 'vendor', 'booking.service', 'booking.availability')->whereNotNull('booking_id');

        if ($user->hasRole('admin')) {
            if ($vendorFilter) {
                $orderQuery->where('vendor_id', $vendorFilter);
                $bookingQuery->where('vendor_id', $vendorFilter);
            }
        } elseif ($user->hasRole('vendor')) {
            $vendorId = $user->vendor->id ?? null;
            $orderQuery->where('vendor_id', $vendorId);
            $bookingQuery->where('vendor_id', $vendorId);
        } else {
            abort(403);
        }

        if ($from && $to) {
            $orderQuery->whereBetween('created_at', [$from, $to]);
            $bookingQuery->whereBetween('created_at', [$from, $to]);
        }

        $orderPayments = $orderQuery->orderBy('id', 'desc')->get();
        $bookingPayments = $bookingQuery->orderBy('id', 'desc')->get();

        $vendors = $user->hasRole('admin') ? \App\Models\Vendor::pluck('name', 'id') : null;

        return view('admin.payments.index', compact('orderPayments', 'bookingPayments', 'vendors', 'tab', 'from', 'to', 'vendorFilter'));
    }


    public function markAsPaid(Payment $payment)
    {
        $payment->vendor_pay_status = 'paid';
        $payment->save();
        return back()->with('success', 'Payment marked as paid.');
    }
}
