<div class="bg-white p-6 rounded shadow overflow-auto">

    <!-- Filters -->
    <div class="flex gap-4 mb-4">
        <select wire:model="filterType" class="border rounded px-3 py-1">
            <option value="">All Types</option>
            <option value="land">Land</option>
            <option value="building">Building</option>
        </select>

        <select wire:model="filterStatus" class="border rounded px-3 py-1">
            <option value="">All Statuses</option>
            <option value="available">Available</option>
            <option value="sold">Sold</option>
            <option value="rented">Rented</option>
        </select>
    </div>

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
                    <td class="px-4 py-2" title="{{ $property->description }}">{{ Str::limit($property->description, 50) }}</td>
                    <td class="px-4 py-2">{{ ucfirst($property->status) }}</td>
                    <td class="px-4 py-2">{{ number_format($property->price, 2) }}</td>
                    <td class="px-4 py-2">{{ $property->owner->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.properties.show', $property->id) }}" class="text-blue-600 hover:underline">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">No properties found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $properties->links() }}
    </div>
</div>
