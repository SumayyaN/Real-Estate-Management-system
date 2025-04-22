@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📊 Reports & Analytics</h2>
        <div class="flex space-x-2">
            <div class="relative">
                <select class="bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-blue-500">
                    <option>Last 30 Days</option>
                    <option>Last Quarter</option>
                    <option>Year to Date</option>
                    <option>Last Year</option>
                    <option>Custom Range</option>
                </select>
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Export Dashboard
            </button>
        </div>
    </div>

    <!-- KPI Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
            <div class="flex justify-between">
                <p class="text-sm font-medium text-blue-600">Total Revenue</p>
                <span class="text-blue-500">+12.5%</span>
            </div>
            <p class="text-2xl font-bold text-gray-800">$127,950</p>
            <p class="text-xs text-gray-500 mt-1">Compared to previous period</p>
        </div>
        
        <div class="bg-green-50 p-4 rounded-lg border border-green-100">
            <div class="flex justify-between">
                <p class="text-sm font-medium text-green-600">Occupancy Rate</p>
                <span class="text-green-500">+3.2%</span>
            </div>
            <p class="text-2xl font-bold text-gray-800">94.7%</p>
            <p class="text-xs text-gray-500 mt-1">Across all properties</p>
        </div>
        
       
        
        <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
            <div class="flex justify-between">
                <p class="text-sm font-medium text-purple-600">New Contracts</p>
                <span class="text-purple-500">+8</span>
            </div>
            <p class="text-2xl font-bold text-gray-800">23</p>
            <p class="text-xs text-gray-500 mt-1">New leases signed this period</p>
        </div>
    </div>

    <!-- Report Categories -->
    <div class="mb-6">
        <div class="border-b border-gray-200">
            <nav class="flex -mb-px">
                <button class="px-4 py-2 border-b-2 border-blue-500 text-blue-600 font-medium">Financial</button>
                <button class="px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Properties</button>
                <button class="px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Tenants</button>
                <button class="px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Market</button>
                <button class="px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Operations</button>
            </nav>
        </div>
    </div>

    <!-- Financial Reports Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Chart -->
        <div class="bg-white p-4 rounded-lg shadow border lg:col-span-2">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-gray-700">Revenue vs Expenses</h3>
                <div class="flex space-x-2">
                    <button class="px-2 py-1 text-xs bg-blue-50 text-blue-600 rounded">Monthly</button>
                    <button class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded">Quarterly</button>
                    <button class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded">Yearly</button>
                </div>
            </div>
            <div class="h-64 bg-gray-50 rounded flex items-center justify-center">
                <!-- Placeholder for chart -->
                <p class="text-gray-400 text-sm">Revenue/Expense Chart Will Render Here</p>
            </div>
        </div>

        <!-- Side Reports -->
        <div class="space-y-6">
            <div class="bg-white p-4 rounded-lg shadow border">
                <h3 class="font-semibold text-gray-700 mb-3">Top Performing Properties</h3>
                <div class="space-y-2">
                    <div class="flex justify-between pb-2 border-b">
                        <p class="text-sm">Sunset Apartments</p>
                        <span class="text-sm font-medium text-green-600">$12,540</span>
                    </div>
                    <div class="flex justify-between pb-2 border-b">
                        <p class="text-sm">Maple Heights</p>
                        <span class="text-sm font-medium text-green-600">$9,820</span>
                    </div>
                    <div class="flex justify-between pb-2 border-b">
                        <p class="text-sm">Lakeside Villas</p>
                        <span class="text-sm font-medium text-green-600">$8,350</span>
                    </div>
                </div>
                <a href="#" class="text-blue-600 text-sm mt-2 inline-block">View All Properties →</a>
            </div>

            <div class="bg-white p-4 rounded-lg shadow border">
                <h3 class="font-semibold text-gray-700 mb-3">Upcoming Lease Renewals</h3>
                <div class="space-y-2">
                    <div class="flex justify-between pb-2 border-b">
                        <p class="text-sm">543 Cedar Lane</p>
                        <span class="text-sm text-orange-500">3 days</span>
                    </div>
                    <div class="flex justify-between pb-2 border-b">
                        <p class="text-sm">892 Elm Street</p>
                        <span class="text-sm text-orange-500">1 week</span>
                    </div>
                    <div class="flex justify-between pb-2 border-b">
                        <p class="text-sm">117 Oak Avenue</p>
                        <span class="text-sm">2 weeks</span>
                    </div>
                </div>
                <a href="#" class="text-blue-600 text-sm mt-2 inline-block">View All Renewals →</a>
            </div>
        </div>
    </div>

    <!-- Export Options -->
    <div class="mt-8">
        <h3 class="font-semibold text-gray-700 mb-4">Export Reports</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gray-50 p-4 rounded shadow border">
                <h4 class="font-medium mb-2 text-gray-700">Financial Reports</h4>
                <div class="flex space-x-2">
                    <button class="bg-blue-600 text-white px-3 py-1 text-sm rounded hover:bg-blue-700">PDF</button>
                    <button class="bg-green-600 text-white px-3 py-1 text-sm rounded hover:bg-green-700">Excel</button>
                    <button class="bg-gray-600 text-white px-3 py-1 text-sm rounded hover:bg-gray-700">CSV</button>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded shadow border">
                <h4 class="font-medium mb-2 text-gray-700">Property Portfolio</h4>
                <div class="flex space-x-2">
                    <button class="bg-blue-600 text-white px-3 py-1 text-sm rounded hover:bg-blue-700">PDF</button>
                    <button class="bg-green-600 text-white px-3 py-1 text-sm rounded hover:bg-green-700">Excel</button>
                    <button class="bg-gray-600 text-white px-3 py-1 text-sm rounded hover:bg-gray-700">CSV</button>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded shadow border">
                <h4 class="font-medium mb-2 text-gray-700">Tenant Records</h4>
                <div class="flex space-x-2">
                    <button class="bg-blue-600 text-white px-3 py-1 text-sm rounded hover:bg-blue-700">PDF</button>
                    <button class="bg-green-600 text-white px-3 py-1 text-sm rounded hover:bg-green-700">Excel</button>
                    <button class="bg-gray-600 text-white px-3 py-1 text-sm rounded hover:bg-gray-700">CSV</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule Reports -->
    <div class="mt-8 bg-gray-50 p-4 rounded-lg border">
        <h3 class="font-semibold text-gray-700 mb-3">Schedule Reports</h3>
        <div class="flex flex-wrap items-end gap-4">
            <div>
                <label class="block text-sm text-gray-600 mb-1">Report Type</label>
                <select class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded leading-tight focus:outline-none focus:border-blue-500">
                    <option>Financial Summary</option>
                    <option>Occupancy Report</option>
                    <option>Maintenance Summary</option>
                    <option>Property Performance</option>
                </select>
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Frequency</label>
                <select class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded leading-tight focus:outline-none focus:border-blue-500">
                    <option>Daily</option>
                    <option>Weekly</option>
                    <option>Monthly</option>
                    <option>Quarterly</option>
                </select>
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Recipients</label>
                <input type="text" placeholder="Email addresses" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded leading-tight focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Schedule</button>
            </div>
        </div>
    </div>
</div>
@endsection