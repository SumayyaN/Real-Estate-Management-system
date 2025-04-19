@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Property Owner Requests</h2>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-200 shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        @if (session('info'))
            <div class="mb-4 p-4 rounded bg-yellow-100 text-yellow-800 border border-yellow-200 shadow-sm">
                {{ session('info') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Document</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ownerRequests as $request)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">{{ $request->name }}</td>
                            <td class="px-4 py-3">{{ $request->email }}</td>
                            <td class="px-4 py-3">{{ $request->phone }}</td>
                            <td class="px-4 py-3">
                                @if($request->document)
                                    <a href="{{ Storage::url($request->document) }}" target="_blank" class="text-blue-600 hover:underline">View</a>
                                @else
                                    <span class="text-gray-400">N/A</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 capitalize">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $request->status === 'approved' ? 'bg-green-100 text-green-700' : 
                                       ($request->status === 'rejected' ? 'bg-red-100 text-red-700' : 
                                       'bg-yellow-100 text-yellow-700') }}">
                                    {{ $request->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @if ($request->status === 'pending')
                                    <div class="flex space-x-2">
                                        <form action="{{ route('admin.owner-requests.approve', $request->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition duration-200 transform hover:scale-105">
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.owner-requests.reject', $request->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition duration-200 transform hover:scale-105">
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-gray-400 text-xs">No action</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">No owner requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $ownerRequests->links() }}
        </div>
    </div>
@endsection
