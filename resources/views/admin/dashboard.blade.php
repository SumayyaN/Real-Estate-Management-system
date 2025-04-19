@extends('layouts.admin')

@section('content')
{{-- Welcome Message --}}
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Welcome back, Admin!</h1>
    <p class="text-gray-500">{{ \Carbon\Carbon::now()->format('l, F j, Y') }}</p>
</div>

{{-- Summary Statistic Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
        <p class="text-gray-500 text-sm">Total Properties</p>
        <h2 class="text-2xl font-bold text-blue-700 mt-2">{{ $totalProperties ?? 0 }}</h2>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
        <p class="text-gray-500 text-sm">Total Users</p>
        <h2 class="text-2xl font-bold text-green-700 mt-2">{{ $totalUsers ?? 0 }}</h2>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
        <p class="text-gray-500 text-sm">Pending Owner Requests</p>
        <h2 class="text-2xl font-bold text-yellow-600 mt-2">{{ $pendingOwnerRequests ?? 0 }}</h2>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
        <p class="text-gray-500 text-sm">Active Property Listings</p>
        <h2 class="text-2xl font-bold text-indigo-600 mt-2">{{ $activeListings ?? 0 }}</h2>
    </div>


    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
        <p class="text-gray-500 text-sm">Clients</p>
        <h2 class="text-2xl font-bold text-cyan-600 mt-2">{{ $clientsCount ?? 0 }}</h2>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow">
        <p class="text-gray-500 text-sm">Property Owners</p>
        <h2 class="text-2xl font-bold text-purple-600 mt-2">{{ $ownersCount ?? 0 }}</h2>
    </div>
</div>


{{-- Quick Actions --}}
<div class="bg-white border border-gray-200 rounded-xl p-6 shadow mb-6">
    <h3 class="text-lg font-semibold mb-4 text-gray-800">Quick Actions</h3>
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('admin.properties.index') }}"
            class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition text-sm">
            All Properties
        </a>

        <a href="{{ route('admin.clients') }}"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm">
            Users
        </a>

        <a href="{{ route('admin.owner-requests.index', ['status' => 'pending']) }}"
            class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition text-sm">
            Property Owner Requests
        </a>
    </div>
</div>


{{-- Chart Placeholder --}}
<div class="bg-white border border-gray-200 rounded-xl p-6 shadow">
    <h3 class="text-lg font-semibold mb-4 text-gray-800">Properties Added Per Month</h3>
    <canvas id="propertiesChart" class="w-full h-64"></canvas>
</div>
@endsection

@section('scripts')
{{-- Chart.js Placeholder --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('propertiesChart').getContext('2d');
    const propertiesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Properties',
                data: [5, 9, 3, 7, 4, 6], // Dummy data
                backgroundColor: '#3B82F6',
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection