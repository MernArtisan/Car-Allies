<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Step 1: Save guest cart before login
        $guestSessionId = session()->getId();
        $guestCart = Cart::session($guestSessionId)->getContent();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Step 2: Move guest cart items to user's cart
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

            Cart::session($guestSessionId)->clear();
            if ($user->hasRole('admin') || $user->hasRole('vendor')) {
                return redirect()->route('admin.dashboard')->with('success', 'Login Successful, ' . $user->name);
            }
            return redirect()->intended('/')->with('success', 'Login Successful, ' . Auth::user()->name);
            return redirect()->previous();
        }

        return back()->with('error', 'Invalid credentials.');
    }





    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout successful!');
    }
}
