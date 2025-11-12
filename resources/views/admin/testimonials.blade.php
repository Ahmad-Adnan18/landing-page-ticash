@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 overflow-x-hidden">
    <!-- Admin Header -->
    <header class="bg-white/80 backdrop-blur-md shadow-lg border-b border-slate-200/50 sticky top-0 z-20">
        <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 flex flex-wrap justify-between items-center gap-y-3">
            <div class="flex items-center space-x-3 flex-shrink-0">
                <div class="p-2 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-gray-800 to-slate-700 bg-clip-text text-transparent">Testimonials</h1>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium">Manage customer feedback and reviews</p>
                </div>
            </div>

            <div class="flex items-center space-x-3 sm:space-x-4 flex-shrink-0 ml-auto">
                <a href="{{ route('admin.dashboard') }}" class="group inline-flex items-center px-3 py-2 text-xs sm:text-sm font-medium text-slate-700 bg-white/80 backdrop-blur-sm rounded-xl border border-slate-200 hover:border-slate-300 hover:bg-slate-50 transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="hidden sm:inline">Dashboard</span>
                    <span class="inline sm:hidden">Home</span>
                </a>

                <form method="POST" action="{{ route('admin.logout') }}" class="inline-flex items-center">
                    @csrf
                    <button type="submit" class="group relative inline-flex items-center px-3 py-2.5 text-xs sm:text-sm bg-gradient-to-r from-red-500 to-red-600 text-white font-medium rounded-xl shadow-lg hover:from-red-600 hover:to-red-700 transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        <svg class="w-4 h-4 mr-1 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="hidden sm:inline">Logout</span>
                        <span class="inline sm:hidden">Exit</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 relative">
        <!-- Decorative Elements -->
        <div class="absolute top-20 -left-10 w-72 h-72 bg-gradient-to-r from-purple-200/20 to-pink-200/20 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob hidden lg:block"></div>
        <div class="absolute top-80 right-0 w-72 h-72 bg-gradient-to-r from-blue-200/20 to-indigo-200/20 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000 hidden lg:block"></div>

        <div class="relative z-10">
            <!-- Success Message -->
            @if(session('success'))
            <div class="mb-8 p-4 bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200/50 rounded-2xl backdrop-blur-sm shadow-lg animate-in slide-in-from-top-2 duration-300" role="alert">
                <div class="flex items-center">
                    <div class="p-2 bg-emerald-100 rounded-xl mr-3 flex-shrink-0">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-emerald-800 font-semibold">{{ session('success') }}</p>
                        <p class="text-emerald-700 text-sm mt-1">Testimonial added successfully</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Add Testimonial Form -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-6 lg:p-8 mb-8">
                <!-- Form Header -->
                <div class="flex items-center mb-6">
                    <div class="p-3 bg-gradient-to-br from-purple-100 to-pink-200 rounded-xl mr-4 shadow-sm flex-shrink-0">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl lg:text-2xl font-bold text-gray-800">Add New Testimonial</h2>
                        <p class="text-sm text-slate-600 mt-1">Share customer success stories and build trust</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Name Field -->
                        <div class="group">
                            <div class="flex items-start mb-3">
                                <div class="p-2 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl mr-3 flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 pt-0.5">
                                    Full Name
                                </label>
                            </div>
                            <input type="text" id="name" name="name" class="input-field w-full px-5 py-3.5 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-blue-300" placeholder="Enter customer name" required>
                        </div>

                        <!-- Position Field -->
                        <div class="group">
                            <div class="flex items-start mb-3">
                                <div class="p-2 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-xl mr-3 flex-shrink-0">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                </div>
                                <label for="position" class="block text-sm font-semibold text-gray-700 pt-0.5">
                                    Position
                                </label>
                            </div>
                            <input type="text" id="position" name="position" class="input-field w-full px-5 py-3.5 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-emerald-300" placeholder="e.g., CEO, Manager, Customer" required>
                        </div>

                        <!-- Institution Field -->
                        <div class="group">
                            <div class="flex items-start mb-3">
                                <div class="p-2 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl mr-3 flex-shrink-0">
                                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <label for="institution" class="block text-sm font-semibold text-gray-700 pt-0.5">
                                    Institution/Company
                                </label>
                            </div>
                            <input type="text" id="institution" name="institution" class="input-field w-full px-5 py-3.5 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-indigo-300" placeholder="e.g., ABC Corporation, XYZ University" required>
                        </div>
                    </div>

                    <!-- Quote Field -->
                    <div class="group">
                        <div class="flex items-start mb-3">
                            <div class="p-2 bg-gradient-to-br from-purple-100 to-pink-200 rounded-xl mr-3 flex-shrink-0">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <label for="quote" class="block text-sm font-semibold text-gray-700 pt-0.5">
                                Customer Quote
                            </label>
                        </div>
                        <textarea id="quote" name="quote" rows="4" class="input-field w-full px-5 py-3.5 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-purple-300 resize-vertical" placeholder="Enter the customer's testimonial quote..." required></textarea>
                        <p class="mt-2 text-xs text-slate-600 bg-slate-50/50 px-3 py-2 rounded-lg border border-slate-200/50">
                            <svg class="w-4 h-4 inline mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Write a compelling quote that showcases the customer's experience (max 500 characters)
                        </p>
                    </div>

                    <!-- Avatar Upload Field -->
                    <div class="group">
                        <div class="flex items-start mb-3">
                            <div class="p-2 bg-gradient-to-br from-amber-100 to-orange-200 rounded-xl mr-3 flex-shrink-0">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <label for="avatar" class="block text-sm font-semibold text-gray-700 pt-0.5">
                                Avatar/Photo (Optional)
                            </label>
                        </div>
                        <div class="flex items-center space-x-4">
                            <input type="file" id="avatar" name="avatar" accept="image/*" class="input-field w-full px-5 py-3.5 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-amber-300">
                        </div>
                        <p class="mt-2 text-xs text-slate-600 bg-slate-50/50 px-3 py-2 rounded-lg border border-slate-200/50">
                            <svg class="w-4 h-4 inline mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Upload customer photo (JPG, PNG, GIF, WEBP, max 2MB)
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="group relative w-full lg:w-auto bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3.5 px-8 rounded-xl font-semibold text-base flex items-center justify-center space-x-3 transform transition-all duration-300 shadow-lg hover:shadow-xl hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="relative z-10">Add Testimonial</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Testimonials List -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 overflow-hidden">
                <!-- List Header -->
                <div class="flex items-center justify-between p-6 pb-4">
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-indigo-100 to-blue-200 rounded-xl mr-4 shadow-sm flex-shrink-0">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl lg:text-2xl font-bold text-gray-800">All Testimonials</h2>
                            <p class="text-sm text-slate-600">{{ count($testimonials) }} total testimonials</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-slate-500">
                        <div class="flex items-center space-x-1">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span>Active</span>
                        </div>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Customer</th>
                                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Position</th>
                                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Institution</th>
                                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Feedback</th>
                                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            @forelse($testimonials as $testimonial)
                            <tr class="group hover:bg-slate-50/50 transition-colors duration-200">
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-r from-purple-100 to-pink-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $testimonial->name }}</div>
                                            <div class="text-xs text-slate-500">ID: {{ $testimonial->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $testimonial->position }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $testimonial->institution }}</div>
                                    <div class="text-xs text-slate-500">Verified</div>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="max-w-xs">
                                        <p class="text-sm text-gray-900 font-medium mb-1" title="{{ $testimonial->quote }}">
                                            @if(strlen($testimonial->quote) > 80)
                                            {{ Str::limit($testimonial->quote, 80) }}...
                                            @else
                                            {{ $testimonial->quote }}
                                            @endif
                                        </p>
                                        <div class="flex items-center text-xs text-slate-500">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ $testimonial->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                    <form method="POST" action="{{ route('admin.testimonials.delete', $testimonial->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this testimonial from {{ $testimonial->name }}? This action cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="group relative inline-flex items-center px-3 py-2 text-sm bg-gradient-to-r from-red-100 to-red-200 text-red-700 font-medium rounded-lg hover:from-red-200 hover:to-red-300 transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                            <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-16 h-16 bg-gradient-to-r from-slate-100 to-slate-200 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-center">
                                            <h3 class="text-lg font-medium text-slate-900 mb-1">No testimonials yet</h3>
                                            <p class="text-sm text-slate-500">Start by adding your first customer testimonial above</p>
                                        </div>
                                        <button onclick="scrollToForm()" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-medium rounded-lg hover:from-blue-600 hover:toblue-700 transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-105">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Add First Testimonial
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer - FIXED: Only show if it's a paginator -->
                @if(isset($testimonials) && method_exists($testimonials, 'hasPages') && $testimonials->hasPages())
                <div class="bg-slate-50/50 px-6 py-4 border-t border-slate-200/50">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-slate-600">
                            Showing {{ $testimonials->firstItem() ?? 0 }} to {{ $testimonials->lastItem() ?? 0 }} of {{ $testimonials->total() }} results
                        </div>
                        <div class="flex items-center space-x-2">
                            {{ $testimonials->links() }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Custom CSS for Enhanced Styling -->
    <style>
        .input-field {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(148, 163, 184, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .input-field:focus {
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow:
                0 0 0 3px rgba(59, 130, 246, 0.1),
                0 4px 16px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
        }

        .group-focus-within .input-field {
            border-color: rgba(59, 130, 246, 0.4);
        }

        @keyframes slide-in-from-top-2 {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation-fill-mode: both;
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        /* Responsive table adjustments */
        @media (max-width: 768px) {

            table th,
            table td {
                padding: 0.75rem 0.5rem;
            }

            .max-w-xs {
                max-width: 150px;
            }
        }

        /* Ensure textarea doesn't grow too large */
        textarea {
            max-height: 200px;
            min-height: 120px;
        }

        /* Smooth scrolling for empty state button */
        html {
            scroll-behavior: smooth;
        }

    </style>

    <!-- Enhanced JavaScript for Form Interactions -->
    <script>
        // Function to scroll to form
        function scrollToForm() {
            const form = document.querySelector('form');
            if (form) {
                form.scrollIntoView({
                    behavior: 'smooth'
                    , block: 'start'
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = document.querySelectorAll('input, textarea');
            const submitButton = form ? .querySelector('button[type="submit"]');

            // Add loading state on form submission
            if (form && submitButton) {
                form.addEventListener('submit', function() {
                    submitButton.disabled = true;
                    const originalHTML = submitButton.innerHTML;
                    submitButton.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Adding Testimonial...</span>
                    `;

                    // Re-enable button if form submission fails (timeout after 10 seconds)
                    setTimeout(() => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalHTML;
                    }, 10000);
                });
            }

            // Input focus management
            inputs.forEach(input => {
                const parentGroup = input.closest('.group');
                if (parentGroup) {
                    input.addEventListener('focus', function() {
                        parentGroup.classList.add('group-focus-within');
                    });

                    input.addEventListener('blur', function() {
                        parentGroup.classList.remove('group-focus-within');
                    });
                }

                // Character counter for quote textarea
                if (input.name === 'quote') {
                    const counter = document.createElement('div');
                    counter.className = 'text-xs text-slate-500 mt-2 text-right';
                    input.parentNode.appendChild(counter);

                    function updateCounter() {
                        const length = input.value.length;
                        const maxLength = 500;
                        counter.textContent = `${length}/${maxLength} characters`;

                        if (length > maxLength * 0.9) {
                            counter.className = 'text-xs text-red-500 mt-2 text-right animate-pulse';
                        } else {
                            counter.className = 'text-xs text-slate-500 mt-2 text-right';
                        }
                    }

                    input.addEventListener('input', updateCounter);
                    updateCounter(); // Initial call
                }

                // Auto-resize textarea
                if (input.tagName === 'TEXTAREA') {
                    input.addEventListener('input', function() {
                        this.style.height = 'auto';
                        this.style.height = Math.min(this.scrollHeight, 200) + 'px';
                    });
                }
            });

            // Enhanced delete confirmation with better UX
            const deleteForms = document.querySelectorAll('form[method="POST"]');
            deleteForms.forEach(form => {
                // Only add event listener to delete forms (check for DELETE method)
                if (form.querySelector('input[name="_method"]') && form.querySelector('input[name="_method"]').value === 'DELETE') {
                    const originalOnsubmit = form.onsubmit;
                    form.onsubmit = function(e) {
                        const confirmed = confirm('Are you sure you want to delete this testimonial? This action cannot be undone.');
                        if (!confirmed) {
                            e.preventDefault();
                            return false;
                        }
                        return originalOnsubmit ? originalOnsubmit.call(this, e) : true;
                    };
                }
            });

            // Smooth scroll prevention on mobile
            if (typeof navigator !== 'undefined' && (/Mobi|Android/i.test(navigator.userAgent))) {
                document.body.style.overflow = 'hidden';
                setTimeout(() => {
                    document.body.style.overflow = 'auto';
                }, 100);
            }
        });

    </script>
</div>
@endsection
