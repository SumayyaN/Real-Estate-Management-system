<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this import

class IsClient
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is a client
        if (Auth::check() && Auth::user()->role === 'client') {
            return $next($request);
        }

        return redirect('/');  // Redirect if not a client
    }
}
