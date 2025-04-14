<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}


// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth; // <-- Add this import

// class IsAdmin
// {
//     public function handle(Request $request, Closure $next)
//     {
//         if (Auth::check() && Auth::user()->role === 'admin') {
//             return $next($request);
//         }

//         return redirect('/'); // Redirect if not admin
//     }
// }
