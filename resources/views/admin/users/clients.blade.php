@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-semibold">Clients</h2>

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
                @foreach ($clients as $client)
                    <tr>
                        <td class="py-2 px-4">{{ $client->name }}</td>
                        <td class="py-2 px-4">{{ $client->email }}</td>
                        <td class="py-2 px-4">{{ $client->status }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('admin.users.show', $client->id) }}" class="text-blue-500">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        {{ $clients->links() }}
    </div>
@endsection
