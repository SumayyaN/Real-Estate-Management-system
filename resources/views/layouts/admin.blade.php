<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-r border-gray-200 shadow-md hidden md:flex flex-col">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-blue-600">RealEstatePro</h1>
            </div>

            <nav class="flex-1 overflow-y-auto px-4 space-y-1 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 font-medium">Dashboard</a>

                <p class="text-xs uppercase text-gray-400 mt-4 mb-1">Properties</p>

                <a href="{{ route('admin.properties.index') }}" class="block py-2 px-3 rounded-lg hover:bg-blue-50 hover:text-blue-600">📋 All Properties</a>
                {{-- By Type --}}
<div x-data="{ open: false }">
    <button @click="open = !open" class="w-full text-left py-2 px-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 flex justify-between items-center">
        🏷️ By Type
        <svg :class="{ 'rotate-90': open }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
    <div x-show="open" class="ml-4 space-y-2 mt-2" x-cloak>  <!-- Adjusted spacing for better clarity -->
        <p class="text-xs text-gray-400">🏞️ Land</p>
        <a href="{{ route('admin.properties.byType', ['type' => 'land', 'subtype' => 'residential_plot']) }}" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">• Residential Plot</a>
        <a href="{{ route('admin.properties.byType', ['type' => 'land', 'subtype' => 'commercial_plot']) }}" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">• Commercial Plot</a>

        <p class="text-xs text-gray-400 mt-4">🏢 Buildings</p>
        <a href="{{ route('admin.properties.byType', ['type' => 'building', 'subtype' => 'apartment']) }}" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">• Apartments</a>
        <a href="{{ route('admin.properties.byType', ['type' => 'building', 'subtype' => 'office']) }}" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">• Offices</a>
    </div>
</div>

{{-- By Status --}}
<div x-data="{ open: false }" class="mt-4">
    <button @click="open = !open" class="w-full text-left py-2 px-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 flex justify-between items-center">
        🗂️ By Status
        <svg :class="{ 'rotate-90': open }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
    <div x-show="open" class="ml-4 space-y-2 mt-2" x-cloak>  <!-- Adjusted spacing for better clarity -->
        <a href="{{ route('admin.properties.byStatus', 'available') }}" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">✅ Available</a>
        <a href="{{ route('admin.properties.byStatus', 'sold') }}" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">🏷️ Sold</a>
        <a href="{{ route('admin.properties.byStatus', 'rented') }}" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">🔒 Rented</a>
    </div>
</div>


                <p class="text-xs uppercase text-gray-400 mt-4 mb-1">Users</p>
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left py-2 px-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 flex justify-between items-center">
                        👥 Users
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded">25</span>
                    </button>
                    <div x-show="open" class="ml-4 space-y-1 mt-1" x-cloak>
                        <a href="#" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600 flex justify-between">
                            • Clients <span class="text-xs bg-gray-100 text-gray-800 px-1.5 rounded">18</span>
                        </a>
                        <a href="#" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600 flex justify-between">
                            • Property Owners <span class="text-xs bg-gray-100 text-gray-800 px-1.5 rounded">7</span>
                        </a>
                        <a href="#" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">
                            • Add New User
                        </a>
                    </div>
                </div>

                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left py-2 px-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 flex justify-between items-center">
                        🔔 Owner Requests
                        <span class="text-xs bg-red-100 text-red-800 px-2 py-0.5 rounded">3</span>
                    </button>
                    <div x-show="open" class="ml-4 space-y-1 mt-1" x-cloak>
                        <a href="#" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600 flex justify-between">
                            • Pending <span class="text-xs bg-yellow-100 text-yellow-800 px-1.5 rounded">3</span>
                        </a>
                        <a href="#" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">
                            • Approved
                        </a>
                        <a href="#" class="block py-1 px-3 rounded hover:bg-blue-50 hover:text-blue-600">
                            • Rejected
                        </a>
                    </div>
                </div>


                <a href="#" class="block py-2 px-3 rounded-lg hover:bg-blue-50 hover:text-blue-600">Reports</a>
                <a href="#" class="block py-2 px-3 rounded-lg hover:bg-blue-50 hover:text-blue-600">Settings</a>

                <form method="POST" action="{{ route('logout') }}" class="mt-6">
                    @csrf
                    <button class="w-full bg-[#72C9FF] text-white font-semibold py-2 px-4 rounded hover:bg-[#5aaedb] transition duration-200">
                        Logout
                    </button>
                </form>

            </nav>
        </aside>

        {{-- Main Area --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- Top Navbar --}}
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <div class="text-xl font-bold text-blue-600">Admin Panel</div>

                <div class="flex items-center space-x-4">
                    {{-- Notifications --}}
                    <button class="relative text-gray-600 hover:text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M15 17h5l-1.405-1.405M19 13V9a7 7 0 10-14 0v4l-1.405 1.405M5 17h5m5 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1.5">3</span>
                    </button>

                    {{-- Profile Dropdown --}}
                    <div class="relative">
                        <button class="flex items-center text-sm font-medium focus:outline-none">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="avatar" class="w-8 h-8 rounded-full">
                            <span class="ml-2 hidden sm:inline">{{ Auth::user()->name }}</span>
                        </button>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>