<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $vendor = Vendor::where('user_id', $user->id)->first();
                if ($vendor && $vendor->status == 1) {
                    return redirect()->route('admin.login')->with('error', 'Your account is on hold. Please wait for admin approval.');
                }
                if ($vendor && $vendor->status == 0) {
                    return redirect()->route('admin.login')->with('error', 'Your account has been suspended. Please contact admin.');
                }
            }

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Login Successful, ' . Auth::user()->name);
            }


            return redirect()->back()->with('error', 'Invalid Credentials');
        } catch (Exception $e) {
            Log::error($e);
            return back()->withErrors([
                'error' => 'There was an error processing your request. Please try again later.',
            ]);
        }
    }
}
