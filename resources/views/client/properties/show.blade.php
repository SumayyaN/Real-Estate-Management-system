@extends('layouts.client')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        @if($property->image)
            <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}" class="w-full h-96 object-cover">
        @else
            <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-lg">No Image Available</span>
            </div>
        @endif
        
        <div class="p-6">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold">{{ $property->name }}</h1>
                    <div class="flex items-center mt-2 space-x-4">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                            {{ ucfirst($property->type) }}
                        </span>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                            {{ ucfirst($property->status) }}
                        </span>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-blue-600">${{ number_format($property->price) }}</p>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-700">Location</h3>
                    <p class="mt-1">{{ $property->city }}</p>
                    @if($property->address)
                        <p class="mt-1 text-sm text-gray-600">{{ $property->address }}</p>
                    @endif
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-700">Property Type</h3>
                    <p class="mt-1">{{ str_replace('_', ' ', $property->property_type) }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-700">Subtype</h3>
                    <p class="mt-1">{{ str_replace('_', ' ', $property->property_subtype) }}</p>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-2">Description</h3>
                <p class="text-gray-700">{{ $property->description }}</p>
            </div>

            <div class="mt-8 border-t pt-6">
                <h3 class="text-xl font-semibold mb-4">Make an Inquiry</h3>
                <form action="{{ route('client.inquiries.store', $property) }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" name="message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required></textarea>
                        </div>
                        <div>
                            <label for="appointment_date" class="block text-sm font-medium text-gray-700">Request Appointment (optional)</label>
                            <input type="datetime-local" id="appointment_date" name="appointment_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Submit Inquiry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection