@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Pending Properties</h2>

        <table class="w-full table-auto text-left">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Submitted By</th>
                    <th class="px-4 py-2">Submitted At</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($properties as $property)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $property->id }}</td>
                        <td class="px-4 py-2">{{ $property->title }}</td>
                        <td class="px-4 py-2">{{ $property->user->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $property->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <form action="{{ route('admin.properties.approve', $property->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button class="text-green-600 hover:underline" onclick="return confirm('Approve this property?')">Approve</button>
                            </form>
                            <form action="{{ route('admin.properties.reject', $property->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button class="text-red-600 hover:underline" onclick="return confirm('Reject this property?')">Reject</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No pending properties found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
