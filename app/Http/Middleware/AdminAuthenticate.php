<?php

// app/Http/Middleware/AdminAuthenticate.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login'); // user not logged in
        }

        if (Auth::user()->hasRole('user')) {
            // Redirect to homepage or user dashboard to break redirect loop
            return redirect()->route('home.index')->with('error', 'Unauthorized access.');
        }

        // Only admin/vendor/etc can pass
        return $next($request);
    }
}
