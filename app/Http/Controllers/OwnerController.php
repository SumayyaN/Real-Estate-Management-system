<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

class OwnerController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();
        $stats = [
            'total_properties' => 0,
            'occupied_units' => 0,
            'pending_applications' => 0,
            'rental_income' => 0,
        ];
        $inquiries = collect();

        if ($userId) {
            $properties = Property::where('owner_id', $userId)->get(['id', 'owner_id', 'type', 'price', 'name']);
            
            $inquiries = Inquiry::whereHas('property', function ($query) use ($userId) {
                $query->where('owner_id', $userId);
            })
                ->where('status', 'pending')
                ->whereNotNull('message')
                ->where('message', '!=', '')
                ->with(['property', 'user'])
                ->get();

            $stats = [
                'total_properties' => $properties->count(),
                'occupied_units' => 0,
                'pending_applications' => Inquiry::whereHas('property', function ($query) use ($userId) {
                    $query->where('owner_id', $userId);
                })
                    ->where('status', 'pending')
                    ->whereNotNull('message')
                    ->where('message', '!=', '')
                    ->count(),
                'rental_income' => Property::where('owner_id', $userId)
                    ->where('type', 'rent')
                    ->sum('price'),
            ];

            Log::info("Owner Dashboard for User $userId", [
                'user_id' => $userId,
                'properties' => $properties->toArray(),
                'inquiries' => $inquiries->toArray(),
                'stats' => $stats,
            ]);
        } else {
            Log::warning('No authenticated user found for dashboard', [
                'session' => session()->all(),
            ]);
        }

        return view('owner.dashboard', compact('stats', 'inquiries'));
    }

    public function approveInquiry(Inquiry $inquiry)
    {
        if ($inquiry->property->owner_id !== Auth::id()) {
            return redirect()->route('owner.dashboard')->with('error', 'Unauthorized action.');
        }

        $inquiry->update([
            'status' => 'approved',
        ]);

        return redirect()->route('owner.dashboard')->with('success', 'Appointment approved successfully.');
    }

    public function rejectInquiry(Inquiry $inquiry)
    {
        if ($inquiry->property->owner_id !== Auth::id()) {
            return redirect()->route('owner.dashboard')->with('error', 'Unauthorized action.');
        }

        $inquiry->update([
            'status' => 'rejected',
        ]);

        return redirect()->route('owner.dashboard')->with('success', 'Appointment rejected successfully.');
    }

    public function respondToInquiry(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'owner_response' => 'nullable|string|max:1000',
        ]);

        if ($inquiry->property->owner_id !== Auth::id()) {
            return redirect()->route('owner.dashboard')->with('error', 'Unauthorized action.');
        }

        $inquiry->update([
            'owner_response' => $validated['owner_response'],
        ]);

        return redirect()->route('owner.dashboard')->with('success', 'Response sent successfully.');
    }
}