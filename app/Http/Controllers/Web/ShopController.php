<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Service;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Review;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // ✅ Active categories for sidebar
        $categories = Category::where('status', 1)->get();

        // ✅ Product query base
        $productQuery = Product::where('status', 1);

        // ✅ Service query base (with vendor relation)
        $serviceQuery = Service::with('vendor')->where('status', 'active');

        // ✅ Product Filters
        if ($request->filled('category_id') && $request->category_id !== 'all') {
            $productQuery->where('category_id', $request->category_id);
        }

        if ($request->filled('min_price')) {
            $productQuery->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $productQuery->where('price', '<=', $request->max_price);
        }

        if ($request->filled('search')) {
            $productQuery->where('name', 'like', '%' . $request->search . '%');
        }

        // ✅ Service Filter
        if ($request->filled('service_search')) {
            $serviceQuery->where('name', 'like', '%' . $request->service_search . '%');
        }

        // ✅ Paginate both lists, keeping independent query strings
        $products = $productQuery
            ->orderBy('id', 'asc')
            ->paginate(9)
            ->appends($request->except('service_page'));

        $services = $serviceQuery
            ->paginate(6, ['*'], 'service_page')
            ->appends($request->except('page'));

        // ✅ Top rated products
        $topRatedProducts = Product::with('vendor', 'category', 'images', 'reviews')
            ->where('status', 1)
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take(3)
            ->get();

        return view('web.shop.index', compact(
            'products',
            'categories',
            'services',
            'topRatedProducts'
        ));
    }

    public function productDetails(string $slug)
    {
        $product = Product::with([
            'category:id,name',
            'images',
            'reviews' => function ($query) {
                $query->take(10)->orderBy('created_at', 'desc');
            },
            'reviews.user'
        ])
            ->where('slug', $slug)
            ->firstOrFail();


        $averageRating = round($product->reviews->avg('rating') ?? 0, 1);
        $reviewCount = $product->reviews->count();
        $topRatedProducts = Product::with('vendor', 'category', 'images', 'reviews')
            ->where('status', 1)
            ->withAvg('reviews', 'rating') // This calculates average rating
            ->orderByDesc('reviews_avg_rating')
            ->take(3)
            ->get();

        $relatedVendorProducts = Product::with('images')
            ->where('vendor_id', $product->vendor_id)
            ->where('id', '!=', $product->id)
            ->limit(5)
            ->get();
        return view('web.shop.detail', compact('product', 'averageRating', 'reviewCount', 'topRatedProducts', 'relatedVendorProducts'));
    }

    public function store(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        ProductReview::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'review' => $request->review,
            'image' => null,
        ]);

        return redirect()->back()->with('success', 'Thanks for your review!');
    }

    public function appointment($id)
    {
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Login First');
        }

        $service = Service::with([
            'vendor.availabilities' => function ($query) {
                $query->where('status', 'available');
            }
        ])->find($id);

        return view('web.shop.appointment', compact('service'));
    }
}
