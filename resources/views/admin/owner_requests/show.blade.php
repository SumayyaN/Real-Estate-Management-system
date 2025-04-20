
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
