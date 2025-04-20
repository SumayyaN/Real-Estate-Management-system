<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View; // 👈 Needed for View::share and View::composer
use App\Models\User; // 👈 Needed to access User model
use App\Models\OwnerRequest; // 👈 Needed for pendingRequestsCount

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // You can bind classes or services here if needed.
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        Blade::anonymousComponentNamespace('resources/views/components', 'components');
  
        // ✅ Share common user counts with all views using the admin layout
        View::share('totalUsers', User::count()); // Total users (all roles)
        View::share('clientsCount', User::where('role', 'client')->count()); // Total clients
        View::share('ownersCount', User::where('role', 'owner')->count()); // Total property owners

        // ✅ Dynamically share pending owner request count only with layouts.admin
        View::composer('layouts.admin', function ($view) {
            $pendingCount = OwnerRequest::where('status', 'pending')->count();
            $view->with('pendingRequestsCount', $pendingCount);
        });
    }
}
