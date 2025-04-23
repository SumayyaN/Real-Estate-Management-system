<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the properties for the authenticated owner.
     */
    public function index()
    {
        $properties = Property::where('owner_id', Auth::id())
            ->with('owner')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Calculate statistics for the authenticated owner's properties
        $stats = [
            'total_properties' => Property::where('owner_id', Auth::id())->count(),
            'monthly_revenue' => Property::where('owner_id', Auth::id())->where('type', 'rent')->sum('price'),
            'for_rent' => Property::where('owner_id', Auth::id())->where('type', 'rent')->count(),
            'for_sale' => Property::where('owner_id', Auth::id())->where('type', 'sale')->count()
        ];

        return view('owner.properties', [
            'properties' => $properties,
            'stats' => $stats
        ]);
    }

    /**
     * Get property statistics for the dashboard.
     */
    protected function getPropertyStats()
    {
        return [
            'total_properties' => Property::where('owner_id', Auth::id())->count(),
            'total_units' => Property::where('owner_id', Auth::id())->sum('units'), // Note: Requires 'units' column
            'monthly_revenue' => Property::where('owner_id', Auth::id())->where('type', 'rent')->sum('price'),
            'occupancy_rate' => 0, // Will implement later with tenants
        ];
    }

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'property_type' => 'required|in:land,building',
            'property_subtype' => 'required|in:residential_plot,commercial_plot,apartment,office',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('properties', 'public');
        }

        // Set the owner to the currently authenticated user
        $validated['owner_id'] = Auth::id();

        Property::create($validated);

        return redirect()->route('properties.index')
            ->with('success', 'Property created successfully!');
    }
}