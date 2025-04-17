@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded shadow overflow-auto">
        <h2 class="text-xl font-semibold mb-4">All Properties</h2>

        <!-- Responsive table wrapper to prevent overflow issues -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Owner</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($properties as $property)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $property->id }}</td>
                            <td class="px-4 py-2">{{ $property->name }}</td>
                            <!-- Truncate long descriptions, but show full on hover -->
                            <td class="px-4 py-2" title="{{ $property->description }}">
                                {{ Str::limit($property->description, 50) }}
                            </td>
                            <td class="px-4 py-2">{{ ucfirst($property->status) }}</td>
                            <td class="px-4 py-2">{{ number_format($property->price, 2) }}</td>
                            <td class="px-4 py-2">{{ $property->owner->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">
                                <!-- Link to view more details -->
                                <a href="{{ route('admin.properties.show', $property->id) }}" class="text-blue-600 hover:underline">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <!-- Show message if no properties exist -->
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">No properties found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        <div class="mt-4">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
