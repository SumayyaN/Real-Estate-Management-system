@extends('layouts.client')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Available Properties</h1>

    {{-- Filter Form --}}
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <form method="GET" action="{{ route('client.properties.index') }}">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            {{-- Type Filter --}}
            <div>
                <label for="type" class="block mb-2 text-sm font-medium text-gray-700">
                    Transaction Type
                </label>
                <select name="type" id="type" class="w-full border border-gray-300 rounded-md p-2">
                    <option value="">All Types</option>
                    @foreach($filterOptions['types'] as $type)
                        <option value="{{ $type }}" {{ ($filters['type'] ?? '') == $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Property Type Filter --}}
            <div>
                <label for="property_type" class="block mb-2 text-sm font-medium text-gray-700">
                    Property Type
                </label>
                <select name="property_type" id="property_type" class="w-full border border-gray-300 rounded-md p-2">
                    <option value="">All Types</option>
                    @foreach($filterOptions['propertyTypes'] as $ptype)
                        <option value="{{ $ptype }}" {{ ($filters['property_type'] ?? '') == $ptype ? 'selected' : '' }}>
                            {{ ucfirst($ptype) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Subtype Filter --}}
            <div>
                <label for="property_subtype" class="block mb-2 text-sm font-medium text-gray-700">
                    Subtype
                </label>
                <select name="property_subtype" id="property_subtype" class="w-full border border-gray-300 rounded-md p-2">
                    <option value="">All Subtypes</option>
                    @foreach($filterOptions['subtypes'] as $subtype)
                        <option value="{{ $subtype }}" {{ ($filters['property_subtype'] ?? '') == $subtype ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $subtype)) }}
                        </option>
                    @endforeach
                </select>
            </div>

                {{-- Action Buttons --}}
                <div class="flex items-end space-x-2">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                        Apply Filters
                    </button>
                    @if(request()->anyFilled(['type', 'property_type', 'property_subtype']))
                        <a href="{{ route('client.properties.index') }}" class="w-full bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300 transition text-center">
                            Clear All
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    {{-- Property List --}}
    @if($properties->isEmpty())
        <div class="bg-white p-8 rounded-lg shadow text-center">
            <p class="text-lg text-gray-600">No properties match your search criteria.</p>
            <a href="{{ route('client.properties.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">
                Show all available properties
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($properties as $property)
                <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    @if($property->image)
                        <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image Available</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="text-xl font-bold">{{ $property->name }}</h3>
                        <p class="text-gray-600 mt-2">{{ $property->city }}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="font-bold text-lg">${{ number_format($property->price) }}</span>
                            <a href="{{ route('client.properties.show', $property) }}" class="text-blue-600 hover:text-blue-800">
                                View Details →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        {{-- Pagination with Filters --}}
        <div class="mt-8">
            {{ $properties->links() }}
        </div>
    @endif
</div>
@endsection