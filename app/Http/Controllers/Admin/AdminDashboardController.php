<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Property;
use App\Models\OwnerRequest;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Property counts
        $totalProperties = Property::count();
        $activeListings = Property::where('status', 'active')->count();
        $pendingRequests = Property::where('status', 'pending')->count();

        // User counts
        $clientsCount = User::where('role', 'client')->count();
        $ownersCount = User::where('role', 'owner')->count();
        $totalUsers = $clientsCount + $ownersCount; // Total users: clients + property owners

        // Owner request count
        $pendingOwnerRequests = OwnerRequest::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalProperties',
            'totalUsers',
            'activeListings',
            'pendingRequests',
            'clientsCount',
            'ownersCount',
            'pendingOwnerRequests'
        ));
    }

    // Show all clients
    public function showClients()
    {
        $clients = User::where('role', 'client')->paginate(10);

        return view('admin.clients.index', compact('clients'));
    }

    // Show all property owners
    public function showPropertyOwners()
    {
        $propertyOwners = User::where('role', 'owner')->paginate(10);

        return view('admin.property-owners.index', compact('propertyOwners'));
    }

    public function showOwnerRequests()
    {
        $requests = OwnerRequest::all(); // or with pagination
        return view('admin.owner_requests.index', compact('requests'));
    }

    public function reports()
{
    // You can pass some data here later like property stats, exports, etc.
    return view('admin.reports');
}

public function settings()
{
    // This might include notification toggles, site preferences, etc.
    return view('admin.settings');
}

}
