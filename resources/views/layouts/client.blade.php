<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
    .property-image {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }
    .no-image {
        height: 200px;
        width: 100%;
        background-color: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
    }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('client.properties.index') }}" class="text-lg font-semibold text-gray-900">
                        Coderants Real Estate
                    </a>
                    <div class="hidden md:flex space-x-4">
                        <a href="{{ route('client.properties.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            Available Properties
                        </a>
                        <a href="{{ route('client.properties.my-properties') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            My Properties
                        </a>
                        <a href="{{ route('client.inquiries.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            My Inquiries
                        </a>
                    </div>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center">
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" 
                                    class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" 
                                    id="user-menu-button" 
                                    aria-expanded="false" 
                                    aria-haspopup="true"
                                    onclick="toggleDropdown()">
                                <span class="sr-only">Open user menu</span>
                                    @auth
                                        @if(auth()->user()->profile_photo_path && Storage::disk('public')->exists(auth()->user()->profile_photo_path))
                                            <img class="h-8 w-8 rounded-full object-cover" 
                                                src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" 
                                                alt="{{ auth()->user()->name }}'s profile photo">
                                        @else
                                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">
                                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    @endauth
                                <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                                <!-- Chevron icon -->
                                <svg class="ml-1 h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Dropdown menu - show/hide based on dropdown state -->
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" 
                            role="menu" 
                            aria-orientation="vertical" 
                            aria-labelledby="user-menu-button" 
                            id="user-dropdown">
                            <div class="py-1" role="none">
                                <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    @csrf
                                    <button type="submit" class="w-full text-left">Sign out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('welcome'))
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            {{ session('welcome') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 rounded-lg border border-green-200">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        @endif
        
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <p class="text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} Coderants Real Estate. All rights reserved.
            </p>
        </div>
        
    </footer>
    <script>
    function toggleDropdown() {
        const dropdown = document.getElementById('user-dropdown');
        const button = document.getElementById('user-menu-button');
        
        // Toggle dropdown visibility
        dropdown.classList.toggle('hidden');
        
        // Update aria-expanded attribute
        const isExpanded = button.getAttribute('aria-expanded') === 'true';
        button.setAttribute('aria-expanded', !isExpanded);
        
        // Close when clicking outside
        document.addEventListener('click', function closeDropdown(e) {
            if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
                document.removeEventListener('click', closeDropdown);
            }
        });
    }
</script>
</body>
</html>