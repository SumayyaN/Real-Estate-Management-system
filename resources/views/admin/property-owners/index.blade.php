@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Property Owners</h1>

    <table class="w-full table-auto text-left border-collapse">
        <thead class="bg-gray-100 text-sm">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Registered At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($propertyOwners as $owner)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $owner->id }}</td>
                    <td class="px-4 py-2">{{ $owner->name }}</td>
                    <td class="px-4 py-2">{{ $owner->email }}</td>
                    <td class="px-4 py-2">{{ $owner->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 text-center text-gray-500">No property owners found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $propertyOwners->links() }}
    </div>
</div>
@endsection
