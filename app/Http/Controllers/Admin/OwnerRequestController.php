<?php

namespace App\Http\Controllers\Admin;

use App\Models\OwnerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class OwnerRequestController extends Controller
{
    // Display all property owner requests with optional status filter
    public function index(Request $request)
    {
        $query = OwnerRequest::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $ownerRequests = $query->paginate(10);
        $pendingRequestsCount = OwnerRequest::where('status', 'pending')->count();

        return view('admin.owner_requests.index', compact('ownerRequests', 'pendingRequestsCount'));
    }

    public function show($id)
    {
        $ownerRequest = OwnerRequest::findOrFail($id);
        return view('admin.owner_requests.show', compact('ownerRequest'));
    }

    // 🔁 Optional update method if using dropdown status change
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $ownerRequest = OwnerRequest::findOrFail($id);

        if ($request->status === 'approved') {
            $user = User::create([
                'name' => $ownerRequest->name,
                'email' => $ownerRequest->email,
                'phone' => $ownerRequest->phone,
                'password' => Hash::make('defaultpassword'), // Change or email reset link
            ]);

            $user->assignRole('owner');

            $ownerRequest->status = 'approved';
            $ownerRequest->user_id = $user->id;
        } else {
            $ownerRequest->status = 'rejected';
        }

        $ownerRequest->save();

        return redirect()->route('admin.owner-requests.index')->with('status', 'Request ' . $request->status);
    }

    // ✅ Add this approve() method for a separate approval button
    public function approve($id)
{
    $ownerRequest = OwnerRequest::findOrFail($id);

    // Check if already approved to avoid duplicates
    if ($ownerRequest->status === 'approved') {
        return redirect()->back()->with('info', 'This request has already been approved.');
    }

    // Create new user with the owner role
    $user = User::create([
        'name' => $ownerRequest->name,
        'email' => $ownerRequest->email,
        'phone' => $ownerRequest->phone,
        'password' => Hash::make(Str::random(12)),
        'role' => 'owner',
    ]);

    // Delete the request after successful creation
    $ownerRequest->delete();

    return redirect()->route('admin.owner-requests.index')
        ->with('success', 'Owner request approved and user added as owner.');
}
}