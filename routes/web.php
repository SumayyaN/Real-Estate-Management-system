<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Admin\AdminDashboardController;
// use App\Http\Controllers\Admin\PropertyController;
// use App\Http\Controllers\Admin\OwnerRequestController;

// // 🏠 Home Route (Public Welcome Page)
// Route::get('/', function () {
//     return view('welcome');
// });

// // 🧑‍💻 Default Jetstream Dashboard (Optional)
// Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// // 🛡️ Authenticated Session Routes
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
//     Route::post('/login', [AuthenticatedSessionController::class, 'store']);
// });

// Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// // Prefix the admin routes
// Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
//     // Dashboard Route
//     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

//     // Users Routes (Using resource controller)
//     Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->only(['index', 'create', 'store', 'edit', 'update']);

//     // Clients Route
//     Route::get('/clients', [AdminDashboardController::class, 'showClients'])->name('clients');

//     // Property Owners Route
//     Route::get('/property-owners', [AdminDashboardController::class, 'showPropertyOwners'])->name('property-owners');

//     // Properties
//     Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
//     Route::get('/properties/pending', [PropertyController::class, 'pending'])->name('properties.pending');
//     Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
//     Route::post('/properties/{id}/approve', [PropertyController::class, 'approve'])->name('properties.approve');
//     Route::post('/properties/{id}/reject', [PropertyController::class, 'reject'])->name('properties.reject');

//     // Add routes for byType and byStatus
//     Route::get('/properties/type/{type}/{subtype}', [PropertyController::class, 'byType'])->name('properties.byType');
//     Route::get('/properties/status/{status}', [PropertyController::class, 'byStatus'])->name('properties.byStatus');

//     // ✅ Owner Request Routes using resource controller
//     Route::resource('owner-requests', OwnerRequestController::class)->only([
//         'index', 'show', 'update'
//     ]);
// });

// // 👤 Client Routes
// Route::middleware(['auth', 'isClient'])->get('/client/dashboard', function () {
//     return view('client.dashboard');
// })->name('client.dashboard');

// // 🏘️ Owner Routes
// Route::middleware(['auth', 'isOwner'])->get('/owner/dashboard', function () {
//     return view('owner.dashboard');
// })->name('owner.dashboard');


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OwnerRequestController;
use App\Http\Controllers\Admin\UserController;

// 🏠 Home Route (Public Welcome Page)
Route::get('/', function () {
    return view('welcome');
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

// 🛠️ Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Users Management
    Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update']);

    // Clients & Property Owners
    Route::get('/clients', [AdminDashboardController::class, 'showClients'])->name('clients');
    Route::get('/property-owners', [AdminDashboardController::class, 'showPropertyOwners'])->name('property-owners');

    // Properties
    Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('/properties/pending', [PropertyController::class, 'pending'])->name('properties.pending');
    Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
    Route::post('/properties/{id}/approve', [PropertyController::class, 'approve'])->name('properties.approve');
    Route::post('/properties/{id}/reject', [PropertyController::class, 'reject'])->name('properties.reject');

    // Properties Filters
    Route::get('/properties/type/{type}/{subtype}', [PropertyController::class, 'byType'])->name('properties.byType');
    Route::get('/properties/status/{status}', [PropertyController::class, 'byStatus'])->name('properties.byStatus');

    // ✅ Owner Request Routes
    Route::resource('owner-requests', OwnerRequestController::class)->only([
        'index',
        'show',
        'update'
    ]);

    // ✅ Owner Request Actions
    Route::post('/owner-requests/{id}/approve', [OwnerRequestController::class, 'approve'])->name('owner-requests.approve');
    Route::post('/owner-requests/{id}/reject', [OwnerRequestController::class, 'reject'])->name('owner-requests.reject');
});

// 👤 Client Dashboard
Route::middleware(['auth', 'isClient'])->get('/client/dashboard', function () {
    return view('client.dashboard');
})->name('client.dashboard');

// 🏘️ Owner Dashboard
Route::middleware(['auth', 'isOwner'])->get('/owner/dashboard', function () {
    return view('owner.dashboard');
})->name('owner.dashboard');
