<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OwnerRequestController;
use App\Http\Controllers\Admin\UserController;

// 🏠 Home Route (Public Welcome Page)
Route::get('/', function () {
    return view('welcome');
});


// Support / Help Center
Route::get('/support', function () {
    return view('support');
})->name('support');

// Tenant Dashboard


// Owner Inquiry Actions
Route::post('/owner/inquiry/{inquiry}/respond', [OwnerController::class, 'respondToInquiry'])
    ->name('owner.inquiry.respond')
    ->middleware('auth');
Route::post('/owner/inquiry/{inquiry}/approve', [OwnerController::class, 'approveInquiry'])
    ->name('owner.inquiry.approve')
    ->middleware('auth');
Route::post('/owner/inquiry/{inquiry}/reject', [OwnerController::class, 'rejectInquiry'])
    ->name('owner.inquiry.reject')
    ->middleware('auth');

// Routes for tenant management
Route::get('/index', [TenantController::class, 'index'])->name('tenants.index');
Route::get('/owner/create', [TenantController::class, 'create'])->name('tenants.create');
Route::post('/owner', [TenantController::class, 'store'])->name('tenants.store');
Route::put('/owner/{inquiry}', [TenantController::class, 'update'])->name('tenants.update');

// Property Upload Form (Display and Submit)
Route::get('/upload', [UploadController::class, 'create'])->name('owner.upload');
Route::post('/upload', [UploadController::class, 'store'])->name('owner.upload.store');

// Property Resource Routes
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

// Default Jetstream Dashboard

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Role-Based Dashboards
Route::middleware(['auth', 'isAdmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

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


Route::middleware(['auth', 'isOwner'])->get('/owner/dashboard', [OwnerController::class, 'dashboard'])
    ->name('owner.dashboard');

// Authenticated Session Routes (Login and Logout)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// 🏘️ Owner Dashboard
Route::middleware(['auth', 'isOwner'])->get('/owner/dashboard', function () {
    return view('owner.dashboard');
})->name('owner.dashboard');

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/reports', [AdminDashboardController::class, 'reports'])->name('reports');
    Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('settings');
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

// Add these right after your existing auth routes
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);

