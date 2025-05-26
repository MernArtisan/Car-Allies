<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\SendForgotPasswordOTP;
use App\Models\Children;
use App\Models\Content;
use App\Models\ProfessionalProfile;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Stripe\Stripe;
use Stripe\Account;
// use Kreait\Firebase\Factory;
// use Kreait\Firebase\Messaging\CloudMessage;
// use Kreait\Firebase\Messaging\Notification;

class AuthController extends Controller
{
    // public function sendNotificationToUser($userId)
    // {
    //     $user = \App\Models\User::find($userId);

    //     if (!$user || !$user->fcm_token) {
    //         return response()->json(['error' => 'User or FCM token not found'], 404);
    //     }

    //     $firebaseCredentialsPath = config('services.firebase.credentials');

    //     $factory = (new Factory)
    //         ->withServiceAccount(base_path($firebaseCredentialsPath));

    //     $messaging = $factory->createMessaging();

    //     $message = CloudMessage::withTarget('token', $user->fcm_token)
    //         ->withNotification(Notification::create('Hello!', 'This is a notification from Laravel'));

    //     $messaging->send($message);

    //     return response()->json(['message' => 'Notification sent']);
    // }



    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:6',
                'country' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'zip' => 'nullable|digits:5',
                'phone' => 'nullable|string|min:10|max:15',
                'role' => 'nullable|string|in:user,vendor',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'zip' => $request->zip,
                'state' => $request->state,
                'city' => $request->city,
                'country' => $request->country
            ]);

            if ($request->role === 'user') {
                $role = Role::where('name', 'user')->first();
            }else{
                $role = Role::where('name', 'vendor')->first();
            }

            $user->roles()->attach($role->id);



            return response()->json([
                'status' => true,
                'message' => $request->role.' registered successfully',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while registering the user.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function vendorApply(Request $request)
    {
        try {
            // Use authenticated user
            $user = auth()->user();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized access.'
                ], 401);
            }

            // Validation
            $validator = Validator::make($request->all(), [
                'vendor_name'     => 'required|string|max:255',
                'vendor_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp',
                'vendor_location' => 'nullable|string|max:255',
                'vendor_lat'      => 'nullable|numeric',
                'vendor_long'     => 'nullable|numeric',
                'establish_since' => 'nullable',
                'description'     => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            // Create new vendor
            $vendor = new Vendor();
            $vendor->user_id = $user->id;
            $vendor->name = $request->vendor_name;

            if ($request->hasFile('vendor_image')) {
                $image = $request->file('vendor_image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/vendors'), $imageName);
                $vendor->image = $imageName;
            }

            $vendor->location        = $request->vendor_location;
            $vendor->lat             = $request->vendor_lat;
            $vendor->long            = $request->vendor_long;
            $vendor->establish_since = $request->establish_since;
            $vendor->description     = $request->description;
            $vendor->status          = 1;
            $vendor->save();

            return response()->json([
                'status'  => true,
                'message' => 'Vendor application submitted successfully.',
                'data'    => [
                    'id'               => $vendor->id,
                    'name'             => $vendor->name,
                    'image_url'        => $vendor->image ? asset('uploads/vendors/' . $vendor->image) : null,
                    'location'         => $vendor->location,
                    'lat'              => $vendor->lat,
                    'long'             => $vendor->long,
                    'establish_since'  => $vendor->establish_since,
                    'description'      => $vendor->description,
                    'status'           => $vendor->status,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'An error occurred while submitting vendor details.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'fcm_token' => 'required|string',
            'lat' => 'required',
            'long' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials.'
            ], 401);
        }

        $user->update([
            'fcm_token' => $request->fcm_token,
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        $user->image = $user->image
            ? asset('uploads/profileImage/' . $user->image)
            : asset('default.png');

        $adminDetails = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();

        if (!$adminDetails) {
            return response()->json([
                'status' => false,
                'message' => 'Admin not found!',
            ], 404);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        // Base user data
        $data = $user->only(['id', 'name', 'email', 'image', 'lat', 'long']);

        // If user is vendor, attach vendor-specific data
        if ($user->hasRole('vendor')) {
            $vendor = Vendor::where('user_id', $user->id)->first();

            $data['profile_created'] = $vendor ? true : false;
            $data['vendor_status'] = null;

            if ($vendor) {
                $data['Storeid'] = $vendor->id;
                $data['StoreName'] = $vendor->name;

                $data['vendor_status'] = match ((int)$vendor->status) {
                    2 => true,
                    1 => false,
                    0 => 'blocked',
                    default => null
                };
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Login successful!',
            'token' => $token,
            'adminEmail' => $adminDetails->email,
            'phone' => $adminDetails->phone,
            'data' => $data
        ]);
    }




    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found with this email.'
            ], 404);
        }

        // Generate OTP
        $otp = rand(1000, 9999);

        DB::table('password_reset_tokens')->updateOrInsert([
            'email' => $request->email
        ], [
            'token' => $otp,
            'created_at' => now(),
        ]);

        dispatch(new SendForgotPasswordOTP($request->email, $otp));

        return response()->json([
            'status' => true,
            'message' => 'OTP sent to your registered email.',
            'email' => $request->email,
            'otp' => $otp,
        ], 200);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string',
        ]);

        $otpCheck = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->otp,
        ])->first();
        if (!$otpCheck) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid OTP'
            ], 401);
        }
        return response()->json([
            'status' => true,
            'message' => 'OTP verified successfully!',
        ], 200);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status' => false,
                'error' => 'User not found with this email.'
            ]);
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Password reset successfully!',
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => 'User logged out successfully!'
        ]);
    }

    public function termsOfUse(Request $request)
    {
        $contents = Content::where('name', 'Terms Of Use App')->get();

        $cleanedContents = $contents->map(function ($content) {
            $content->description = strip_tags($content->description);
            return $content;
        });

        return response()->json([
            'status' => true,
            'data' => $cleanedContents
        ], 200);
    }
}
