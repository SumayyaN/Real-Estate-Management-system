<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class InquiryController extends Controller
{
    public function store(Request $request, Property $property)
    {
        $request->validate([
            'message' => 'required|string|max:500',
            'appointment_date' => 'nullable|date|after:now',
        ]);

        Inquiry::create([
            'property_id' => $property->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
            'appointment_date' => $request->appointment_date,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Your inquiry has been submitted successfully!');
    }

    public function index()
    {
        $inquiries = Auth::user()->inquiries()->with('property')->latest()->paginate(10);
        return view('client.inquiries.index', compact('inquiries'));
    }

        public function show(Inquiry $inquiry)
    {
        if ($inquiry->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('client.inquiries.show', compact('inquiry'));
    }
}