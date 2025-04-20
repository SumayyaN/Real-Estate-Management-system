<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <span class="text-2xl font-bold text-indigo-700">Property Owner</span>
            </div>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('owner.dashboard') }}" 
                   class="text-gray-700 font-medium hover:text-indigo-600 transition duration-150 ease-in-out">
                    Home
                </a>
                <a href="{{ route('properties.index') }}" 
                   class="text-gray-700 font-medium hover:text-indigo-600 transition duration-150 ease-in-out">
                    Properties
                </a>
                <a href="{{ route('owner.upload') }}" 
                   class="text-gray-700 font-medium hover:text-indigo-600 transition duration-150 ease-in-out">
                    Upload Property
                </a>
                <a href="{{ route('tenants.index') }}" 
                   class="text-gray-700 font-medium hover:text-indigo-600 transition duration-150 ease-in-out">
                    Tenants
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 text-white text-xs font-semibold uppercase tracking-widest rounded-md transition focus:outline-none focus:ring focus:ring-indigo-300">
                        Log Out
                    </button>
                </form>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-gray-700 focus:outline-none" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-3">
        <a href="{{ route('owner.dashboard') }}" 
           class="block text-gray-700 font-medium hover:text-indigo-600 transition duration-150 ease-in-out">
            Dashboard
        </a>
        <a href="{{ route('properties.index') }}" 
           class="block text-gray-700 font-medium hover:text-indigo-600 transition duration-150 ease-in-out">
            Properties
        </a>
        <a href="{{ route('owner.upload') }}" 
           class="block text-gray-700 font-medium hover:text-indigo-600 transition duration-150 ease-in-out">
            Upload Property
        </a>
        <a href="{{ route('tenants.index') }}" 
           class="block text-gray-700 font-medium hover:text-indigo-600 transition duration-150 ease-in-out">
            Tenants
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="block w-full text-left inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 text-white text-xs font-semibold uppercase tracking-widest rounded-md transition focus:outline-none focus:ring focus:ring-indigo-300">
                Log Out
            </button>
        </form>
    </div>

    <!-- Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            toggleBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</nav>