<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class AdminPropertyController extends Controller
{
    /**
     * Display a listing of all properties.
     */
    public function index()
    {
        $properties = Property::with('owner')->latest()->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Display a listing of pending properties.
     */
    public function pending()
    {
        $properties = Property::with('owner')->where('status', 'pending')->latest()->paginate(10);
        return view('admin.properties.pending', compact('properties'));
    }

    /**
     * Approve a property by ID.
     */
    public function approve($id)
    {
        $property = Property::findOrFail($id);
        $property->status = 'active';
        $property->save();

        return redirect()->back()->with('success', 'Property approved successfully.');
    }

    /**
     * Reject a property by ID.
     */
    public function reject($id)
    {
        $property = Property::findOrFail($id);
        $property->status = 'rejected';
        $property->save();

        return redirect()->back()->with('success', 'Property rejected successfully.');
    }

    /**
     * Show full property details.
     * Make sure the view `admin.properties.show` exists.
     */
    public function show($id)
    {
        $property = Property::with('owner')->findOrFail($id);
        return view('admin.properties.show', compact('property'));
    }

    /**
     * Filter properties by type and subtype.
     */
    public function byType($type, $subtype)
    {
        $properties = Property::with('owner')
            ->where('property_type', $type)
            ->where('property_subtype', $subtype)
            ->latest()
            ->paginate(10);

        return view('admin.properties.by-type', compact('properties', 'type', 'subtype'));
    }

    /**
     * Filter properties by status: available, sold, rented.
     */
    public function byStatus($status)
    {
        $properties = Property::with('owner')
            ->where('status', $status)
            ->latest()
            ->paginate(10);

        return view('admin.properties.by-status', compact('properties', 'status'));
    }
}
