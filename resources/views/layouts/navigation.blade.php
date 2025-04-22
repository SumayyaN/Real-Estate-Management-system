<!-- resources/views/layouts/navigation.blade.php -->
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
            </div>
            
            <!-- Right Side Of Navbar -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm pe-2 focus:outline-none">
                                {{ Auth::user()->name }}
                            </button>
                        </x-slot>
                        
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.edit') }}">
                                Profile
                            </x-dropdown-link>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 pe-4">Log in</a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-700">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>