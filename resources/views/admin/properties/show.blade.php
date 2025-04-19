@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-4xl mx-auto">
        <h2 class="text-2xl font-semibold mb-4">{{ $property->name }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p><strong>Description:</strong> {{ $property->description }}</p>
                <p><strong>Status:</strong> {{ ucfirst($property->status) }}</p>
                <p><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                <p><strong>City:</strong> {{ $property->city }}</p>
                <p><strong>Address:</strong> {{ $property->address }}</p>
                <p><strong>Type:</strong> {{ ucfirst($property->property_type) }}</p>
                <p><strong>Subtype:</strong> {{ ucfirst($property->property_subtype) }}</p>
                <p><strong>Owner:</strong> {{ $property->owner->name ?? 'N/A' }}</p>
            </div>
            <div>
                @if($property->image_url)
                    <img src="{{ asset('storage/' . $property->image_url) }}" class="rounded shadow-md max-h-64 object-cover">
                @else
                    <p class="text-gray-500">No image available.</p>
                @endif
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.properties.index') }}" class="text-blue-600 hover:underline">← Back to Properties</a>
        </div>
    </div>
@endsection
