<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PropertyController; // ✅ Add this line

// 🏠 Home Route (Public Welcome Page)
Route::get('/', function () {
    return view('welcome');
});

//added
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
});


// 🧑‍💻 Default Jetstream Dashboard (Optional)
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// 🛡️ Authenticated Session Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Users Routes (Using resource controller)
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    

// Properties
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/pending', [PropertyController::class, 'pending'])->name('properties.pending');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
Route::post('/properties/{id}/approve', [PropertyController::class, 'approve'])->name('properties.approve');
Route::post('/properties/{id}/reject', [PropertyController::class, 'reject'])->name('properties.reject');

// Add routes for byType and byStatus
Route::get('/properties/type/{type}/{subtype}', [PropertyController::class, 'byType'])->name('properties.byType');
Route::get('/properties/status/{status}', [PropertyController::class, 'byStatus'])->name('properties.byStatus');
});




// 👤 Client Routes
Route::middleware(['auth', 'isClient'])->get('/client/dashboard', function () {
    return view('client.dashboard');
})->name('client.dashboard');

// 🏘️ Owner Routes
Route::middleware(['auth', 'isOwner'])->get('/owner/dashboard', function () {
    return view('owner.dashboard');
})->name('owner.dashboard');
