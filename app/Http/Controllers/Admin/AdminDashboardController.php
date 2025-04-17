<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Property;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProperties = Property::count();
        $totalUsers = User::count();
        $activeListings = Property::where('status', 'active')->count();
        $pendingRequests = Property::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalProperties',
            'totalUsers',
            'activeListings',
            'pendingRequests'
        ));
    }
}
