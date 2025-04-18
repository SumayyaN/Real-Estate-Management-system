<!-- <x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owner Request Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><strong>Name:</strong> {{ $ownerRequest->name }}</p>
                    <p><strong>Email:</strong> {{ $ownerRequest->email }}</p>
                    <p><strong>Phone:</strong> {{ $ownerRequest->phone }}</p>
                    <p><strong>Requested At:</strong> {{ $ownerRequest->created_at }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($ownerRequest->status) }}</p>

                    <form action="{{ route('admin.owner-requests.update', $ownerRequest->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mt-4">
                            <button type="submit" name="status" value="approved" class="px-4 py-2 bg-green-600 text-white rounded">Approve</button>
                            <button type="submit" name="status" value="rejected" class="px-4 py-2 bg-red-600 text-white rounded">Reject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout> -->
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Owner Request Details</h1>

        <p><strong>Name:</strong> {{ $ownerRequest->name }}</p>
        <p><strong>Email:</strong> {{ $ownerRequest->email }}</p>
        <p><strong>Message:</strong> {{ $ownerRequest->message }}</p>
        <!-- Add other fields as needed -->

        <form action="{{ route('admin.owner-requests.approve', $ownerRequest->id) }}" method="POST" style="display: inline-block;">
            @csrf
            <button type="submit" class="btn btn-success">Approve</button>
        </form>

        <form action="{{ route('admin.owner-requests.reject', $ownerRequest->id) }}" method="POST" style="display: inline-block;">
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
        </form>
    </div>
@endsection
