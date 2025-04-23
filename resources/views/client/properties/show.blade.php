@extends('layouts.client')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Property Image -->
            <div class="relative pb-2/3 h-64 bg-gray-100">
                @if($property->image && file_exists(public_path('storage/' . $property->image)))
                    <img src="{{ asset('storage/' . $property->image) }}" 
                        alt="{{ $property->name }}" 
                        class="absolute h-full w-full object-cover"
                        onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'absolute inset-0 flex items-center justify-center text-gray-400\'><svg class=\'h-16 w-16\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\' /></svg></div>'">
                @else
                    <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                        <svg class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
            </div>

        <!-- Property Details -->
        <div class="p-6">
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $property->name }}</h1>
                    <div class="mt-2 flex items-center space-x-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ ucfirst($property->type) }}
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            {{ ucfirst($property->status) }}
                        </span>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-semibold text-blue-600">${{ number_format($property->price) }}</p>
                </div>
            </div>

            <!-- Location -->
            <div class="mt-6">
                <h2 class="text-sm font-medium text-gray-500">Location</h2>
                <div class="mt-1 flex items-center">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p class="text-gray-700">{{ $property->city }}{{ $property->address ? ', ' . $property->address : '' }}</p>
                </div>
            </div>

            <!-- Owner Information -->
            <div class="mt-6">
                <h2 class="text-sm font-medium text-gray-500">Contact Property Owner</h2>
                <div class="mt-1 flex items-center">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <a href="mailto:{{ $property->owner?->email ?? '' }}" class="text-blue-600 hover:text-blue-800 hover:underline">
                        {{ $property->owner?->email ?? 'No owner email' }}
                    </a>
                </div>
            </div>

            <!-- Property Features -->
            <div class="mt-6 grid grid-cols-2 gap-4">
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Property Type</h2>
                    <p class="mt-1 text-gray-900">{{ ucfirst(str_replace('_', ' ', $property->property_type)) }}</p>
                </div>
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Subtype</h2>
                    <p class="mt-1 text-gray-900">{{ ucfirst(str_replace('_', ' ', $property->property_subtype)) }}</p>
                </div>
            </div>

            <!-- Description -->
            <div class="mt-6">
                <h2 class="text-sm font-medium text-gray-500">Description</h2>
                <div class="mt-1 prose prose-sm text-gray-500">
                    {{ $property->description }}
                </div>
            </div>

            <!-- Inquiry Form -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <h2 class="text-lg font-medium text-gray-900">Make an Inquiry</h2>
                <form action="{{ route('client.inquiries.store', $property) }}" method="POST" class="mt-4 space-y-4">
                    @csrf
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                    </div>
                    <div>
                        <label for="appointment_date" class="block text-sm font-medium text-gray-700">Request Appointment (optional)</label>
                        <input type="datetime-local" id="appointment_date" name="appointment_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Submit Inquiry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection