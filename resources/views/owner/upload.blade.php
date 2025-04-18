<!-- resources/views/properties/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="bg-indigo-600 py-4 px-6">
            <h1 class="text-2xl font-bold text-white">Add New Property</h1>
            <p class="text-indigo-100">List your property for rent or sale</p>
        </div>
        
        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                    <p class="font-bold">Please fix the following errors:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('owner.upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="md:col-span-2">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Basic Information</h2>
                    </div>
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Property Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Listing Type</label>
                        <select name="type" id="type" required
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="rent" {{ old('type') == 'rent' ? 'selected' : '' }}>For Rent</option>
                            <option value="sale" {{ old('type') == 'sale' ? 'selected' : '' }}>For Sale</option>
                        </select>
                    </div>
                    
                    <!-- Property Category -->
                    <div>
                        <label for="property_type" class="block text-sm font-medium text-gray-700 mb-1">Property Category</label>
                        <select name="property_type" id="property_type" required onchange="updateSubtypes()"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">Select Category</option>
                            <option value="land" {{ old('property_type') == 'land' ? 'selected' : '' }}>Land</option>
                            <option value="building" {{ old('property_type') == 'building' ? 'selected' : '' }}>Building</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="property_subtype" class="block text-sm font-medium text-gray-700 mb-1">Property Subtype</label>
                        <select name="property_subtype" id="property_subtype" required
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">Select Subtype</option>
                            <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>
                    
                    <!-- Location Information -->
                    <div class="md:col-span-2">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Location</h2>
                    </div>
                    
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <input type="text" name="city" id="city" value="{{ old('city') }}" required 
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" 
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Optional but recommended for better location accuracy</p>
                    </div>
                    
                    <!-- Status and Price -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status" required
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                            <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>Rented</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <span class="text-gray-500">$</span>
                            </div>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" min="0" step="0.01" required 
                                class="w-full pl-8 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <p class="mt-1 text-xs text-gray-500" id="price-label">Per month for rentals, total amount for sales</p>
                    </div>
                    
                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Property Description</label>
                        <textarea name="description" id="description" rows="4" 
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Describe your property features, amenities, and highlights...">{{ old('description') }}</textarea>
                    </div>
                    
                    <!-- Image Upload -->
                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Property Image</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Upload a main image for your property listing</p>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end space-x-8">
    <a href="{{ route('properties.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md">
        Cancel
    </a>
    <button type="submit" class="inline-flex items-center px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md shadow-sm">
        Upload Property
    </button>
</div>

            </form>
        </div>
    </div>
</div>

<script>
    // Update subtypes based on property type selection
    function updateSubtypes() {
        const propertyType = document.getElementById('property_type').value;
        const subtypeSelect = document.getElementById('property_subtype');
        
        // Clear existing options
        subtypeSelect.innerHTML = '<option value="">Select Subtype</option>';
        
        if (propertyType === 'land') {
            // Add land subtypes
            const landSubtypes = [
                { value: 'residential_plot', text: 'Residential Plot' },
                { value: 'commercial_plot', text: 'Commercial Plot' }
            ];
            
            landSubtypes.forEach(subtype => {
                const option = document.createElement('option');
                option.value = subtype.value;
                option.textContent = subtype.text;
                subtypeSelect.appendChild(option);
            });
        } 
        else if (propertyType === 'building') {
            // Add building subtypes
            const buildingSubtypes = [
                { value: 'apartment', text: 'Apartment' },
                { value: 'office', text: 'Office' }
            ];
            
            buildingSubtypes.forEach(subtype => {
                const option = document.createElement('option');
                option.value = subtype.value;
                option.textContent = subtype.text;
                subtypeSelect.appendChild(option);
            });
        }
    }
    
    // Update price label based on type selection
    document.getElementById('type').addEventListener('change', function() {
        const priceLabel = document.getElementById('price-label');
        if (this.value === 'rent') {
            priceLabel.textContent = 'Per month for rentals';
        } else {
            priceLabel.textContent = 'Total amount for sales';
        }
    });
    
    // Initialize subtypes when page loads (for form with validation errors)
    document.addEventListener('DOMContentLoaded', function() {
        updateSubtypes();
        
        // If there's a previously selected subtype (when validation fails), set it again
        const oldSubtype = "{{ old('property_subtype') }}";
        if (oldSubtype) {
            const subtypeSelect = document.getElementById('property_subtype');
            for (let i = 0; i < subtypeSelect.options.length; i++) {
                if (subtypeSelect.options[i].value === oldSubtype) {
                    subtypeSelect.options[i].selected = true;
                    break;
                }
            }
        }
    });
</script>
@endsection