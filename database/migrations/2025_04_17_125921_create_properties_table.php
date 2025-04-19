@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📊 Reports & Analytics</h2>
    </div>

    <!-- KPI Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
            <p class="text-sm font-medium text-blue-600">Total Properties</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalProperties }}</p>
        </div>

        <div class="bg-green-50 p-4 rounded-lg border border-green-100">
            <p class="text-sm font-medium text-green-600">Available Properties</p>
            <p class="text-2xl font-bold text-gray-800">{{ $availableProperties }}</p>
        </div>

        <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100">
            <p class="text-sm font-medium text-yellow-600">Rented Properties</p>
            <p class="text-2xl font-bold text-gray-800">{{ $rentedProperties }}</p>
        </div>

        <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
            <p class="text-sm font-medium text-purple-600">Total Revenue</p>
            <p class="text-2xl font-bold text-gray-800">₦{{ number_format($totalRevenue, 2) }}</p>
        </div>
    </div>

    <!-- More analytics sections here later -->
</div>
@endsection
