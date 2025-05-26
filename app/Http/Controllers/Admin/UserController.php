<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $vendors = User::role('vendor')->whereHas('vendor', function ($query) {
            $query->where('status', 2);
        })->get();


        $RequestedVendors = User::role('vendor')->whereHas('vendor', function ($query) {
            $query->where('status', 1);
        })->get();



        $customers = User::role('user')->get();
        return view('admin.users.index', compact('customers', 'vendors', 'RequestedVendors'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        

        $rules = [
            'user_type' => 'required|in:user,vendor',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female,other',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($request->user_type === 'vendor') {
            $validator->sometimes('store_name', 'required|string|max:255', function ($input) {
                return $input->user_type === 'vendor';
            });
            $validator->sometimes('location', 'required|string|max:255', function ($input) {
                return $input->user_type === 'vendor';
            });
            $validator->sometimes('establish_since', 'required|date', function ($input) {
                return $input->user_type === 'vendor';
            });
            $validator->sometimes('description', 'required|string', function ($input) {
                return $input->user_type === 'vendor';
            });
        }

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            if ($request->user_type === 'vendor') {
                $role = Role::where('name', 'vendor')->first();
            } else {
                $role = Role::where('name', 'user')->first();
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'gender' => $request->gender,
            ]);

            $user->roles()->attach($role->id);

            if ($request->user_type === 'vendor') {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/vendors'), $imageName);
                }
                $vendor = Vendor::create([
                    'user_id' => $user->id,
                    'name' => $request->store_name,
                    'location' => $request->location,
                    'establish_since' => $request->establish_since,
                    'description' => $request->description,
                    'status' => 2,
                    'image' => $imageName,
                ]);
            }


            $password = $request->password;

            Mail::to($request->email)->send(new WelcomeEmail($request, $password));


            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User created successfully!',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(string $id)
    {
        $user = User::with([
            'vendor.products.images',
            'vendor.products.reviews',
            'vendor.services',
            'vendor.reviews',
        ])->find($id);

        if (!$user) {
            abort(404, 'User not found');
        }

        $totalProducts = 0;
        $totalServices = 0;
        $averageProductRating = 0;
        $averageVendorRating = 0;

        if ($user->hasRole('vendor')) {
            $totalProducts = $user->vendor->products->count();

            $totalServices = $user->vendor->services->count();

            $totalProductReviews = $user->vendor->products->flatMap(function ($product) {
                return $product->reviews;
            });
            $averageProductRating = $totalProductReviews->avg('rating') ?? 0;

            $averageVendorRating = $user->vendor->reviews->avg('rating') ?? 0;
        }

        return view('admin.users.show', compact(
            'user',
            'totalProducts',
            'totalServices',
            'averageProductRating',
            'averageVendorRating'
        ));
    }

    public function edit($id)
    {
        $user = User::with('vendor')->find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $rules = [
            'user_type' => 'required|in:user,vendor',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Ensure unique except for current user
            'password' => 'nullable|string|min:8', // Password is nullable for updates
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female,other',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($request->user_type === 'vendor') {
            $validator->sometimes('store_name', 'required|string|max:255', function ($input) {
                return $input->user_type === 'vendor';
            });
            $validator->sometimes('location', 'required|string|max:255', function ($input) {
                return $input->user_type === 'vendor';
            });
            $validator->sometimes('establish_since', 'required|date', function ($input) {
                return $input->user_type === 'vendor';
            });
            $validator->sometimes('description', 'required|string', function ($input) {
                return $input->user_type === 'vendor';
            });
        }

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Find the existing user by ID
            $user = User::findOrFail($id);

            // Determine role based on user type
            if ($request->user_type === 'vendor') {
                $role = Role::where('name', 'vendor')->first();
            } else {
                $role = Role::where('name', 'user')->first();
            }

            // Update user details
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password, // Update password if provided
                'user_type' => $request->user_type,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'gender' => $request->gender,
            ]);

            $user->roles()->sync([$role->id]);

            if ($request->user_type === 'vendor') {
                $vendor = Vendor::where('user_id', $user->id)->first();

                if ($vendor) {
                    if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $imageName = time() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('uploads/vendors'), $imageName);
                        $vendor->image = $imageName;
                    }

                    // Update vendor details
                    $vendor->update([
                        'name' => $request->store_name,
                        'location' => $request->location,
                        'establish_since' => $request->establish_since,
                        'description' => $request->description,
                        'status' => $request->status,
                        'lat' => $request->latitude,
                        'long' => $request->longitude
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Vendor record not found for this user.',
                    ], 404);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully!',
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function destroy(string $id)
    {
        try {
            $user = User::find($id);
            // return $user;
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
