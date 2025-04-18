<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <span class="text-2xl font-bold text-indigo-700">Property Owner</span>
            </div>

            <!-- Desktop Nav -->
            <div class=" md:flex items-center space-x-8 text-gray-700 font-medium">
                <a href="{{ route('owner.dashboard') }}" class="hover:text-indigo-600 transition">Dashboard</a>
                <a href="{{ route('properties.index') }}" class="hover:text-indigo-600 transition">Properties</a>
                <a href="{{ route('owner.upload') }}" class="hover:text-indigo-600 transition">Upload Property</a>
                <a href="{{ route('owner.tenants') }}" class="hover:text-indigo-600 transition">Tenants</a>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-3 font-medium text-gray-700">
        <a href="{{ route('owner.dashboard') }}" class="block hover:text-indigo-600 transition">Dashboard</a>
        <a href="#" class="block hover:text-indigo-600 transition">Properties</a>
        <a href="#" class="block hover:text-indigo-600 transition">Upload Property</a>
        <a href="#" class="block hover:text-indigo-600 transition">Tenants</a>
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
