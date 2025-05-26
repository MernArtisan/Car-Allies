<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Darryldecode\Cart\Facades\CartFacade as Cart;
class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Step 1: Save guest cart before register
        $guestSessionId = session()->getId();
        $guestCart = Cart::session($guestSessionId)->getContent();
    
        // Step 2: Validate user input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|string|max:20',
            'zip' => 'required|string|max:10',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ]);
    
        // Step 3: Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'zip' => $request->zip,
            'state' => $request->state,
            'city' => $request->city,
            'country' => $request->country,
        ]);
    
        // Step 4: Assign default role
        $user->assignRole('user');
    
        // Step 5: Auto login user
        Auth::login($user);
    
        // Step 6: Move guest cart items to this new user's cart
        foreach ($guestCart as $item) {
            Cart::session($user->id)->add([
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'attributes' => $item->attributes,
                'associatedModel' => $item->associatedModel,
            ]);
        }
    
        // Step 7: Clear guest cart
        Cart::session($guestSessionId)->clear();
    
        // Step 8: Redirect based on role
        if ($user->hasRole('admin') || $user->hasRole('vendor')) {
            return redirect()->route('admin.dashboard')->with('success', 'Welcome, ' . $user->name);
        }
    
        return redirect()->route('home.index')->with('success', 'Registered and logged in successfully!');
    }
    

    public function showRegisterVendorForm()
    {
        return view('auth.registerVendor');
    }

    public function registerVendor(Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:6',
                'country' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'zip' => 'nullable|digits:5',
                'phone' => 'nullable|string|min:10|max:15',
                'vendor_name' => 'required|string|max:255',
                'vendor_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2048',
                'vendor_location' => 'nullable|string|max:255',
                'vendor_lat' => 'nullable|numeric',
                'vendor_long' => 'nullable|numeric',
                'establish_since' => 'nullable',
                'description' => 'nullable|string',
            ])->validate();
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'] ?? null,
                'zip' => $validated['zip'] ?? null,
                'state' => $validated['state'] ?? null,
                'city' => $validated['city'] ?? null,
                'country' => $validated['country'] ?? null,
            ]);
            $vendor = new Vendor();
            $vendor->user_id = $user->id;
            $vendor->name = $validated['vendor_name'];
            $vendor->location = $validated['vendor_location'] ?? null;
            $vendor->lat = $validated['vendor_lat'] ?? null;
            $vendor->long = $validated['vendor_long'] ?? null;
            $vendor->establish_since = $validated['establish_since'] ?? null;
            $vendor->description = $validated['description'] ?? null;
            $vendor->status = 1;
            if ($request->hasFile('vendor_image')) {
                $image = $request->file('vendor_image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/vendors'), $imageName);
                $vendor->image = $imageName;
            }
            $vendor->save();
            $user->assignRole('vendor');
            DB::commit();
            return redirect()->route('home.index')->with('success', 'Vendor registered and logged in successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
