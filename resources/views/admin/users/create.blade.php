@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white shadow p-6 rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Register a Property Owner</h2>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="name">Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="email">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="password">Password</label>
            <input type="password" name="password" id="password" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="role">Role</label>
            <select name="role" id="role" class="w-full border rounded p-2" required>
                <option value="owner">Property Owner</option>
                {{-- Add more roles if needed --}}
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Register</button>
    </form>
</div>
@endsection
