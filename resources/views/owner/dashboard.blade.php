@php
    use App\Models\Property;
    use App\Models\Inquiry;
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">
                    Welcome, {{ auth()->user()->name ?? 'Guest' }}!
                </h1>
                <p class="mt-2 text-gray-600">
                    Manage your properties and tenants with ease. Let's get started!
                </p>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                    <h3 class="text-sm font-medium text-gray-500">Total Properties</h3>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ $stats['total_properties'] ?? 0 }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                    <h3 class="text-sm font-medium text-gray-500">Occupied Units</h3>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ $stats['occupied_units'] ?? 0 }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                    <h3 class="text-sm font-medium text-gray-500">Pending Appointments</h3>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ $stats['pending_applications'] ?? 0 }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                    <h3 class="text-sm font-medium text-gray-500">Monthly Income (This Month)</h3>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900">${{ number_format($stats['rental_income'] ?? 0, 2) }}</p>
                </div>
            </div>

            <!-- Add First Property CTA -->
            <div class="mb-8 text-center">
                <a href="{{ route('owner.upload') }}"
                   class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md transition focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    Add Your Property
                </a>
            </div>

            <!-- Quick Links -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Links</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('properties.index') }}"
                       class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-gray-700 hover:text-indigo-600">
                        Manage Properties
                    </a>
                    <a href="{{ route('tenants.index') }}"
                       class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-gray-700 hover:text-indigo-600">
                        View Tenants
                    </a>
                    <a href="{{ route('profile.show') }}"
                       class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-gray-700 hover:text-indigo-600">
                        Account Settings
                    </a>
                    <a href="{{ route('profile.show') }}#password"
                       class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-gray-700 hover:text-indigo-600">
                        Change Password
                    </a>
                    <a href="{{ url('/support') }}"
                       class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-gray-700 hover:text-indigo-600">
                        Support / Help Center
                    </a>
                </div>
            </div>

            <!-- Notifications Panel -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Notifications</h3>
                @if(empty($inquiries) || $inquiries->isEmpty())
                    <p class="text-gray-600">No new notifications at this time.</p>
                @else
                    <ul class="space-y-4">
                        @foreach($inquiries as $inquiry)
                            <li class="border-b pb-4">
                                <p class="text-gray-800">
                                    <strong>{{ $inquiry->user->name ?? 'Unknown Client' }}</strong> sent a message about
                                    <strong>{{ $inquiry->property->name ?? 'Unknown Property' }}</strong>:
                                </p>
                                <p class="text-gray-600 mt-1">{{ $inquiry->message }}</p>
                                <p class="text-gray-600 mt-1">
                                    <strong>Appointment Requested:</strong>
                                    @if($inquiry->appointment_date)
                                        {{ $inquiry->appointment_date instanceof \Carbon\Carbon
                                            ? $inquiry->appointment_date->format('M d, Y H:i')
                                            : Carbon::parse($inquiry->appointment_date)->format('M d, Y H:i') }}
                                    @else
                                        Not specified
                                    @endif
                                </p>
                                <p class="text-gray-600 mt-1">
                                    <strong>Status:</strong> {{ ucfirst($inquiry->status) }}
                                </p>
                                @if($inquiry->status === 'pending')
                                    <div class="mt-2 flex space-x-4">
                                        <form action="{{ route('owner.inquiry.approve', $inquiry->id) }}" method="POST">
                                            @csrf
                                            <button
                                                type="submit"
                                                class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md transition"
                                            >
                                                Approve Appointment
                                            </button>
                                        </form>
                                        <form action="{{ route('owner.inquiry.reject', $inquiry->id) }}" method="POST">
                                            @csrf
                                            <button
                                                type="submit"
                                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md transition"
                                            >
                                                Reject Appointment
                                            </button>
                                        </form>
                                    </div>
                                    <!-- Optional Response Form -->
                                    <form action="{{ route('owner.inquiry.respond', $inquiry->id) }}" method="POST" class="mt-4">
                                        @csrf
                                        <textarea
                                            name="owner_response"
                                            class="w-full p-2 border rounded-md focus:ring-indigo-300 focus:border-indigo-500"
                                            rows="3"
                                            placeholder="Add an optional response..."
                                        ></textarea>
                                        <button
                                            type="submit"
                                            class="mt-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md transition"
                                        >
                                            Send Response
                                        </button>
                                    </form>
                                @else
                                    @if($inquiry->owner_response)
                                        <p class="text-gray-600 mt-2">
                                            <strong>Your Response:</strong> {{ $inquiry->owner_response }}
                                        </p>
                                    @endif
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>