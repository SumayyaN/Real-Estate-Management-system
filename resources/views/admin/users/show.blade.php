@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-semibold">{{ $user->name }}'s Details</h2>

    <div class="mt-6">
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <tr>
                <th class="py-2 px-4 text-left">Name</th>
                <td class="py-2 px-4">{{ $user->name }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 text-left">Email</th>
                <td class="py-2 px-4">{{ $user->email }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 text-left">Status</th>
                <td class="py-2 px-4">{{ $user->status }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 text-left">Role</th>
                <td class="py-2 px-4">{{ $user->roles }}</td>
            </tr>
            <!-- Add any other user-related details here -->
        </table>
    </div>
@endsection
