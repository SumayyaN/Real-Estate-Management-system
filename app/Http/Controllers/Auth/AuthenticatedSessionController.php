<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Contracts\LoginResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login'); // Or wherever you handle the login view
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|LoginResponse
     */
    public function store(Request $request)
    {
        $this->validateLogin($request);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // If login is successful, redirect user based on role
            $role = Auth::user()->role ?? null;

            return match ($role) {
                'admin' => redirect()->intended('/admin/dashboard'),
                'owner' => redirect()->intended('/owner/dashboard'),
                'client' => redirect()->intended('/client/dashboard'),
                default => redirect()->intended('/dashboard'),
            };
        }

        // If login failed, redirect back with an error
        return back()->withErrors([
            'email' => trans('auth.failed'),
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::logout();

        // Redirect after logout
        return redirect('/');
    }

    /**
     * Validate the user's login credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
    }
}
