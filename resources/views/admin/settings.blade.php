@extends('layouts.admin')

@section('page-title', 'Settings Management')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Contact Settings</h2>
        <p class="text-gray-600 mt-1">Manage your business contact information and availability</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
        {{ session('success') }}
    </div>
    @endif

    <!-- Settings Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
            @csrf

            <!-- Contact Number Field -->
            <div>
                <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-1">Main Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number', $contactNumber) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., +6281234567890">
                <p class="mt-1 text-xs text-gray-500">Enter the primary phone number that visitors can use to reach your business</p>
            </div>

            <!-- Contact Email Field -->
            <div>
                <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-1">Contact Email</label>
                <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $contactEmail) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., info@ticash.com">
                <p class="mt-1 text-xs text-gray-500">Primary email address for customer inquiries and business communications</p>
            </div>

            <!-- WhatsApp Number Field -->
            <div>
                <label for="whatsapp_number" class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $whatsappNumber) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., +6281234567890">
                <p class="mt-1 text-xs text-gray-500">WhatsApp number for direct messaging and instant customer support</p>
            </div>

            <!-- Office Hours Field -->
            <div>
                <label for="office_hours" class="block text-sm font-medium text-gray-700 mb-1">Office Hours</label>
                <input type="text" id="office_hours" name="office_hours" value="{{ old('office_hours', $officeHours) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Monday-Friday, 9AM-5PM">
                <p class="mt-1 text-xs text-gray-500">Specify your operating hours for customer reference and availability information</p>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                    Update Settings
                </button>
            </div>
        </form>
    </div>

    <!-- Additional Info Section -->
    <div class="mt-6 pt-6 border-t border-gray-200 text-sm text-gray-600">
        <div class="flex flex-col sm:flex-row items-center justify-between">
            <div class="flex items-center space-x-3 mb-2 sm:mb-0">
                <div class="flex items-center space-x-1">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <span>Settings Active</span>
                </div>
                <span class="hidden sm:inline">•</span>
                <span class="block sm:inline">Last updated: <span class="font-medium text-gray-800">{{ now()->format('M d, Y \a\t g:i A') }}</span></span>
            </div>
            <div class="flex items-center space-x-2 text-xs bg-gray-100 px-3 py-1 rounded-full">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>4 Fields • Secure</span>
            </div>
        </div>
    </div>
</div>
@endsection