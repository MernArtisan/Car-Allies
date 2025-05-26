<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::where('status', 2)
            ->with('reviews')
            ->paginate(6); // paginate first

        // Add avg_rating to each vendor
        $vendors->getCollection()->transform(function ($vendor) {
            $vendor->avg_rating = round($vendor->reviews->avg('rating'), 1);
            return $vendor;
        });
        // return $vendors;
        return view('web.vendor.index', compact('vendors'));
    }

    public function show(Request $request, $id)
    {
        $vendor = Vendor::with('reviews')->findOrFail($id);
        $averageRating = round($vendor->reviews->avg('rating'), 1); // 1 decimal point
        // dd($averageRating);
        $totalReviews = $vendor->reviews->count();
        // return $vendor;
        $categories = Category::where('status', 1)->get();

        $productsQuery = Product::with('images', 'category', 'vendor')
            ->where('vendor_id', $id);

        if ($request->filled('search')) {
            $productsQuery->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('category_id') && $request->category_id !== 'all') {
            $productsQuery->where('category_id', $request->category_id);
        }

        if ($request->filled('min_price')) {
            $productsQuery->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $productsQuery->where('price', '<=', $request->max_price);
        }

        $products = $productsQuery->paginate(9)->withQueryString();

        $services = Service::where('vendor_id', $id)->paginate(5);

        $topRatedProducts = Product::with('vendor', 'category', 'images', 'reviews')
            ->where('status', 1)
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take(3)
            ->get();
        return view('web.vendor.show', compact('vendor', 'categories', 'products', 'services', 'topRatedProducts', 'averageRating', 'totalReviews'));
    }

    public function postVendorReview(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|min:10',
            'image' => 'nullable'
        ]);

        $vendor = Vendor::findOrFail($request->vendor_id);
        $review = $vendor->reviews()->create([
            'vendor_id' => $request->vendor_id,
            'rating' => $request->rating,
            'review' => $request->review,
            'user_id' => auth()->id()
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/vendorReviews'), $imageName);
            $review->update(['image' => $imageName]);
        }
        return redirect()->back()->with('success', 'Review submitted successfully');
    }
}
