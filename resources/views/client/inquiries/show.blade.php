@extends('layouts.client')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Inquiry Details
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Submitted on {{ $inquiry->created_at->format('M d, Y h:i A') }}
            </p>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <h4 class="text-sm font-medium text-gray-500">Property</h4>
                    <div class="mt-2 flex items-center">
                        @if($inquiry->property->image && file_exists(public_path('storage/properties/' . $inquiry->property->image)))
                            <img class="h-12 w-12 rounded-full object-cover mr-3" 
                                src="{{ asset('storage/properties/' . $inquiry->property->image) }}" 
                                alt="{{ $inquiry->property->name }}"
                                onerror="this.style.display='none'">
                        @endif
                        <div>
                            <p class="text-lg font-medium text-gray-900">{{ $inquiry->property->name }}</p>
                            <p class="text-sm text-gray-500">{{ $inquiry->property->city }}</p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Your Message</h4>
                    <p class="mt-2 text-sm text-gray-900 whitespace-pre-line">{{ $inquiry->message }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Requested Appointment</h4>
                    <p class="mt-2 text-sm text-gray-900">
                        @if($inquiry->appointment_date)
                            {{ \Carbon\Carbon::parse($inquiry->appointment_date)->format('M d, Y h:i A') }}
                        @else
                            No appointment requested
                        @endif
                    </p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Status</h4>
                    @php
                        $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-800',
                            'approved' => 'bg-green-100 text-green-800',
                            'rejected' => 'bg-red-100 text-red-800'
                        ];
                    @endphp
                    <span class="mt-2 px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $statusColors[$inquiry->status] }}">
                        {{ ucfirst($inquiry->status) }}
                    </span>
                </div>
                
                @if($inquiry->owner_response)
                <div class="sm:col-span-2">
                    <h4 class="text-sm font-medium text-gray-500">Owner's Response</h4>
                    <p class="mt-2 text-sm text-gray-900 whitespace-pre-line">{{ $inquiry->owner_response }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="mt-6">
        <a href="{{ route('client.inquiries.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
            Back to My Inquiries
        </a>
    </div>
</div>
@endsection