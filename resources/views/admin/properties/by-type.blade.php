@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">
            Properties: {{ ucfirst($type) }} / {{ ucfirst($subtype) }}
        </h2>

        @if($properties->count())
            <table class="w-full table-auto text-left border-collapse overflow-x-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Owner</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $property->id }}</td>
                            <td class="px-4 py-2">{{ $property->name }}</td>
                            <td class="px-4 py-2">{{ ucfirst($property->status) }}</td>
                            <td class="px-4 py-2">{{ number_format($property->price, 2) }}</td>
                            <td class="px-4 py-2">{{ $property->owner->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.properties.show', $property->id) }}" class="text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $properties->links() }}
            </div>
        @else
            <p class="text-gray-500">No properties found for this type/subtype.</p>
        @endif
    </div>
@endsection
