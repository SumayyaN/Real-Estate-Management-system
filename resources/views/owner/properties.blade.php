@php
    use App\Models\Property;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Property Listings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Property Portfolio</h2>
                <div class="flex space-x-3">
                    <a href="{{ route('owner.upload') }}"
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 text-white text-xs font-semibold uppercase tracking-widest rounded-md transition focus:outline-none focus:ring focus:ring-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Add Property
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Summary Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
        <h3 class="text-sm font-medium text-gray-500">Total Properties</h3>
        <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ $stats['total_properties'] ?? 0 }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
        <h3 class="text-sm font-medium text-gray-500">Total Value</h3>
        <p class="mt-2 text-3xl font-extrabold text-gray-900">${{ number_format($stats['monthly_revenue'] ?? 0, 2) }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
        <h3 class="text-sm font-medium text-gray-500">For Rent</h3>
        <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ $stats['for_rent'] ?? 0 }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
        <h3 class="text-sm font-medium text-gray-500">For Sale</h3>
        <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ $stats['for_sale'] ?? 0 }}</p>
    </div>
</div>

            <!-- Property Listings -->
            <div class="space-y-6">
                @foreach($properties as $property)
                <div class="bg-white overflow-hidden shadow-md hover:shadow-xl rounded-xl transition">
                    <div class="md:flex">
                        <div class="md:w-1/4">
                            @if($property->image)
                                <img class="h-48 w-full object-cover md:h-full rounded-l-xl" src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}">
                            @else
                                <div class="h-48 w-full bg-gray-200 flex items-center justify-center md:h-full rounded-l-xl">
                                    <span class="text-gray-400">No Image</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 md:w-3/4">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 hover:text-indigo-600 transition">{{ $property->name }}</h3>
                                    <p class="text-gray-600 text-sm">{{ $property->address }}, {{ $property->city }}</p>
                                    <div class="mt-2 flex items-center space-x-3">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                            {{ $property->status === 'available' ? 'bg-blue-100 text-blue-800' : 
                                               ($property->status === 'rented' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ ucfirst($property->status) }}
                                        </span>
                                        <span class="text-gray-600 text-xs">{{ $property->getFormattedPropertyType() }} - {{ $property->getFormattedPropertySubtype() }}</span>
                                    </div>
                                </div>
                                <div class="mt-4 md:mt-0 text-right">
                                    <p class="text-sm font-medium text-gray-600">{{ $property->type === 'rent' ? 'Monthly Price' : 'Sale Price' }}</p>
                                    <p class="text-xl font-bold text-indigo-600">{{ $property->getFormattedPrice() }}</p>
                                    <p class="text-xs text-gray-500">{{ $property->getPriceLabel() }}</p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <p class="text-gray-700">{{ \Illuminate\Support\Str::limit($property->description, 200) }}</p>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <div>
                                    <p class="text-xs text-gray-500">Owner</p>
                                    <p class="text-sm font-medium">{{ $property->owner->name }}</p>
                                </div>
                                <a href="{{ route('properties.index', $property) }}" 
                                   class="inline-flex items-center px-3 py-1 text-sm font-medium text-indigo-600 bg-indigo-50 rounded-md hover:bg-indigo-100 transition">
                                    View Details
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $properties->links() }}
            </div>
        </div>
    </main>
</body>
</html>