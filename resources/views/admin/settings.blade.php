@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">⚙️ Settings</h2>
    <p class="text-gray-600 mb-4">Configure admin panel preferences and notifications here.</p>

    <form>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Enable Notifications</label>
            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option>Enabled</option>
                <option>Disabled</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Site Theme</label>
            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option>Light</option>
                <option>Dark</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Save Settings</button>
    </form>
</div>
@endsection
