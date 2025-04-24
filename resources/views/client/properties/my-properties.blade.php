@extends('layouts.client')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold mb-6">My Properties</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($properties as $property)
            @php
                // Get all relevant inquiries for this property
                $userInquiries = $property->inquiries->where('user_id', auth()->id());
            @endphp
            
            @foreach($userInquiries as $inquiry)
                <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    @if($property->image && file_exists(public_path('storage/' . $property->image)))
                        <img src="{{ asset('storage/' . $property->image) }}" 
                            alt="{{ $property->name }}" 
                            class="w-full h-48 object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-48 bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-500\'>No Image</span></div>'">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <h2 class="text-xl font-bold">{{ $property->name }}</h2>
                            <span class="px-2 py-1 rounded text-sm 
                                @if($inquiry->clientStatus === 'renting') bg-green-100 text-green-800
                                @elseif($inquiry->clientStatus === 'bought') bg-purple-100 text-purple-800
                                @endif">
                                {{ ucfirst($inquiry->clientStatus) }}
                            </span>
                        </div>
                        <p class="text-gray-600 mt-2">{{ Str::limit($property->description, 100) }}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="font-bold text-lg">${{ number_format($property->price) }}</span>
                            <a href="{{ route('client.properties.show', $property) }}" class="text-blue-600 hover:text-blue-800">
                                View Details →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

    <div class="mt-8">
        {{ $properties->links() }}
    </div>
</div>
@endsection