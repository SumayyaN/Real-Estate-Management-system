<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    /**
     * Display a listing of tenants for the authenticated property owner's properties.
     */
    public function index()
{
    $owner = Auth::user();
    $tenants = Inquiry::where(function($query) {
            $query->where('clientStatus', 'renting')
                  ->orWhere('clientStatus', 'bought');
        })
        ->whereHas('property', function ($query) use ($owner) {
            $query->where('owner_id', $owner->id);
        })
        ->with(['user', 'property'])
        ->get();

    return view('owner.index', compact('tenants'));
}

    /**
     * Show the form to add a tenant from approved inquiries with clientStatus 'inquiring'.
     */
    public function create()
    {
        $owner = Auth::user();
        $inquiries = Inquiry::where('status', 'approved')
            ->where('clientStatus', 'inquiring')
            ->whereHas('property', function ($query) use ($owner) {
                $query->where('owner_id', $owner->id);
            })
            ->with(['user', 'property'])
            ->get();

        return view('owner.create', compact('inquiries'));
    }

    /**
     * Store a new tenant by updating the clientStatus of an existing inquiry.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inquiry_id' => 'required|exists:inquiries,id',
            'clientStatus' => 'required|in:renting,buying',
        ]);

        $inquiry = Inquiry::findOrFail($request->inquiry_id);
        if ($inquiry->property->owner_id !== Auth::user()->id) {
            return redirect()->route('tenants.index')->with('error', 'Unauthorized action.');
        }

        $inquiry->update([
            'clientStatus' => $request->clientStatus,
        ]);

        return redirect()->route('tenants.index')->with('success', 'Tenant added successfully.');
    }

    /**
     * Update the clientStatus of an existing tenant.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'clientStatus' => 'required|in:renting,buying',
        ]);

        if ($inquiry->property->user_id !== Auth::user()->id) {
            return redirect()->route('tenants.index')->with('error', 'Unauthorized action.');
        }

        $inquiry->update([
            'clientStatus' => $request->clientStatus,
        ]);

        return redirect()->route('tenants.index')->with('success', 'Tenant status updated successfully.');
    }
}