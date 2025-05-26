<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorReview;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function requestedVendors()
    {
        $vendors = Vendor::with('user')->where('status', [1])->get();
        // return $vendors;
        return view('admin.vendor.requested-vendors', compact('vendors'));
    }

    public function BlockedVendors()
    {
        $vendors = Vendor::with('user')->where('status', [0])->get();
        // return $vendors;
        return view('admin.vendor.blocked-vendors', compact('vendors'));
    }


    public function show(string $id)
    {
        $vendor = Vendor::with([
            'user',
        ])->find($id);

        // return $vendor;
        return view('admin.vendor.show', compact('vendor'));
    }



    public function changeStatus(Request $request, $id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return response()->json(['message' => 'Vendor not found'], 404);
        }

        $status = $request->input('status');

        if (!in_array($status, [0, 1, 2])) {
            return response()->json(['message' => 'Invalid status'], 400);
        }

        $vendor->status = $status;
        $vendor->save();

        return response()->json(['message' => 'Vendor status updated successfully'], 200);
    }

    public function index()
    {
        $vendorsReview = Vendor::with('reviews')->has('reviews')->get();
        // return $vendorsReview;
        return view('admin.vendor.review', compact('vendorsReview'));
    }
}
