<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tenant - Real Estate Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-indigo-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-2xl font-bold">Real Estate Management</h1>
            <div>
                <a href="{{ route('tenants.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Back to Tenants</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white ml-4">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 px-4">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Add New Tenant</h2>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- Add Tenant Form -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('tenants.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="inquiry_id" class="block text-sm font-medium text-gray-700">Select Client (Approved Inquiry)</label>
                    <select name="inquiry_id" id="inquiry_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select an approved inquiry</option>
                        @foreach ($inquiries as $inquiry)
                            <option value="{{ $inquiry->id }}">
                                Client ID: {{ $inquiry->user_id }} - {{ $inquiry->user->name }} - {{ $inquiry->property->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('inquiry_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    @if ($inquiries->isEmpty())
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 rounded">
        No approved clients available to add as tenants.
    </div>
@endif
                </div>
                <div class="mb-4">
                    <label for="clientStatus" class="block text-sm font-medium text-gray-700">Client Status</label>
                    <select name="clientStatus" id="clientStatus" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="renting">Renting</option>
                        <option value="buying">Buying</option>
                    </select>
                    @error('clientStatus')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add Tenant</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>