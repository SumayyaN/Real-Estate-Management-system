<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\OwnerRequestController;

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

// routes/web.php

Route::view('/', 'welcome')->name('welcome');

Route::get('/owner-request', [OwnerRequestController::class, 'create'])->name('owner.request.form');
Route::post('/owner-request', [OwnerRequestController::class, 'store'])->name('owner.request.submit');

Route::get('/', function () {
    return view('welcome'); // or whatever your home view is
})->name('home');