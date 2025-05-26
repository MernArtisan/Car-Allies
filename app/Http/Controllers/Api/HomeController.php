<?php

namespace App\Http\Controllers\Api;

use App\Events\NewContactCreated;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\HomeBanner;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Content;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\VendorReview;
use Exception;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\ProductReview;
use App\Models\Service;
use App\Models\User;
use App\Models\Availability;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function updateFcmToken(Request $request)
    {
        $request->validate([
            'fcm_token' => 'required|string',
            'lat' => 'required',
            'long' => 'required',
        ]);
        $user = auth()->user();
        $user->fcm_token = $request->fcm_token;
        $user->lat = $request->lat;
        $user->long = $request->long;
        $user->save();
        $NotificationCount = $user = Notification::where('user_id', $user->id)->where('seen', 0)->where('notifyBy', '!=', 'admin Contact')->count();
        return response()->json([
            'status' => true,
            'notification_count' => $NotificationCount,
            'message' => 'FCM token updated successfully!',
        ], 200);
    }

    public function seenNotification(Request $request)
    {
        $user = auth()->user();
        $notification = Notification::where('user_id', $user->id)->where('seen', 0)->get();
        $notification->each(function ($notification) {
            $notification->update([
                'seen' => 1,
            ]);
        });
        return response()->json([
            'status' => true,
            'message' => 'Notification has been seen'
        ], 200);
    }

    public function getNotification(Request $request)
    {
        $user = auth()->user();
        $notifications = Notification::where('user_id', $user->id)->get();

        $notifications = $notifications->map(function ($notification) {
            return [
                'id' => $notification->id,
                'message' => $notification->message,
                'notify' => $notification->notifyBy,
                'created_at' => Carbon::parse($notification->created_at)->diffForHumans(),  // Convert to "2 min ago" format
            ];
        });

        return response()->json([
            'status' => true,
            'data' => [
                'notifications' => $notifications,
            ]
        ], 200);
    }

    public function AuthUpdateProfile(Request $request)
    {
        try {
            $auth = auth()->user();

            // ✅ VENDOR PROFILE UPDATE
            if ($auth->hasRole('vendor')) {
                $vendor = Vendor::where('user_id', $auth->id)->first();
                if (!$vendor) {
                    return response()->json(['status' => false, 'message' => 'Vendor profile not found'], 404);
                }

                $vendor->name = $request->input('name', $vendor->name);
                $vendor->description = $request->input('description', $vendor->description);
                $vendor->establish_since = $request->input('establish_since', $vendor->establish_since);
                $vendor->location = $request->input('location', $vendor->location);

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '_' . $auth->id . '_vendor.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/vendors/'), $imageName);
                    $vendor->image = $imageName;
                }

                $vendor->save();
                return response()->json([
                    'status' => true,
                    'user' => [
                        'id' => $auth->id,
                        'role' => 'vendor',
                        'name' => $vendor->name,
                        'description' => $vendor->description,
                        'establish_since' => $vendor->establish_since,
                        'image' => $vendor->image ? asset('uploads/vendors/' . $vendor->image) : null,
                    ],
                    'message' => 'Vendor profile updated successfully',
                ]);
            }

            // ✅ USER PROFILE UPDATE
            $updateData = $request->only(['name', 'email']);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $auth->id . '_user.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/profileImage/'), $imageName);
                $updateData['image'] = $imageName;
            }

            $auth->update($updateData);

            return response()->json([
                'status' => true,
                'user' => [
                    'id' => $auth->id,
                    'role' => 'user',
                    'name' => $auth->name,
                    'email' => $auth->email,
                    'image' => $auth->image ? asset('uploads/profileImage/' . $auth->image) : null,
                ],
                'message' => 'Profile updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }


    public function getCategories()
    {
        $categories = Category::where('status', 1)->select('id', 'name')->get();
        return response()->json([
            'status' => true,
            'data' => $categories
        ]);
    }

    public function privacyPolicy()
    {
        try {
            $user = auth()->user();

            if ($user->hasRole('vendor')) {
                $privacy = Content::select('id', 'name', 'description')->where('name', 'Privacy Policy Vendors')->get();
            } else {
                $privacy = Content::select('id', 'name', 'description')->where('name', 'Privacy Policy Users')->get();
            }

            return response()->json([
                'status' => true,
                'Data' => $privacy,
                'Message' => 'Privacy Policy fetched successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ]);
        }
    }

    public function termsConditions()
    {
        try {
            $user = auth()->user();

            if ($user->hasRole('vendor')) {
                $terms = Content::select('id', 'name', 'description')->where('name', 'Terms & Condition Vendors')->get();
            } else {
                $terms = Content::select('id', 'name', 'description')->where('name', 'Terms & Condition Users')->get();
            }

            return response()->json([
                'status' => true,
                'Data' => $terms,
                'Message' => 'terms $& Condition fetched successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            $user = auth()->user();
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json(['error' => 'The current password is incorrect.']);
            }
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json(['message' => 'Password changed successfully'], 200);
        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ]);
        }
    }

    public function homebannerAndNearestVendors()
    {
        $homeBanner = HomeBanner::where('status', 1)->orderBy('id', 'desc')->get();

        if ($homeBanner->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No active banners found',
                'data' => [
                    'home_banner' => [],
                    'total' => 0
                ]
            ], 404);
        }

        $authUser = auth()->user();

        if (!$authUser || !$authUser->lat || !$authUser->long) {
            return response()->json([
                'status' => false,
                'message' => 'Authenticated user location not found',
            ], 400);
        }

        $latitude = $authUser->lat;
        $longitude = $authUser->long;

        $vendors = Vendor::selectRaw(
            "*, ( 6371 * acos( cos( radians(?) ) *
        cos( radians( lat ) ) *
        cos( radians( `long` ) - radians(?) ) +
        sin( radians(?) ) *
        sin( radians( lat ) ) )
    ) AS distance",
            [$latitude, $longitude, $latitude]
        )
            ->where('status', 2)
            ->orderBy('distance', 'asc')
            ->limit(4)
            ->get();

        if ($vendors->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No nearby vendors found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'home_banner' => $homeBanner->map(function ($homeBanner) {
                return [
                    'id' => $homeBanner->id,
                    'title' => $homeBanner->title,
                    'image' => asset('uploads/homebanners/' . $homeBanner->image),
                    'link' => $homeBanner->link,
                    'created_at' => $homeBanner->created_at->format('d-M-Y'),
                    'updated_at' => $homeBanner->updated_at->format('d-M-Y')
                ];
            }),
            'vendors' => $vendors->map(function ($vendor) {
                $avrageRating = $vendor->reviews()->avg('rating');
                return [
                    'id' => $vendor->id,
                    'name' => $vendor->name,
                    'image' => asset('uploads/vendors/' . $vendor->image),
                    'establish_since' => $vendor->establish_since,
                    'location' => $vendor->location,
                    'lat' => $vendor->lat,
                    'long' => $vendor->long,
                    'distance_km' => round($vendor->distance, 2) . ' KM',
                    'rating' => round($avrageRating, 2) ?? 0,
                ];
            })
        ]);
    }

    public function allVendors(Request $request)
    {
        $vendors = Vendor::with('reviews')->where('status', 2)->get();
        return response()->json([
            'status' => true,
            'vendors' => $vendors->map(function ($vendor) {
                $avrageRating = $vendor->reviews()->avg('rating');
                return [
                    'id' => $vendor->id,
                    'name' => $vendor->name,
                    'image' => asset('uploads/vendors/' . $vendor->image),
                    'establish_since' => $vendor->establish_since,
                    'location' => $vendor->location,
                    'lat' => $vendor->lat,
                    'long' => $vendor->long,
                    'distance_km' => round($vendor->distance, 2) . ' KM',
                    'rating' => round($avrageRating, 2) ?? 0,
                ];
            })
        ]);
    }

    public function allServices()
    {
        $services = Service::where('status', 'active')->get()->map(function ($service) {
            return [
                'id'          => $service->id,
                'vendorId'    => $service->vendor_id,
                'name'        => $service->name,
                'image'       => $service->image ? asset('serviceImage/' . $service->image) : asset('default.png'),
                'description' => $service->description,
                'type'        => $service->type,
                'price'       => $service->price,
            ];
        });

        return response()->json([
            'status'   => true,
            'services' => $services,
        ]);
    }


    public function vendor($id)
    {
        $vendor = Vendor::with(['reviews.user'])->find($id);
        if (!$vendor) {
            return response()->json([
                'error' => 'Vendor not found',
            ], 404);
        }
        $avrageRating = $vendor->reviews()->avg('rating');
        $user = auth()->user();

        return response()->json([
            'status' => true,
            'data' => [
                'id' => $vendor->id,
                'name' => $vendor->name,
                'image' => $vendor->image ? asset('uploads/vendors/' . $vendor->image) : asset('uploads/vendors/default.png'),
                'establish_since' => $vendor->establish_since,
                'location' => $vendor->location,
                'lat' => $vendor->lat,
                'long' => $vendor->long,
                'description' => $vendor->description,
                'rating' => round($avrageRating, 2) ?? 0,
                'products' => $vendor->products->map(function ($product) use ($user) {
                    $productImage = $product->images->first() ? asset('uploads/productImages/' . $product->images->first()->image) : asset('uploads/productImages/default.png');

                    $addedCart = $user ? $user->carts()->where('product_id', $product->id)->exists() : false;

                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'description' => $product->description,
                        'vendorName' => $product->vendor->name,
                        'categoryName' => $product->category->name,
                        'price' => $product->price,
                        'qty' => $product->qty,
                        'image' => $productImage,
                        'addedCart' => $addedCart,
                    ];
                }),
                'services' => $vendor->services->map(function ($service) {
                    return [
                        'id' => $service->id,
                        'name' => $service->name,
                        'image' => asset('serviceImage/' . $service->image),
                        'type' => $service->type,
                        'description' => $service->description,
                        'vendorName' => $service->vendor->name,
                        'price' => $service->price,
                    ];
                }),
            ],
        ]);
    }

    public function topRatedProducts()
    {
        $userId = auth()->id();

        $products = Product::with('vendor', 'category', 'images')
            ->where('status', 1)
            ->withCount(['orderItems as order_count' => function ($query) {
                $query->select(DB::raw('count(*)'));
            }])
            ->orderBy('order_count', 'desc')
            ->take(10)
            ->get();

        $products = $products->map(function ($product) use ($userId) {
            $productImage = $product->images->where('is_primary', 1)->first()
                ? asset('uploads/productImages/' . $product->images->where('is_primary', 1)->first()->image)
                : asset('uploads/productImages/default.png');

            $alreadyAddedToCart = $product->carts()->where('user_id', $userId)->exists();

            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'vendorName' => $product->vendor->name,
                'categoryName' => $product->category->name,
                'qty' => $product->qty,
                'image' => $productImage,
                'order_count' => $product->order_count,
                'addedCart' => $alreadyAddedToCart,
            ];
        });

        return response()->json([
            'status' => true,
            'data' => [
                'products' => $products,
                'total' => $products->count(),
            ],
        ]);
    }

    public function allProducts()
    {
        $products = Product::with('vendor', 'category', 'images')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $products = $products->map(function ($product) {
            $userId = auth()->id();
            $alreadyAddedToCart = $product->carts()->where('user_id', $userId)->exists();
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'vendorName' => $product->vendor->name,
                'categoryName' => $product->category->name,
                'qty' => $product->qty,
                'image' => $product->images->where('is_primary', 1)->first() ? asset('uploads/productImages/' . $product->images->where('is_primary', 1)->first()->image) : null,
                'addedCart' => $alreadyAddedToCart,
            ];
        });

        return response()->json([
            'status' => true,
            'data' => [
                'allProducts' => $products,
                'total' => $products->count(),
            ]
        ]);
    }

    public function productDetails($id)
    {
        $product = Product::with('vendor', 'category', 'images')->where('id', $id)->first();

        $vendorProducts = Product::with('images')
            ->where('vendor_id', $product->vendor_id)
            ->where('id', '!=', $product->id)
            ->limit(5)
            ->get();
        $totalSold = DB::table('order_items')
            ->where('product_id', $product->id)
            ->sum('quantity');

        $AvarageRating = $product->reviews()->avg('rating');
        $VendorAvarageRating = $product->vendor->reviews()->avg('rating');
        $productDetails = [
            'id' => $product->id,
            'name' => $product->name,
            'sold' => intval($totalSold),
            'customerRating' => round($AvarageRating, 2) ?? 0,
            'description' => $product->description,
            'price' => $product->price,
            'vendorId' => $product->vendor->id,
            'Establish' => $product->vendor->establish_since,
            'vendorName' => $product->vendor->name,
            'vendorImage' => asset('uploads/vendors/' . $product->vendor->image),
            'ratingVendor' => round($VendorAvarageRating, 2) ?? 0,
            'categoryName' => $product->category->name,
            'qty' => $product->qty,
            'images' => $product->images->map(function ($image) {
                return asset('uploads/productImages/' . $image->image);
            }),
            'estimated_delivery_time' => $product->estimated_time,
            'return_policy' => 'No return policy',
        ];

        $relatedProducts = $vendorProducts->map(function ($relatedProduct) {
            return [
                'id' => $relatedProduct->id,
                'name' => $relatedProduct->name,
                'price' => $relatedProduct->price,
                'vendorName' => $relatedProduct->vendor->name,
                'categoryName' => $relatedProduct->category->name,
                'image' => $relatedProduct->images->isNotEmpty()
                    ? asset('uploads/productImages/' . $relatedProduct->images->first()->image)
                    : null,
            ];
        });

        return response()->json([
            'status' => true,
            'data' => [
                'product' => $productDetails,
                'relatedProducts' => $relatedProducts,
            ],
        ]);
    }

    // public function addToCart(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|integer',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $product = Product::findOrFail($request->product_id);

    //     $cartItem = Cart::where('user_id', auth()->id())
    //         ->where('product_id', $product->id)
    //         ->first();
    //     if ($cartItem) {
    //         $cartItem->quantity += $request->quantity;
    //         $cartItem->save();
    //     } else {
    //         Cart::create([
    //             'user_id' => auth()->id(),
    //             'product_id' => $product->id,
    //             'quantity' => $request->quantity,
    //         ]);
    //     }
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Product added to cart successfully!',
    //         // 'cart' => Cart::where('user_id', auth()->id())->with('product')->get(),
    //     ]);
    // }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = auth()->id();
        $product = Product::with(['category', 'images', 'vendor.shipping'])->findOrFail($request->product_id);
        $qty = $request->quantity;

        if ($product->qty <= 0) {
            return response()->json([
                'status' => false,
                'message' => 'This product is out of stock.'
            ], 400);
        }

        $primaryImage = $product->images->where('is_primary', 1)->first();
        $imageUrl = $primaryImage
            ? asset('uploads/productImages/' . $primaryImage->image)
            : asset('default-image.jpg');

        // Check if already in cart
        $existing = \App\Models\Cart::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        $action = 'added';

        if ($existing) {
            $existing->quantity += $qty;
            $existing->save();
            $action = 'updated';
        } else {
            \App\Models\Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => $qty,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => $action === 'added'
                ? 'Product added to cart successfully!'
                : 'Cart item updated successfully!',
            'product' => [
                'name' => $product->name,
                'image' => $imageUrl,
                'action' => $action,
            ],
        ]);
    }


    public function getCart()
    {
        $cartItems = Cart::where('user_id', auth()->id())
            ->with(['product.images', 'product.vendor.shipping'])
            ->get();

        $uniqueVendorIds = [];
        $totalShippingCost = 0;
        $cartTotal = 0;

        $cartItems = $cartItems->map(function ($cartItem) use (&$uniqueVendorIds, &$totalShippingCost, &$cartTotal) {
            $product = $cartItem->product;
            $vendor = $product->vendor;

            $itemTotal = $product->price * $cartItem->quantity;
            $shippingCost = 0;

            // Only apply vendor shipping once
            if (!in_array($vendor->id, $uniqueVendorIds)) {
                $uniqueVendorIds[] = $vendor->id;

                if ($vendor->shipping && isset($vendor->shipping->shipping_cost)) {
                    $shippingCost = $vendor->shipping->shipping_cost;
                    $totalShippingCost += $shippingCost;
                }
            }

            $cartTotal += $itemTotal;

            return [
                'id' => $cartItem->id,
                'image' => $product->images->first()
                    ? asset('uploads/productImages/' . $product->images->first()->image)
                    : null,
                'productName' => $product->name,
                'vendorName' => $vendor->name ?? '',
                'quantity' => $cartItem->quantity,
                'price' => number_format($product->price, 2, '.', ''),
                'totalPrice' => number_format($itemTotal, 2, '.', ''),
                'shippingCost' => number_format($shippingCost, 2, '.', ''), // only once per vendor
            ];
        });

        $grandTotal = number_format($cartTotal + $totalShippingCost, 2, '.', '');

        return response()->json([
            'status' => true,
            'data' => [
                'cartItems' => $cartItems,
            ],
            'subtotal' => number_format($cartTotal, 2, '.', ''),
            'shippingCost' => number_format($totalShippingCost, 2, '.', ''),
            'grandTotal' => $grandTotal,
        ]);
    }



    public function deleteCartItem($cartItemId)
    {
        $cartItem = Cart::where('id', $cartItemId)
            ->where('user_id', auth()->id())
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json([
                'status' => true,
                'message' => 'Cart item deleted successfully.',
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Cart item not found.',
        ], 404);
    }

    public function updateCartQuantity(Request $request, $cartItemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('id', $cartItemId)->where('user_id', auth()->id())->first();

        if (!$cartItem) {
            return response()->json([
                'status' => false,
                'message' => 'Cart item not found or you do not have permission.'
            ], 404);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'status' => true,
            'message' => 'Cart item quantity updated successfully.'
        ]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'company_name' => 'nullable|string|max:255',
            'company_address' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            'order_notes' => 'nullable|string|max:1000',
            'address' => 'required|string|max:255',
            'transaction_id' => 'nullable|string|max:255',
        ]);

        $cartItems = Cart::where('user_id', auth()->id())
            ->with(['product.vendor.shipping'])
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['status' => false, 'message' => 'Your cart is empty']);
        }

        $groupedByVendor = $cartItems->groupBy(function ($item) {
            return $item->product->vendor->id;
        });

        $orderIds = [];
        $totalOrders = 0;

        foreach ($groupedByVendor as $vendorId => $items) {
            $vendor = $items->first()->product->vendor;

            $subtotal = $items->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            $shippingCost = $vendor->shipping->shipping_cost ?? 0;

            $lastOrder = Order::orderBy('id', 'desc')->first();
            $newOrderId = $lastOrder ? $lastOrder->id + 1 : 1;
            $uniqueOrderId = 'CAOI-' . str_pad($newOrderId, 6, '0', STR_PAD_LEFT);

            $order = Order::create([
                'user_id' => auth()->id(),
                'orderId' => $uniqueOrderId,
                'vendor_id' => $vendorId,
                'subtotal' => $subtotal,
                'shipping_cost' => $shippingCost,
                'grand_total' => $subtotal + $shippingCost,
                'status' => 'in-progress',
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip' => $request->zip,
                'order_notes' => $request->order_notes,
            ]);

            $orderIds[] = $order->id;
            $totalOrders++;

            foreach ($items as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product->id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                ]);

                $cartItem->product->decrement('qty', $cartItem->quantity);
            }

            Payment::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'vendor_id' => $vendorId,
                'amount' => $order->grand_total,
                'status' => 'paid',
                'payment_method' => 'online',
                'transaction_id' => $request->transaction_id,
                'paid_at' => now(),
            ]);
        }

        // Clear cart
        Cart::where('user_id', auth()->id())->delete();

        // FCM Tokens
        $customerFcmToken = auth()->user()->fcm_token;

        $vendorUserIds = $cartItems->pluck('product.vendor.user_id')->unique()->toArray();
        $vendorFcmTokens = User::whereIn('id', $vendorUserIds)
            ->pluck('fcm_token', 'id')
            ->filter()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Orders placed successfully',
            'fcm_tokens' => $vendorFcmTokens
        ]);
    }





    public function ManageOrders()
    {
        $user = Auth::user();

        if ($user->hasRole('vendor')) {
            $vendor = Vendor::where('user_id', $user->id)->first();

            if (!$vendor) {
                return response()->json(['error' => 'Vendor not found'], 404);
            }

            $orders = Order::with(['vendor.user', 'orderItems.product.images' => function ($query) {
                $query->where('is_primary', 1);
            }])->where('vendor_id', $vendor->id)->get();

            $serviceBookingd = Booking::where('vendor_id', $vendor->id)->get();

            $serviceBookingd = $serviceBookingd->map(function ($booking) {
                return [
                    'id' => $booking->id,
                    'name' => $booking->service ? $booking->service->name : 'Unknown Service',
                    'image' => $booking->service ? asset('serviceImage/' . $booking->service->image) : 'No Image',
                    'status' => $booking->status,
                    'UserName' => $booking->user ? $booking->user->name : 'Unknown User',
                    'vendor' => $booking->vendor ? $booking->vendor->name : 'Unknown Vendor',
                    'time_slot' => rtrim($booking->availability->time_slot, "\n"),
                ];
            });


            $orders = $orders->map(function ($order) {
                $orderItem = $order->orderItems->first();
                $product = $orderItem ? $orderItem->product : null;
                $primaryImage = $product ? $product->images->first() : null;
                return [
                    'id' => $order->id,
                    'orderId' => $order->orderId,
                    'productName' => $product ? $product->name : 'N/A',
                    'image' => $primaryImage ? asset('uploads/productImages/' . $primaryImage->image) : 'No Image',
                    'status' => $order->status,
                    'created_at' => $order->created_at->format('Y-m-d'),
                ];
            });
        } elseif ($user->hasRole('user')) {
            $orders = Order::with(['vendor.user', 'orderItems.product.images' => function ($query) {
                $query->where('is_primary', 1);
            }])->where('user_id', $user->id)->get();

            $serviceBookingd = Booking::where('user_id', $user->id)->get();

            $serviceBookingd = $serviceBookingd->map(function ($booking) {
                return [
                    'id' => $booking->id,
                    'name' => $booking->service ? $booking->service->name : 'Unknown Service',
                    'image' => $booking->service ? asset('serviceImage/' . $booking->service->image) : 'No Image',
                    'status' => $booking->status,
                    'UserName' => $booking->user ? $booking->user->name : 'Unknown User',
                    'vendor' => $booking->vendor ? $booking->vendor->name : 'Unknown Vendor',
                    'time_slot' => rtrim($booking->availability->time_slot, "\n"),
                ];
            });

            $orders = $orders->map(function ($order) {
                $orderItem = $order->orderItems->first();
                $product = $orderItem ? $orderItem->product : null;
                $primaryImage = $product ? $product->images->first() : null;

                return [
                    'id' => $order->id,
                    'orderId' => $order->orderId,
                    'productName' => $product ? $product->name : 'N/A',
                    'image' => $primaryImage ? asset('uploads/productImages/' . $primaryImage->image) : 'No Image',
                    'name' => $order->vendor ? $order->vendor->name : 'Unknown Vendor',
                    'status' => $order->status,
                    'created_at' => $order->created_at->format('Y-m-d'),
                ];
            });
        } else {
            return response()->json(['error' => 'Unauthorized access'], 403);
        }

        return response()->json([
            'status' => true,
            'data' => [
                'orders' => $orders,
                'serviceBookings' => $serviceBookingd,
            ]
        ]);
    }

    public function orderDetails($id)
    {
        $order = Order::with(['vendor.user', 'orderItems.product.images' => function ($query) {
            $query->where('is_primary', 1);
        }])->where('id', $id)->first();

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $orderItem = $order->orderItems->first();
        $product = $orderItem ? $orderItem->product : null;
        $primaryImage = $product ? $product->images->first() : null;
        $order->orderItems = $order->orderItems->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->product->name,
                'image' => $item->product->images->first() ? asset('uploads/productImages/' . $item->product->images->first()->image) : 'No Image',
                'quantity' => $item->quantity,
                'price' => $item->price,
            ];
        });
        return response()->json([
            'status' => true,
            'data' => [
                'order' => [
                    'id' => $order->id,
                    'orderId' => $order->orderId,
                    'orderDate' => $order->created_at->format('Y-m-d H:i:s'),
                    // 'productName' => $product ? $product->name : 'N/A',
                    // 'image' => $primaryImage ? asset('uploads/productImages/' . $primaryImage->image) : 'No Image',
                    'name' => $order->vendor ? $order->vendor->name : 'Unknown Vendor',
                    'orderItems' => $order->orderItems,
                    'deliveryAddress' => $order->address,
                    'subtotal' => $order->subtotal,
                    'shipingCost' => $order->shipping_cost,
                    'grandtotal' => $order->grand_total,
                    'status' => $order->status,
                ]
            ]
        ]);
    }

    public function updateOrderStatus($id)
    {
        $userId = auth()->id();
        $vendor = Vendor::where('user_id', $userId)->first();

        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found or unauthorized'], 403);
        }

        $order = Order::find($id);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        if ($order->vendor_id != $vendor->id) {
            return response()->json(['error' => 'Unauthorized: You do not own this order'], 403);
        }

        $statusFlow = [
            'in-progress' => 'packing',
            'packing' => 'ready to deliver',
            'ready to deliver' => 'delivered',
            'delivered' => 'completed',
        ];

        $currentStatus = $order->status;

        if (!array_key_exists($currentStatus, $statusFlow)) {
            return response()->json(['error' => 'Invalid status or no further update allowed'], 400);
        }

        $nextStatus = $statusFlow[$currentStatus];

        $order->status = $nextStatus;
        $order->save();

        $fcm_tokens = $order->user->fcm_token;

        return response()->json([
            'status' => true,
            'message' => 'Order status updated successfully!',
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'fcm_tokens' => $fcm_tokens,
            'orderStatus' => $order->status,
        ], 200);
    }

    public function fileDispute(Request $request, $orderId)
    {
        $order = Order::with(['user', 'vendor.user'])->find($orderId); // eager load both

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $request->validate([
            'dispute_reason' => 'required|string',
            'dispute_detail' => 'required|string',
        ]);

        $order->dispute_reason = $request->dispute_reason;
        $order->dispute_detail = $request->dispute_detail;
        $order->status = 'dispute';
        $order->save();

        return response()->json([
            'status' => true,
            'message' => 'Dispute filed successfully!',
            'order_id' => $order->id,
            'orderStatus' => $order->status,
            'fcm_tokens' => [
                'customer' => $order->user->fcm_token ?? null,
                'vendor' => $order->vendor && $order->vendor->user ? $order->vendor->user->fcm_token : null,
            ]
        ], 200);
    }


    public function searchBar(Request $request)
    {
        $response = [];

        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $productQuery = Product::query();
            $productQuery->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('slug', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('category', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%' . $searchTerm . '%');
                    });
            });

            $products = $productQuery->get();
            foreach ($products as $product) {
                $response[] = [
                    'id' => $product->id,
                    'image' => asset(path: 'uploads/productImages/' . $product->images->first()->image),
                    'name'  => $product->name . ' ' . $product->name,
                    'price'  => $product->price,
                    // 'category' => $product->category->name,
                    'type' => 'product',
                ];
            }

            $serviceQuery = Service::query();
            $serviceQuery->where('name', 'like', '%' . $searchTerm . '%');

            $services = $serviceQuery->get();
            foreach ($services as $service) {
                $response[] = [
                    'id' => $service->id,
                    'image' => asset('uploads/vendors/' . $service->vendor->image),
                    'name'  => $service->name,
                    'price'  => $service->price,
                    'type' => 'service',
                ];
            }


            $vendorQuery = Vendor::query();
            $vendorQuery->where('name', 'like', '%' . $searchTerm . '%');

            $vendorQuery = $vendorQuery->get();
            foreach ($vendorQuery as $vendor) {
                $response[] = [
                    'id' => $vendor->id,
                    'name'  => $vendor->name,
                    'image' => asset('uploads/vendors/' . $vendor->image),
                    'type' => 'Vendor',
                ];
            }
        }

        return response()->json($response);
    }

    public function filter(Request $request)
    {
        $type = $request->input('type');
        $categoryOrServiceType = $request->input('categoryOrServiceType');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $response = [];

        if ($type == 'product') {
            $productQuery = Product::query()->with(['vendor', 'category', 'images']);

            if ($categoryOrServiceType) {
                $productQuery->whereHas('category', function ($query) use ($categoryOrServiceType) {
                    $query->where('name', 'LIKE', '%' . $categoryOrServiceType . '%');
                });
            }

            if ($minPrice && $maxPrice) {
                $productQuery->whereBetween('price', [$minPrice, $maxPrice]);
            }

            $products = $productQuery->get();

            foreach ($products as $product) {
                $response[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'vendorName' => $product->vendor->name ?? '',
                    'type' => $product->category->name ?? '',
                    'filterType' => 'product',
                    'qty' => $product->qty,
                    'image' => $product->images->first()
                        ? asset('uploads/productImages/' . $product->images->first()->image)
                        : null,
                ];
            }
        } elseif ($type == 'service') {
            $serviceQuery = Service::query();

            if ($categoryOrServiceType) {
                $serviceQuery->where('type', $categoryOrServiceType);
            }

            if ($minPrice && $maxPrice) {
                $serviceQuery->whereBetween('price', [$minPrice, $maxPrice]);
            }

            $services = $serviceQuery->get();

            foreach ($services as $service) {
                $response[] = [
                    'id' => $service->id,
                    'name' => $service->name,
                    'image' => asset('uploads/vendors/' . $service->vendor->image),
                    'type' => $service->type,
                    'filterType' => 'service',
                    'price' => $service->price
                ];
            }
        }

        return response()->json([
            'status' => true,
            'data' => $response
        ]);
    }

    public function postProductReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp'
        ]);

        $product = Product::findOrFail($id);

        $review = $product->reviews()->create([
            'product_id' => $product->id,
            'rating' => $request->rating,
            'review' => $request->review,
            'user_id' => auth()->id()
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/productReviews'), $imageName);
            $review->update(['image' => $imageName]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Review submitted successfully',
            'data' => $review
        ], 201);
    }

    public function getProductReview($productId)
    {
        $product = Product::with(['reviews.user'])->findOrFail($productId);

        $averageRating = $product->reviews()->avg('rating');

        $ratingBreakdown = [
            5 => $product->reviews()->where('rating', 5)->count(),
            4 => $product->reviews()->where('rating', 4)->count(),
            3 => $product->reviews()->where('rating', 3)->count(),
            2 => $product->reviews()->where('rating', 2)->count(),
            1 => $product->reviews()->where('rating', 1)->count(),
        ];

        $reviews = $product->reviews->map(function ($review) {
            return [
                'user_name' => $review->user->name ?? 'Anonymous',
                'user_image' => $review->user->image ? asset('uploads/profileImage/' . $review->user->image) : asset('default.png'),
                'rating' => $review->rating,
                'review' => $review->review,
                'image' => $review->image ? asset('uploads/productReviews/' . $review->image) : asset('default.png'),
                'created_at' => $review->created_at->format('Y-m-d'),
            ];
        });

        return response()->json([
            'status' => true,
            'data' => [
                'average_rating' => round($averageRating, 1),
                'rating_breakdown' => $ratingBreakdown,
                'total_reviews' => $product->reviews->count(),
                'reviews' => $reviews
            ]
        ]);
    }

    public function postVendorReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp'
        ]);

        $vendor = Vendor::findOrFail($id);
        $review = $vendor->reviews()->create([
            'vendor_id' => $vendor->id,
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

        return response()->json([
            'status' => true,
            'message' => 'Review submitted successfully',
            'data' => $review
        ]);
    }

    public function getVendorReview($vendorId)
    {
        $vendor = Vendor::with(['reviews.user'])->findOrFail($vendorId);

        $averageRating = $vendor->reviews()->avg('rating');

        $ratingBreakdown = [
            5 => $vendor->reviews()->where('rating', 5)->count(),
            4 => $vendor->reviews()->where('rating', 4)->count(),
            3 => $vendor->reviews()->where('rating', 3)->count(),
            2 => $vendor->reviews()->where('rating', 2)->count(),
            1 => $vendor->reviews()->where('rating', 1)->count(),
        ];

        $reviews = $vendor->reviews->map(function ($review) {
            return [
                'user_name' => $review->user->name ?? 'Anonymous',
                'user_image' => $review->user->image ? asset('uploads/profileImage/' . $review->user->image) : asset('uploads/profileImage/default.png'),
                'rating' => $review->rating,
                'review' => $review->review,
                'image' => $review->image ? asset('uploads/vendorReviews/' . $review->image) : asset('uploads/profileImage/default.png'),
                'created_at' => $review->created_at->format('Y-m-d'),
            ];
        });

        return response()->json([
            'status' => true,
            'data' => [
                'average_rating' => round($averageRating, 1),
                'rating_breakdown' => $ratingBreakdown,
                'total_reviews' => $vendor->reviews->count(),
                'reviews' => $reviews
            ]
        ]);
    }

    public function getAvailableSlots($vendorId, Request $request)
    {
        try {

            $vendor = Vendor::find($vendorId);

            if (!$vendor) {
                return response()->json([
                    'status' => false,
                    'message' => 'Vendor not found',
                ], 404);
            }

            $date = $request->input('date');
            // return $date;
            $parsedDate = Carbon::parse($date)->setTimezone('UTC');
            // return $parsedDate;
            $startOfDay = $parsedDate->copy()->startOfDay();
            $endOfDay = $parsedDate->copy()->endOfDay();

            $availableSlots = Availability::where('vendor_id', $vendor->id)
                ->where('status', 'available')
                ->whereBetween('time_slot', [$startOfDay, $endOfDay])
                ->get();

            return response()->json([
                'status' => true,
                'available_slots' => $availableSlots,
                'date' => $parsedDate->format('Y-m-d'),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function BookSlot(Request $request)
    {
        try {
            $validated = $request->validate([
                'availability_id' => 'required|exists:availabilities,id',
                'note' => 'nullable|string',
                'amount' => 'required|numeric',
                'transaction_id' => 'required|string',
                'service_id' => 'required|string',
            ]);


            $userId = auth()->id();
            $availabilityId = $validated['availability_id'];
            $availability = Availability::where('id', $availabilityId)
                ->where('status', 'available')
                ->first();

            if (!$availability) {
                return response()->json(['error' => 'The selected slot is not available'], 400);
            }

            $booking = Booking::create([
                'user_id' => $userId,
                'vendor_id' => $availability->vendor_id,
                'service_id' => $validated['service_id'],
                'availability_id' => $availability->id,
                'date' => now()->format('Y-m-d'),
                'time_slot' => $availability->time_slot,
                'note' => $validated['note'] ?? null,
                'status' => 'confirmed',
            ]);

            Payment::create([
                'user_id' => $userId,
                'vendor_id' => $availability->vendor_id,
                'booking_id' => $booking->id,
                'amount' => $validated['amount'],
                'transaction_id' => $validated['transaction_id'],
                'paid_at' => now(),
                'status' => 'completed',
            ]);

            $availability->update(['status' => 'booked']);

            return response()->json([
                'status' => true,
                'message' => 'Booking created successfully',
                'fcm_token' => $availability->vendor->user->fcm_token,
                'booking' => $booking
            ]);
        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ]);
        }
    }


    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        $contact = Contact::create($request->all());

        // Trigger event for realtime notification
        event(new NewContactCreated($contact));

        return response()->json(['message' => 'Contact submitted successfully']);
    }


    public function Payments()
    {
        $userId = auth()->id();
        $vendor = Vendor::where('user_id', $userId)->first();

        if (!$vendor) {
            return response()->json([
                'status' => false,
                'message' => 'Vendor not found for this user.'
            ], 404);
        }

        $payments = Payment::where('vendor_id', $vendor->id)
            ->orderByDesc('id')
            ->get()
            ->map(function ($payment) {
                $cutAmount = round($payment->amount * 0.15, 2);
                $netAmount = round($payment->amount - $cutAmount, 2);

                return [
                    'id' => $payment->id,
                    'user_id' => $payment->user_id,
                    'vendor_id' => $payment->vendor_id,
                    'order_id' => $payment->order_id,
                    'booking_id' => $payment->booking_id,
                    'amount' => number_format($payment->amount, 2, '.', ''),
                    'cut_amount' => number_format($cutAmount, 2, '.', ''),
                    'net_amount' => number_format($netAmount, 2, '.', ''),
                    'status' => $payment->vendor_pay_status,
                    'type' => $payment->booking_id ? 'Booking' : 'Order',
                ];
            });

        $totalAmount = $payments->sum(function ($p) {
            return (float) str_replace(',', '', $p['amount']);
        });

        $totalEarning = $payments->sum(function ($p) {
            return (float) str_replace(',', '', $p['net_amount']);
        });

        return response()->json([
            'status' => true,
            'total_amount' => number_format($totalAmount, 2, '.', ''),
            'total_earning' => number_format($totalEarning, 2, '.', ''),
            'data' => $payments
        ]);
    }
}
