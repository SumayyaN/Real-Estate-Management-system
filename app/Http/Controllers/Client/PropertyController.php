<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
{
    // Start with base query
    $query = Property::where('status', 'available');

    // Get filter values with defaults
    $filters = [
        'type' => $request->input('type', ''),
        'property_type' => $request->input('property_type', ''),
        'property_subtype' => $request->input('property_subtype', '')
    ];

    // Apply filters
    if (!empty($filters['type'])) {
        $query->where('type', $filters['type']);
    }
    if (!empty($filters['property_type'])) {
        $query->where('property_type', $filters['property_type']);
    }
    if (!empty($filters['property_subtype'])) {
        $query->where('property_subtype', $filters['property_subtype']);
    }

    $properties = $query->latest()->paginate(10)
        ->appends($request->query());

    return view('client.properties.index', [
        'properties' => $properties,
        'filters' => $filters,
        'filterOptions' => [
            'types' => ['rent', 'sale'],
            'propertyTypes' => ['land', 'building'],
            'subtypes' => ['residential_plot', 'commercial_plot', 'apartment', 'office']
        ]
    ]);
}

public function myProperties()
{
    $userId = auth()->id();
    
    $properties = Property::whereHas('inquiries', function($query) use ($userId) {
        $query->where('user_id', $userId)
              ->whereIn('clientStatus', ['renting', 'bought']);
    })
    ->with(['inquiries' => function($query) use ($userId) {
        $query->where('user_id', $userId)
              ->whereIn('clientStatus', ['renting', 'bought']);
    }])
    ->paginate(10);

    return view('client.properties.my-properties', compact('properties'));
}

    public function show(Property $property)
    {
        $property->load('owner');
        return view('client.properties.show', compact('property'));
    }
}