@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
            <p class="text-gray-500 text-sm">Total Properties</p>
            <h2 class="text-2xl font-bold text-blue-700 mt-2">120</h2>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
            <p class="text-gray-500 text-sm">Total Users</p>
            <h2 class="text-2xl font-bold text-green-700 mt-2">45</h2>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
            <p class="text-gray-500 text-sm">Pending Listings</p>
            <h2 class="text-2xl font-bold text-yellow-600 mt-2">8</h2>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
            <p class="text-gray-500 text-sm">Open Enquiries</p>
            <h2 class="text-2xl font-bold text-red-600 mt-2">15</h2>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">Quick Actions</h3>
        <div class="flex flex-wrap gap-4">

            <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm">+ Add User</a>
            <a href="#" class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition text-sm">Review Requests</a>
        </div>
    </div>
@endsection
