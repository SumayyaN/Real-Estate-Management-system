@extends('layouts.client')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Available Properties</h1>
        <p class="mt-1 text-sm text-gray-500">Browse our selection of premium properties</p>
    </div>

    <!-- Filter Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <form method="GET" action="{{ route('client.properties.index') }}">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Type Filter -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Transaction Type</label>
                    <select id="type" name="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="">All Types</option>
                        @foreach($filterOptions['types'] as $type)
                            <option value="{{ $type }}" {{ ($filters['type'] ?? '') == $type ? 'selected' : '' }}>
                                {{ ucfirst($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Property Type Filter -->
                <div>
                    <label for="property_type" class="block text-sm font-medium text-gray-700 mb-1">Property Type</label>
                    <select id="property_type" name="property_type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="">All Types</option>
                        @foreach($filterOptions['propertyTypes'] as $ptype)
                            <option value="{{ $ptype }}" {{ ($filters['property_type'] ?? '') == $ptype ? 'selected' : '' }}>
                                {{ ucfirst($ptype) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Subtype Filter -->
                <div>
                    <label for="property_subtype" class="block text-sm font-medium text-gray-700 mb-1">Subtype</label>
                    <select id="property_subtype" name="property_subtype" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="">All Subtypes</option>
                        @foreach($filterOptions['subtypes'] as $subtype)
                            <option value="{{ $subtype }}" {{ ($filters['property_subtype'] ?? '') == $subtype ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $subtype)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-end space-x-2">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition duration-150">
                        Apply
                    </button>
                    @if(request()->anyFilled(['type', 'property_type', 'property_subtype']))
                        <a href="{{ route('client.properties.index') }}" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded-md transition duration-150 text-center">
                            Clear
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <!-- Property Grid -->
    @if($properties->isEmpty())
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900">No properties found</h3>
            <p class="mt-1 text-sm text-gray-500">Try adjusting your search filters</p>
            <div class="mt-6">
                <a href="{{ route('client.properties.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Reset Filters
                </a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($properties as $property)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative pb-2/3 h-48 bg-gray-100">
                    @if($property->image && file_exists(public_path('storage/' . $property->image)))
                        <img src="{{ asset('storage/' . $property->image) }}" 
                            alt="{{ $property->name }}" 
                            class="absolute h-full w-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'absolute inset-0 flex items-center justify-center text-gray-400\'><svg class=\'h-12 w-12\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\' /></svg></div>'">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                            <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                </div>
                    <div class="p-4">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{ $property->name }}</h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $property->city }}</p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($property->type) }}
                            </span>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-lg font-semibold text-gray-900">${{ number_format($property->price) }}</span>
                            <a href="{{ route('client.properties.show', $property) }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                                View details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $properties->links() }}
        </div>
    @endif
</div>
@endsection