@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-semibold">Property Owners</h2>

    <div class="mt-6">
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-left">Name</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Status</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($owners as $owner)
                    <tr>
                        <td class="py-2 px-4">{{ $owner->name }}</td>
                        <td class="py-2 px-4">{{ $owner->email }}</td>
                        <td class="py-2 px-4">{{ $owner->status }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('admin.users.show', $owner->id) }}" class="text-blue-500">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        {{ $owners->links() }}
    </div>
@endsection
