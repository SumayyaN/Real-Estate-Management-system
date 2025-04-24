<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Property Verification | {{ config('app.name', 'Luxury Estates') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;700&display=swap">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/css/app.css'])

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary: #1a365d;
            --primary-light: #2c5282;
            --secondary: #d4a017;
            --accent: #e2e8f0;
            --text: #2d3748;
            --text-light: #4a5568;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--text);
            background-color: #f8f9fa;
        }
        
        .hero-section {
            background-image: 
                linear-gradient(135deg, rgba(26, 54, 93, 0.85) 0%, rgba(42, 87, 141, 0.85) 100%),
                url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border-radius: 16px;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .header-font {
            font-family: 'Playfair Display', serif;
        }
        
        .input-field {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            background: rgba(255, 255, 255, 0.9);
        }
        
        .input-field:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 54, 93, 0.2);
        }
        
        .submit-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(26, 54, 93, 0.3);
        }
        
        .file-upload {
            background: rgba(241, 245, 249, 0.7);
            transition: all 0.3s ease;
        }
        
        .file-upload:hover {
            background: rgba(226, 232, 240, 0.9);
            border-color: var(--primary);
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--text-light);
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .divider::before {
            margin-right: 1rem;
        }
        
        .divider::after {
            margin-left: 1rem;
        }
        
        .success-message {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
            border-left: 4px solid #10b981;
        }
        
        .error-message {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%);
            border-left: 4px solid #ef4444;
        }
    </style>
</head>
<body>
    <div class="hero-section flex items-center justify-center p-6">
        <div class="w-full max-w-2xl mx-auto">
            <!-- Luxury Brand Header -->
            <div class="text-center mb-12">
                <div class="flex justify-center mb-4">
                    <div class="bg-white p-3 rounded-full shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2H5a1 1 0 010-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <h1 class="header-font text-4xl font-bold text-white mb-2">Coderants Real Estate Properties</h1>
                <p class="text-xl text-amber-100 font-light">Ownership Verification Portal</p>
            </div>

            <!-- Luxury Form Container -->
            <div class="form-container p-10">
                <!-- Form Header -->
                <div class="text-center mb-10">
                    <h2 class="header-font text-3xl font-bold text-gray-800 mb-2">Become Our Partner</h2>
                    <p class="text-gray-600">Complete this form to authenticate your ownership credentials</p>
                    
                    <!-- Progress Steps -->
                    <div class="flex justify-between items-center mt-6 mb-8 px-8">
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-amber-500 text-white flex items-center justify-center font-medium">1</div>
                            <span class="mt-2 text-xs font-medium text-gray-500">Details</span>
                        </div>
                        <div class="h-1 flex-1 bg-gray-200 mx-2"></div>
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-medium">2</div>
                            <span class="mt-2 text-xs font-medium text-gray-500">Verification</span>
                        </div>
                        <div class="h-1 flex-1 bg-gray-200 mx-2"></div>
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-medium">3</div>
                            <span class="mt-2 text-xs font-medium text-gray-500">Complete</span>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="success-message p-4 rounded mb-8 flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h4 class="font-medium text-green-800">Verification Submitted</h4>
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('owner.request.submit') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Legal Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-user"></i>
                            </div>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="input-field pl-10 w-full rounded-lg px-4 py-3 focus:outline-none"
                                placeholder="Enter your full name as on documents" required>
                        </div>
                        @error('name')
                            <div class="error-message p-3 rounded mt-2 flex items-start">
                                <i class="fas fa-exclamation-circle text-red-500 mr-2 mt-0.5"></i>
                                <p class="text-sm text-red-700">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Professional Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="input-field pl-10 w-full rounded-lg px-4 py-3 focus:outline-none"
                                placeholder="your@professional.email" required>
                        </div>
                        @error('email')
                            <div class="error-message p-3 rounded mt-2 flex items-start">
                                <i class="fas fa-exclamation-circle text-red-500 mr-2 mt-0.5"></i>
                                <p class="text-sm text-red-700">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- Phone Field -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Contact Number</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                class="input-field pl-10 w-full rounded-lg px-4 py-3 focus:outline-none"
                                placeholder="+256 7____-____" required>
                        </div>
                        @error('phone')
                            <div class="error-message p-3 rounded mt-2 flex items-start">
                                <i class="fas fa-exclamation-circle text-red-500 mr-2 mt-0.5"></i>
                                <p class="text-sm text-red-700">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- Document Upload -->
                    <div>
                        <label for="document" class="block text-sm font-medium text-gray-700 mb-2">Ownership Documents</label>
                        <label for="document" class="file-upload flex flex-col items-center justify-center w-full p-8 border-2 border-dashed rounded-lg cursor-pointer hover:border-primary transition">
                            <div class="text-center">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3"></i>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold text-primary">Click to upload</span> or drag and drop
                                </p>
                                <p class="text-xs text-gray-500 mt-1">PDF, JPG, or PNG (Max. 10MB)</p>
                            </div>
                            <input id="document" name="document" type="file" >
                        </label>
                        @error('document')
                            <div class="error-message p-3 rounded mt-2 flex items-start">
                                <i class="fas fa-exclamation-circle text-red-500 mr-2 mt-0.5"></i>
                                <p class="text-sm text-red-700">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox" class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#" class="text-primary hover:underline">verification terms</a></label>
                            <p class="text-gray-500">By submitting, you confirm the accuracy of provided information</p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="submit-btn w-full py-4 px-6 border border-transparent rounded-lg text-lg font-semibold text-white shadow-lg">
                            <div class="flex items-center justify-center">
                                <span>Become Property Ownership</span>
                                <i class="fas fa-arrow-right ml-3"></i>
                            </div>
                        </button>
                    </div>
                </form>

                <!-- Luxury Footer -->
                <div class="mt-10 pt-6 border-t border-gray-100">
                    <div class="text-center text-sm text-gray-500">
                        <p>Need assistance? Contact our <a href="#" class="text-primary font-medium hover:underline">verification specialists</a></p>
                        <p class="mt-1">Typically processed within 24-48 business hours</p>
                    </div>
                    <div class="flex justify-center mt-6 space-x-6">
                        <a href="#" class="text-gray-400 hover:text-primary">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stack('modals')
    @livewireScripts
</body>
</html>