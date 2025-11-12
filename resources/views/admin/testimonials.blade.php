@extends('layouts.admin')

@section('page-title', 'Testimonials Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Testimonials Management</h2>
        <p class="text-gray-600 mt-1">Manage customer feedback and reviews</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
        {{ session('success') }}
    </div>
    @endif

    <!-- Add Testimonial Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Add New Testimonial</h3>
        
        <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter customer name" required>
                </div>

                <!-- Position Field -->
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                    <input type="text" id="position" name="position" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., CEO, Manager, Customer" required>
                </div>

                <!-- Institution Field -->
                <div>
                    <label for="institution" class="block text-sm font-medium text-gray-700 mb-1">Institution/Company</label>
                    <input type="text" id="institution" name="institution" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., ABC Corporation, XYZ University" required>
                </div>

                <!-- Avatar Upload Field -->
                <div>
                    <label for="avatar" class="block text-sm font-medium text-gray-700 mb-1">Avatar/Photo (Optional)</label>
                    <input type="file" id="avatar" name="avatar" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">JPG, PNG, GIF, WEBP, max 2MB</p>
                </div>
            </div>

            <!-- Quote Field -->
            <div>
                <label for="quote" class="block text-sm font-medium text-gray-700 mb-1">Customer Quote</label>
                <textarea id="quote" name="quote" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter the customer's testimonial quote..." required></textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                    Add Testimonial
                </button>
            </div>
        </form>
    </div>

    <!-- Testimonials List -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">All Testimonials</h3>
            <p class="text-sm text-gray-500 mt-1">{{ count($testimonials) }} total testimonials</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Institution</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Feedback</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($testimonials as $testimonial)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center mr-3 flex-shrink-0">
                                    @if($testimonial->avatar_path)
                                    <img src="{{ Storage::url($testimonial->avatar_path) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover rounded-full">
                                    @else
                                    <span class="text-gray-600">{{ substr($testimonial->name, 0, 1) }}</span>
                                    @endif
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $testimonial->name }}</div>
                                    <div class="text-xs text-gray-500">ID: {{ $testimonial->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $testimonial->position }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $testimonial->institution }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="max-w-xs">
                                <p class="text-sm text-gray-900" title="{{ $testimonial->quote }}">
                                    @if(strlen($testimonial->quote) > 80)
                                    {{ Str::limit($testimonial->quote, 80) }}...
                                    @else
                                    {{ $testimonial->quote }}
                                    @endif
                                </p>
                                <div class="text-xs text-gray-500 mt-1">
                                    {{ $testimonial->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <form method="POST" action="{{ route('admin.testimonials.delete', $testimonial->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this testimonial from {{ $testimonial->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-1">No testimonials found</h3>
                                <p class="text-gray-500">Start by adding your first customer testimonial</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection