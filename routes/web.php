<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantController;

// Welcome Route (Home Page)
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