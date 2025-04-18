<?php

// namespace App\Http\Controllers\Admin;

// use App\Models\OwnerRequest;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\Controller;

// class OwnerRequestController extends Controller
// {
//     // List all owner requests with optional status filter
//     public function index(Request $request)
//     {
//         $query = OwnerRequest::query();

//         // 🔍 Filter by status if provided (e.g., ?status=pending)
//         if ($request->has('status')) {
//             $query->where('status', $request->status);
//         }

//         $ownerRequests = $query->paginate(10);

//         // 🔢 Count pending requests for sidebar badge
//         $pendingRequestsCount = OwnerRequest::where('status', 'pending')->count();

//         return view('admin.owner_requests.index', compact('ownerRequests', 'pendingRequestsCount'));
//     }

//     // View a specific owner request
//     public function show($id)
//     {
//         $ownerRequest = OwnerRequest::findOrFail($id);
//         return view('admin.owner_requests.show', compact('ownerRequest'));
//     }

//     // Approve or reject the owner request
//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'status' => 'required|in:approved,rejected',
//         ]);

//         $ownerRequest = OwnerRequest::findOrFail($id);

//         if ($request->status === 'approved') {
//             // Create user account from the request
//             $user = User::create([
//                 'name' => $ownerRequest->name,
//                 'email' => $ownerRequest->email,
//                 'phone' => $ownerRequest->phone,
//                 'password' => Hash::make('defaultpassword'), // Optionally email the password to the owner
//             ]);

//             $user->assignRole('owner');

//             $ownerRequest->status = 'approved';
//             $ownerRequest->user_id = $user->id; // Link request to created user
//         } else {
//             $ownerRequest->status = 'rejected';
//         }

//         $ownerRequest->save();

//         return redirect()->route('admin.owner-requests.index')->with('status', 'Request ' . $request->status);
//     }
// }
namespace App\Http\Controllers\Admin;

use App\Models\OwnerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class OwnerRequestController extends Controller
{
    // Display all property owner requests with optional status filter
    public function index(Request $request)
    {
        $query = OwnerRequest::query();

        // 🔍 Filter by status if provided (e.g., ?status=pending)
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $ownerRequests = $query->paginate(10);

        // 🔢 Count pending requests for sidebar badge
        $pendingRequestsCount = OwnerRequest::where('status', 'pending')->count();

        return view('admin.owner_requests.index', compact('ownerRequests', 'pendingRequestsCount'));
    }

    // View a specific owner request
    public function show($id)
    {
        $ownerRequest = OwnerRequest::findOrFail($id);
        return view('admin.owner_requests.show', compact('ownerRequest'));
    }

    // Approve or reject the owner request
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $ownerRequest = OwnerRequest::findOrFail($id);

        if ($request->status === 'approved') {
            // Create user account from the request
            $user = User::create([
                'name' => $ownerRequest->name,
                'email' => $ownerRequest->email,
                'phone' => $ownerRequest->phone,
                'password' => Hash::make('defaultpassword'), // Optionally email the password to the owner
            ]);

            // Assign the role of 'owner' to the newly created user
            $user->assignRole('owner');

            // Update the status of the request and link it to the newly created user
            $ownerRequest->status = 'approved';
            $ownerRequest->user_id = $user->id; // Link request to created user
        } else {
            // Reject the request
            $ownerRequest->status = 'rejected';
        }

        $ownerRequest->save();

        // Redirect with a success or info message
        return redirect()->route('admin.owner-requests.index')->with('status', 'Request ' . $request->status);
    }
}
