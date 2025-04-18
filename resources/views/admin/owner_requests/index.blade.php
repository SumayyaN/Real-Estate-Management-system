@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold mb-6">Property Owner Requests</h2>

        @if (session('success'))
            <div class="bg-green-100 p-3 mb-4 rounded text-green-800">{{ session('success') }}</div>
        @endif
        @if (session('info'))
            <div class="bg-yellow-100 p-3 mb-4 rounded text-yellow-800">{{ session('info') }}</div>
        @endif

        <table class="w-full table-auto border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Phone</th>
                    <th class="p-2 border">Document</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ownerRequests as $request)
                    <tr>
                        <td class="p-2 border">{{ $request->name }}</td>
                        <td class="p-2 border">{{ $request->email }}</td>
                        <td class="p-2 border">{{ $request->phone }}</td>
                        <td class="p-2 border">
                            @if($request->document)
                                <a href="{{ Storage::url($request->document) }}" target="_blank" class="text-blue-500">View</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="p-2 border capitalize">{{ $request->status }}</td>
                        <td class="p-2 border">
                            @if ($request->status === 'pending')
                                <form action="{{ route('admin.owner-requests.approve', $request->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Approve</button>
                                </form>

                                <form action="{{ route('admin.owner-requests.reject', $request->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Reject</button>
                                </form>
                            @else
                                <span class="text-gray-500">No action</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $ownerRequests->links() }}
        </div>
    </div>
@endsection
