<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate - Client</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<nav class="bg-blue-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex space-x-4">
            {{-- Available Properties Link --}}
            <a href="{{ route('client.properties.index') }}" 
               class="px-3 py-2 rounded hover:bg-blue-700 transition">
               Available Properties
            </a>
            
            {{-- My Properties Link --}}
            <a href="{{ route('client.properties.my-properties') }}" 
               class="px-3 py-2 rounded hover:bg-blue-700 transition">
               My Properties
            </a>
            
            {{-- My Inquiries Link --}}
            <a href="{{ route('client.inquiries.index') }}" 
               class="px-3 py-2 rounded hover:bg-blue-700 transition">
               My Inquiries
            </a>
        </div>
        
        {{-- Logout Button --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-3 py-2 rounded hover:bg-blue-700 transition">
                Logout
            </button>
        </form>
    </div>
</nav>
    <main class="container mx-auto py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>
    <script>
    // Clear filters button functionality
    document.addEventListener('DOMContentLoaded', function() {
        const clearFilters = document.getElementById('clear-filters');
        if (clearFilters) {
            clearFilters.addEventListener('click', function() {
                window.location.href = "{{ route('client.properties.index') }}";
            });
        }

        // Dynamic subtype filtering based on property type
        const propertyTypeSelect = document.getElementById('property_type');
        const subtypeSelect = document.getElementById('property_subtype');
        
        if (propertyTypeSelect && subtypeSelect) {
            propertyTypeSelect.addEventListener('change', function() {
                // You could implement AJAX here to fetch relevant subtypes
                // For now, we'll just enable/disable the subtype select
                subtypeSelect.disabled = !this.value;
            });
        }
    });
</script>
</body>
</html>