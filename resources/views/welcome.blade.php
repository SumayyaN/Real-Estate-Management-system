<!DOCTYPE html>
<html lang="en">
<head>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coderants Real Estate | Professional Real Estate Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }
        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-white text-gray-900">
    <!-- Navigation -->
    <nav 
    x-data="{ 
        lastScroll: 0, 
        isHidden: false,
        mobileOpen: false,
        dropdownOpen: { properties: false, services: false }
    }"
    @scroll.window.throttle="
        const current = window.scrollY;
        isHidden = current > lastScroll && current > 100;
        lastScroll = current <= 0 ? 0 : current;
    "
    :class="{
        'transform -translate-y-full': isHidden,
        'shadow-lg': window.scrollY > 10
    }"
    class="bg-white/80 shadow-sm py-4 px-6 lg:px-12 fixed top-0 left-0 right-0 z-50 backdrop-blur-sm transition-transform duration-300"
>
    <!-- Original Container (No visual changes) -->
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Original Logo -->
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="ml-2 text-xl font-bold text-gray-800">Coderants Real Estate</span>
        </div>

        <!-- Mobile Toggle (Hidden on desktop) -->
        <button @click="mobileOpen = !mobileOpen" class="md:hidden text-gray-700">
            <svg x-show="!mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Original Desktop Menu (Unchanged) -->
        <div class="hidden md:flex space-x-8">
            <a href="#" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
            
            <!-- Properties Dropdown -->
            <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <a href="#" class="text-gray-700 hover:text-indigo-600 font-medium flex items-center">
                    Properties
                    <svg :class="{ 'rotate-180': open }" class="h-4 w-4 ml-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
                <div x-show="open" x-transition class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                    <!-- Original dropdown items -->
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">All Properties</a>
    <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Buildings</a>
    <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Land</a>
    
                </div>
            </div>
            
            <!-- Services Dropdown -->
            <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <a href="#" class="text-gray-700 hover:text-indigo-600 font-medium flex items-center">
                    Services
                    <svg :class="{ 'rotate-180': open }" class="h-4 w-4 ml-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
                
                <div x-show="open" x-transition class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                    <!-- Original dropdown items -->
                    <a href="{{route('owner.request.form')}}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Tenant Management</a>
    <a href="{{route('owner.request.form')}}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Property Valuation</a>
    <a href="{{route('owner.request.form')}}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Property Renting and buying</a>
    <a href="{{route('owner.request.form')}}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Property Marketing</a>
    <a href="{{route('owner.request.form')}}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Rent Collection</a>
                </div>
            </div>

            <a href="{{route('aboutus')}}" class="text-gray-700 hover:text-indigo-600 font-medium">About Us</a>
           
        </div>

        <!-- Original Auth Buttons -->
        <div class="flex items-center space-x-4">
            
            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-indigo-600 font-medium">Login</a>
            <a href="{{ route('owner.request.form') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">Become Owner</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">Register</a>
        </div>
    </div>

    <!-- Mobile Menu (Hidden on desktop) -->
    <div x-show="mobileOpen" @click.away="mobileOpen = false" 
         class="md:hidden bg-white/95 backdrop-blur-sm mt-4 py-2 px-6 shadow-xl">
        <!-- Original links adapted for mobile -->
        <a href="#" class="block py-3 text-gray-700 hover:text-indigo-600 border-b border-gray-100">Home</a>
        
        <!-- Mobile Dropdowns -->
        <div x-data="{ open: false }" class="py-3 border-b border-gray-100">
            <button @click="open = !open" class="flex justify-between items-center w-full text-gray-700">
                <span>Properties</span>
                <svg :class="{ 'rotate-180': open }" class="h-4 w-4 ml-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div x-show="open" class="pl-4 mt-2 space-y-2">
                <!-- Original dropdown items -->
            </div>
        </div>
        
        <!-- Repeat for other dropdowns -->
    </div>
</nav>

    <!-- Hero Section -->
    <section class="hero-gradient py-16 px-6 lg:py-24 lg:px-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                    Professional <span class="text-indigo-600">Real Estate</span> Management Solutions
                </h1>
                <p class="text-lg text-gray-600 mb-8">
                    Streamline your property portfolio with our comprehensive management platform. From tenant screening to maintenance tracking, we've got you covered.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{route('register')}}" class="px-8 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300 text-center font-medium">
                        Get Started
                    </a>
                    <a href="{{route('register')}}" class="px-8 py-3 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition duration-300 text-center font-medium">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Modern apartment building" class="rounded-lg shadow-xl w-full h-auto">
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-lg shadow-md hidden lg:block">
                    <div class="flex items-center">
                        <div class="p-2 bg-indigo-100 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Managed Properties</p>
                            <p class="font-bold text-gray-800">1,250+</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 px-6 lg:py-24 lg:px-12 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Comprehensive Property Management</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Our platform provides everything you need to efficiently manage your real estate portfolio
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-50 p-8 rounded-lg hover:bg-indigo-50 transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Tenant Screening</h3>
                    <p class="text-gray-600">
                        Comprehensive background checks and credit reports to help you find the best tenants for your properties.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-gray-50 p-8 rounded-lg hover:bg-indigo-50 transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Rent Collection</h3>
                    <p class="text-gray-600">
                        Automated rent collection with online payment options, reducing late payments and administrative work.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-gray-50 p-8 rounded-lg hover:bg-indigo-50 transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Financial Reporting</h3>
                    <p class="text-gray-600">
                        Detailed financial reports and analytics to help you track income, expenses, and property performance.
                    </p>
                </div>
                
                <!-- Feature 4 -->
                <div class="bg-gray-50 p-8 rounded-lg hover:bg-indigo-50 transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Maintenance Tracking</h3>
                    <p class="text-gray-600">
                        Streamlined maintenance requests and tracking to keep your properties in top condition.
                    </p>
                </div>
                
                <!-- Feature 5 -->
                <div class="bg-gray-50 p-8 rounded-lg hover:bg-indigo-50 transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Tenant Portal</h3>
                    <p class="text-gray-600">
                        Self-service portal for tenants to pay rent, submit requests, and communicate with property managers.
                    </p>
                </div>
                
                <!-- Feature 6 -->
                <div class="bg-gray-50 p-8 rounded-lg hover:bg-indigo-50 transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Legal Compliance</h3>
                    <p class="text-gray-600">
                        Stay compliant with local, state, and federal housing regulations with our built-in compliance tools.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Property Showcase -->
    <section class="py-16 px-6 lg:py-24 lg:px-12 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Featured Properties</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Browse some of the properties currently under our management
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Property 1 -->
                <div class="property-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Modern apartment" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-medium">
                            For Rent
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Downtown Luxury Loft</h3>
                        <p class="text-gray-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Downtown, City Center
                        </p>
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <span class="text-gray-900 font-bold">$2,400</span>
                                <span class="text-gray-500 text-sm">/month</span>
                            </div>
                            <div class="flex space-x-2">
                                <span class="text-gray-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    2
                                </span>
                                <span class="text-gray-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    1
                                </span>
                                <span class="text-gray-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                    </svg>
                                    850 sqft
                                </span>
                            </div>
                        </div>
                        <a href="{{route('register')}}" class="block w-full text-center px-4 py-2 border border-indigo-600 text-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white transition duration-300">
                            View Details
                        </a>
                    </div>
                </div>
                
                <!-- Property 2 -->
                <div class="property-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Modern house" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-medium">
                            For Sale
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Suburban Family Home</h3>
                        <p class="text-gray-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Green Valley Suburb
                        </p>
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <span class="text-gray-900 font-bold">$425,000</span>
                            </div>
                            <div class="flex space-x-2">
                                <span class="text-gray-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    4
                                </span>
                                <span class="text-gray-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    2.5
                                </span>
                                <span class="text-gray-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                    </svg>
                                    2,150 sqft
                                </span>
                            </div>
                        </div>
                        <a href="{{route('register')}}" class="block w-full text-center px-4 py-2 border border-indigo-600 text-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white transition duration-300">
                            View Details
                        </a>
                    </div>
                </div>
                
                <!-- Property 3 -->
                <div class="property-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Modern kitchen" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-medium">
                            For Rent
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Lakeside Condo</h3>
                        <p class="text-gray-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Lakeside District
                        </p>
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <span class="text-gray-900 font-bold">$1,850</span>
                                <span class="text-gray-500 text-sm">/month</span>
                            </div>
                            <div class="flex space-x-2">
                                <span class="text-gray-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    1
                                </span>
                                <span class="text-gray-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    1
                                </span>

                                <span class="text-gray-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                    </svg>
                                    650 sqft
                                </span>
                            </div>
                        </div>
                        <a href="{{route('register')}}" class="block w-full text-center px-4 py-2 border border-indigo-600 text-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white transition duration-300">
                            View Details
                        </a>
                    </div>

                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="{{route('register')}}" class="inline-block px-8 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300 font-medium">
                    View All Properties
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 px-6 lg:py-24 lg:px-12 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Don't just take our word for it - hear from some of our satisfied property owners
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 p-8 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6">
                        "Coderants Real Estate has completely transformed how I manage my rental properties. The automated rent collection alone has saved me hours each month, and their maintenance coordination is top-notch."
                    </p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Sarah Johnson" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                            <p class="text-gray-600 text-sm">Property Owner - 8 units</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 p-8 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6">
                        "As a first-time landlord, I was overwhelmed with all the regulations and paperwork. Coderants Real Estate made everything simple and took the stress out of property management."
                    </p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Michael Chen</h4>
                            <p class="text-gray-600 text-sm">Property Owner - 2 units</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-gray-50 p-8 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6">
                        "The financial reporting tools have given me incredible insight into my property investments. I can now make data-driven decisions to maximize my returns."
                    </p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Jessica Williams" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Jessica Williams</h4>
                            <p class="text-gray-600 text-sm">Property Investor - 15 units</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-6 lg:py-24 lg:px-12 bg-indigo-600 text-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">Ready to Simplify Your Property Management?</h2>
            <p class="text-lg mb-8 max-w-3xl mx-auto">
                Join hundreds of property owners who are saving time and increasing their returns with Coderants Real Estate.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-indigo-600 rounded-md hover:bg-gray-100 transition duration-300 font-medium">
                    Get Started for Free
                </a>
                <a href="{{route('register')}}" class="px-8 py-3 border border-white text-white rounded-md hover:bg-indigo-700 transition duration-300 font-medium">
                    Schedule a Demo
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12 px-6 lg:px-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ml-2 text-xl font-bold text-white">Coderants Real Estate</span>
                </div>
                <p class="mb-4">
                    Professional real estate management solutions for property owners and investors.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 class="text-white font-semibold text-lg mb-4">Company</h3>
                <ul class="space-y-2">
                    <li><a href="{{route('aboutus')}}" class="hover:text-white transition duration-300">About Us</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Careers</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Blog</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Press</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Partners</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-white font-semibold text-lg mb-4">Solutions</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white transition duration-300">Residential buildings</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Commercial buildings</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">commercial plot</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300"></a>Residential plot</li>
                   
                </ul>
            </div>
            
            <div>
                <h3 class="text-white font-semibold text-lg mb-4">Support</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white transition duration-300">Help Center</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Community</a></li>
                    <li><a href="{{route('aboutus')}}" class="hover:text-white transition duration-300">Contact Us</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto mt-12 pt-8 border-t border-gray-800 text-sm text-center">
            <p>&copy; 2025 Coderants Real Estate. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>