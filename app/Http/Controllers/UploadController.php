<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    /**
     * Show the form for creating a new property.
     */
    public function create()
    {
        return view('owner.upload');
    }

    /**
     * Store a newly created property in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:rent,sale',
            'status' => 'required|in:available,sold,rented',
            'city' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'property_type' => 'required|in:land,building',
            'property_subtype' => 'required|in:residential_plot,commercial_plot,apartment,office',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Add owner_id to validated data
        $validated['owner_id'] = Auth::id();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');
            $validated['image'] = $imagePath;
        }
        
        // Create property
        $property = Property::create($validated);
        
        return redirect()->route('properties.index')
            ->with('success', 'Property has been listed successfully!');
    }

    /**
     * Display a listing of the properties.
     */
    public function index()
    {
        $properties = Property::where('owner_id', Auth::id())->latest()->paginate(10);
        return view('owner.properties', compact('properties'));
    }

    /**
     * Display the specified property.
     */
    public function show(Property $property)
    {
        // Check if user is owner or has permission to view
        if ($property->owner_id !== Auth::id() && !Auth::user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified property.
     */
    public function edit(Property $property)
    {
        // Check if user is owner
        if ($property->owner_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified property in storage.
     */
    public function update(Request $request, Property $property)
    {
        // Check if user is owner
        if ($property->owner_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:rent,sale',
            'status' => 'required|in:available,sold,rented',
            'city' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'property_type' => 'required|in:land,building',
            'property_subtype' => 'required|in:residential_plot,commercial_plot,apartment,office',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');
            $validated['image'] = $imagePath;
        }
        
        // Update property
        $property->update($validated);
        
        return redirect()->route('properties.index')
            ->with('success', 'Property has been updated successfully!');
    }

    /**
     * Remove the specified property from storage.
     */
    public function destroy(Property $property)
    {
        // Check if user is owner
        if ($property->owner_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $property->delete();
        
        return redirect()->route('properties.index')
            ->with('success', 'Property has been deleted successfully!');
    }
}