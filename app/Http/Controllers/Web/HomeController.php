<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $lat = $request->input('lat');
        $lng = $request->input('long');
    
        $vendors = Vendor::with('reviews')
            ->where('status', 2)
            ->when($lat && $lng, function ($query) use ($lat, $lng) {
                $query->selectRaw("*, (6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(`long`) - radians(?)) + sin(radians(?)) * sin(radians(lat)))) AS distance", [$lat, $lng, $lat])
                    ->orderBy('distance');
            })
            ->take(6)
            ->get();
        $banners = HomeBanner::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        // $vendors = Vendor::with('reviews')->where('status', 2)->take(6)->get();

        // Get top 4 vendors by product quantity sold
        $topVendors = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereNotNull('orders.vendor_id')
            ->groupBy('orders.vendor_id')
            ->select('orders.vendor_id', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->orderByDesc('total_sold')
            ->take(4)
            ->get();

        $bestVendors = collect();

        foreach ($topVendors as $topVendor) {
            $vendor = Vendor::where('id', $topVendor->vendor_id)->first();

            if ($vendor) {
                $topProductIds = DB::table('order_items')
                    ->join('products', 'order_items.product_id', '=', 'products.id')
                    ->join('orders', 'order_items.order_id', '=', 'orders.id')
                    ->where('orders.vendor_id', $vendor->id)
                    ->groupBy('products.id')
                    ->select('products.id', DB::raw('SUM(order_items.quantity) as total_sold'))
                    ->orderByDesc('total_sold')
                    ->take(4)
                    ->pluck('id');

                $products = Product::with('images')
                    ->whereIn('id', $topProductIds)
                    ->get();

                $vendor->top_products = $products;
                $bestVendors->push($vendor);
            }
        }
        $testimonials = Vendor::where('status', 2)
            ->whereHas('reviews') // Only vendors having at least one review
            ->get()
            ->filter(function ($vendor) {
                // Load only one random review manually
                $vendor->setRelation('reviews', $vendor->reviews()->inRandomOrder()->limit(1)->get());
                return true;
            });

        return view('web.home.index', [
            'banners' => $banners,
            'vendors' => $vendors,
            'bestVendors' => $bestVendors,
            'testimonials' => $testimonials
        ]);
    }
}
