<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PropertyOwnerRequest;

class OwnerRequestController extends Controller
{
    /**
     * Show the form view.
     */
    public function create()
    {
        return view('property_owner_request'); // Adjust if your view is elsewhere
    }

    /**
     * Handle form submission.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload
        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('verification_documents', 'public');
        }

        // ✅ Create new property owner request using the correct model
        

        PropertyOwnerRequest::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'document' => $documentPath, 
        ]);
        

        return back()->with('success', 'Your request has been submitted successfully!');
    }
}
