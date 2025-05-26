<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Booking;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Service;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function postAvailability(Request $request)
    {
        $user = Auth::user()->id;
        $vendor = Vendor::where('user_id', $user)->first();
        try {
            $validated = $request->validate([
                'time_slots' => 'required',
            ]);

            $timeSlots = is_array($validated['time_slots'])
                ? $validated['time_slots']
                : explode(',', $validated['time_slots']);

            foreach ($timeSlots as $slot) {
                $slot = trim($slot);

                try {
                    $startDateTime = Carbon::parse($slot);
                } catch (Exception $e) {
                    $startDateTime = $slot;
                }

                if ($startDateTime instanceof Carbon) {
                    $formattedSlot = $startDateTime->format('Y-m-d H:i:s.u');
                } else {
                    $formattedSlot = $startDateTime;
                }

                $existingSlot = Availability::where('vendor_id', auth()->id())
                    ->where('time_slot', $formattedSlot)
                    ->first();

                if ($existingSlot) {
                    $existingSlot->update([
                        'status' => 'available',
                        'updated_at' => now(),
                    ]);
                } else {
                    Availability::create([
                        'vendor_id' => $vendor->id,
                        'time_slot' => $formattedSlot,
                        'status' => 'available',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            return response()->json(['status' => true, 'message' => 'Slots processed successfully!']);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
    public function servicesStore(Request $request)
    {
        $user = Auth::user()->id;
        $vendor = Vendor::where('user_id', $user)->first();
        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('serviceImage'), $imageName);
            $validated['image'] = $imageName;
        }
        $service = Service::create([
            'vendor_id' => $vendor->id,
            'name' => $validated['name'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image' => $validated['image'],
            'status' => 'active',
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Service added successfully',
            'data' => $service
        ]);
    }
    public function servicesEdit(Request $request, $id)
    {
        $user = Auth::user()->id;
        $vendor = Vendor::where('user_id', $user)->first();

        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

        $service = Service::where('vendor_id', $vendor->id)->find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'status' => 'required|string|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('serviceImage'), $imageName);
            $validated['image'] = $imageName;
        }

        $service->update($validated);

        return response()->json(['status' => true, 'message' => 'Service updated successfully']);
    }


    public function servicesShow($id)
    {
        $service = Service::find($id);
    
        if ($service) {
            return response()->json([
                'status' => true,
                'service' => [
                    'id' => $service->id,
                    'vendorId' => $service->vendor_id, // ✅ custom key
                    'image' => asset('serviceImage/' . $service->image),
                    'description' => $service->description,
                    'name' => $service->name,
                    'type' => $service->type,
                    'status' => $service->status,
                    'price' => $service->price,
                    'created_at' => $service->created_at,
                    'updated_at' => $service->updated_at,
                ]
            ]);
        }
    
        return response()->json([
            'status' => false,
            'message' => 'Service not found'
        ]);
    }




    public function servicesDelete($id)
    {
        $user = Auth::user()->id;
        $vendor = Vendor::where('user_id', $user)->first();

        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

        $service = Service::where('vendor_id', $vendor->id)->find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $service->delete();

        return response()->json(['status' => true, 'message' => 'Service deleted successfully']);
    }
    public function productsStore(Request $request)
    {
        $vendor = Vendor::where('user_id', Auth::user()->id)->first();
        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
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

        return response()->json(['status' => true, 'message' => 'Product added successfully']);
    }
    public function productsEdit(Request $request, $id)
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
            'estimated_time' => 'required|string|min:1',
            'qty' => 'required|integer|min:1',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $product->update([
            'name' => $validated['name'],
            'estimated_time' => $validated['estimated_time'],
            'slug' => $request->name,
            'qty' => $validated['qty'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        if ($request->hasFile('images')) {
            ProductImage::where('product_id', $product->id)->delete();

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

        return response()->json(['status' => true, 'message' => 'Product updated successfully']);
    }
    public function productsDelete($id)
    {
        $vendor = Vendor::where('user_id', Auth::user()->id)->first();
        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

        $product = Product::where('id', $id)->where('vendor_id', $vendor->id)->first();
        if (!$product) {
            return response()->json(['error' => 'Product not found or does not belong to this vendor'], 404);
        }

        $product->delete();

        ProductImage::where('product_id', $product->id)->delete();

        return response()->json(['status' => true, 'message' => 'Product deleted successfully']);
    }
    public function markAsCompleted($id)
    {
        $booking = Booking::with('user')->find($id); // eager load user

        if (!$booking) {
            return response()->json([
                'status' => false,
                'message' => 'Booking not found.'
            ], 404);
        }

        $booking->status = 'completed';
        $booking->save();

        $user = $booking->user;

        return response()->json([
            'status' => true,
            'message' => 'Booking status updated to completed.',
            'booking' => [
                'id' => $booking->id,
                'user_id' => $booking->user_id,
                'vendor_id' => $booking->vendor_id,
                'service_id' => $booking->product_id ?? null,
                'availability_id' => $booking->availability_id ?? null,
                'date' => $booking->date,
                'time_slot' => $booking->time,
                'note' => $booking->note ?? null,
                'status' => $booking->status,
                'fcm_token' => $user->fcm_token ?? null
            ]
        ], 200);
    }
}
