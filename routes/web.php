<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Welcome Route (Home Page)
Route::get('/', function () {
    return view('welcome');
});

// Default Jetstream route (optional, can override)
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Role-Based Dashboards (Protected by Roles Middleware)
Route::middleware(['auth', 'isAdmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth', 'isClient'])->get('/client/dashboard', function () {
    return view('client.dashboard');
})->name('client.dashboard');

Route::middleware(['auth', 'isOwner'])->get('/owner/dashboard', function () {
    return view('owner.dashboard');
})->name('owner.dashboard');

// Authenticated Session Routes (Login and Logout)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



// Client Routes
Route::middleware(['auth'])->prefix('client')->name('client.')->group(function () {
    // Property routes
    Route::get('/properties', [\App\Http\Controllers\Client\PropertyController::class, 'index'])
        ->name('properties.index');
    Route::get('/properties/{property}', [\App\Http\Controllers\Client\PropertyController::class, 'show'])
        ->name('properties.show');
    Route::get('/my-properties', [\App\Http\Controllers\Client\PropertyController::class, 'myProperties'])
        ->name('properties.my-properties');
    
    // Inquiry routes
    Route::post('/properties/{property}/inquiries', [\App\Http\Controllers\Client\InquiryController::class, 'store'])
        ->name('inquiries.store');
    Route::get('/inquiries', [\App\Http\Controllers\Client\InquiryController::class, 'index'])
        ->name('inquiries.index');
    Route::get('/inquiries/{inquiry}', [\App\Http\Controllers\Client\InquiryController::class, 'show'])
        ->name('inquiries.show');
});

Route::get('/test-route', function() {
    return "This is a test route";
});

// Add to routes/web.php
Route::get('/debug-properties', function() {
    return [
        'available_count' => App\Models\Property::where('status', 'available')->count(),
        'all_properties' => App\Models\Property::all()
    ];
});

// Add these right after your existing auth routes
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);