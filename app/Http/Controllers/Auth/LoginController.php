<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Contracts\LoginResponse;

class LoginController extends Controller
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
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Get the authenticated user
            $user = Auth::user();
            
            // Check if this is a new user (account created within last 5 minutes)
            $isNewUser = $user->created_at->gt(now()->subMinutes(5));
            
            // Prepare welcome message
            $welcomeMessage = $isNewUser 
                ? 'Welcome to EstatePro!'
                : 'Welcome back, ' . $user->name . '!';
            
            // Redirect based on role with welcome message
            $role = $user->role ?? null;
            
            return match ($role) {
                'admin' => redirect()->intended('/admin/dashboard')->with('welcome', $welcomeMessage),
                'owner' => redirect()->intended('/owner/dashboard')->with('welcome', $welcomeMessage),
                'client' => redirect()->intended('/client/properties')->with('welcome', $welcomeMessage),
                default => redirect()->intended('/dashboard')->with('welcome', $welcomeMessage),
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
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