<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('vendor')) {
            $products = Product::with('images', 'category', 'vendor','reviews')
                ->whereHas('vendor', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->orderBy('id', 'desc')->get();
        } else {
            $products = Product::with('images', 'category', 'vendor','reviews')->orderBy('id', 'desc')->get();
        }

        $totalSold = [];
        foreach ($products as $product) {
            $totalSold[$product->id] = DB::table('order_items')
                ->where('product_id', $product->id)
                ->sum('quantity');
        }

        $categories = Category::where('status', 1)->get();
        $vendors = Vendor::where('status', 2)->get();

        return view('admin.product.index', compact('products', 'totalSold', 'categories', 'vendors', 'user'));
    }


    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $vendor = Vendor::where('user_id', Auth::user()->id)->first();
        if (!$vendor) {
            return redirect()->back()->with('error', 'Vendor not found');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'shipping_price' => 'required|numeric|min:0',
            'estimated_time' => 'nullable|string|min:1',
            'qty' => 'required|integer|min:1',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $slug = $request->name;

        $lastProduct = Product::orderBy('id', 'desc')->first();
        $lastProductId = $lastProduct ? $lastProduct->id : 0;
        $newProductId = $lastProductId + 1;

        $prefix = 'SKU--';
        $uniqueSkuId = $prefix . '-' . str_pad($newProductId, 6, '0', STR_PAD_LEFT);

        $product = Product::create([
            'name' => $validated['name'],
            'shipping_price' => $validated['shipping_price'],
            'estimated_time' => $validated['estimated_time'],
            'slug' => $slug,
            'sku' => $uniqueSkuId,
            'qty' => $validated['qty'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'status' => 1,
            'vendor_id' => $vendor->id,
            'category_id' => $validated['category_id'],
        ]);

        if ($request->hasFile('images')) {
            $isFirstImage = true;
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = $image->move(public_path('uploads/productImages'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imageName,
                    'is_primary' => $isFirstImage ? 1 : 0,
                ]);
                $isFirstImage = false;
            }
        }
        return redirect()->back()->with('success', 'Product Created Successfully');
    }

    public function show(string $id)
    {
        $product = Product::with('images', 'category', 'vendor','reviews')->find($id);
        if ($product->id != $id) {
            return redirect()->back()->with('error', 'Product not found');
        }
        // return $product;
        return view('admin.product.show', compact('product'));
    }

    public function removeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|string',
            'product_id' => 'required|integer',
        ]);

        $image = ProductImage::where('image', $request->image)
            ->where('product_id', $request->product_id)
            ->first();

        if ($image) {
            $imagePath = public_path('uploads/productImages/' . $image->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Image ko folder se delete karo
            }

            // Image ko delete karo
            $image->delete();

            // Check karo ke agar yeh deleted image primary thi
            if ($image->is_primary == 1) {
                // Agle ya pehle available image ko primary bana do
                $nextImage = ProductImage::where('product_id', $request->product_id)
                    ->orderBy('id', 'asc')
                    ->first(); // Agla image dhoondho ya pehla image
                if ($nextImage) {
                    $nextImage->is_primary = 1; // Primary set karo
                    $nextImage->save();
                }
            }

            return response()->json(['success' => 'Image removed successfully']);
        }

        return response()->json(['error' => 'Image not found'], 404);
    }

    public function edit(string $id)
    {
        $product = Product::with('images', 'category', 'vendor')->find($id);
        if ($product->id != $id) {
            return redirect()->back()->with('error', 'Product not found');
        }
        $categories = Category::where('status', 1)->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::where('user_id', Auth::user()->id)->first();
        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

        $product = Product::where('id', $id)->where('vendor_id', $vendor->id)->first();
        if (!$product) {
            return response()->json(['error' => 'Product not found or does not belong to this vendor'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'shipping_price' => 'required|numeric|min:0',
            'estimated_time' => 'required|string|min:1',
            'qty' => 'required|integer|min:1',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $product->update([
            'name' => $validated['name'],
            'shipping_price' => $validated['shipping_price'],
            'estimated_time' => $validated['estimated_time'],
            'slug' => $request->name,
            'qty' => $validated['qty'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        if ($request->hasFile('images')) {
            // ProductImage::where('product_id', $product->id)->delete();

            $isFirstImage = true;
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = $image->move(public_path('uploads/productImages'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imageName,
                    'is_primary' => $isFirstImage ? 1 : 0,
                ]);
                $isFirstImage = false;
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Product Updated Successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        // dd($id);
        $orderItems = OrderItem::where('product_id', $id)->get();

        foreach ($orderItems as $orderItem) {
            $orderItem->delete();
        }

        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully');
        }
        return redirect()->back()->with('error', 'Product not found');
    }
}
