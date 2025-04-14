<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this import

class IsOwner
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is a property owner
        if (Auth::check() && Auth::user()->role === 'owner') {
            return $next($request);
        }

        return redirect('/');  // Redirect if not owner
    }
}
