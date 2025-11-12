@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 overflow-x-hidden"> {{-- Added overflow-x-hidden here --}}
    <!-- Admin Header -->
    <header class="bg-white/80 backdrop-blur-md shadow-lg border-b border-slate-200/50 sticky top-0 z-20"> {{-- Increased z-index for header --}}
        <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 flex flex-wrap justify-between items-center gap-y-3"> {{-- Adjusted py and added flex-wrap, gap-y --}}
            <div class="flex items-center space-x-3 flex-shrink-0"> {{-- Added flex-shrink-0 --}}
                <div class="p-2 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-gray-800 to-slate-700 bg-clip-text text-transparent">Settings</h1> {{-- Adjusted font size for responsiveness --}}
                    <p class="text-xs sm:text-sm text-slate-500 font-medium">Contact Information Management</p> {{-- Adjusted font size for responsiveness --}}
                </div>
            </div>

            <div class="flex items-center space-x-3 sm:space-x-4 flex-shrink-0 ml-auto"> {{-- Added flex-shrink-0 and ml-auto to push to right --}}
                <a href="{{ route('admin.dashboard') }}" class="group inline-flex items-center px-3 py-2 text-xs sm:text-sm font-medium text-slate-700 bg-white/80 backdrop-blur-sm rounded-xl border border-slate-200 hover:border-slate-300 hover:bg-slate-50 transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5"> {{-- Adjusted padding and font size --}}
                    <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="hidden sm:inline">Dashboard</span> {{-- Hidden on smaller screens --}}
                    <span class="inline sm:hidden">Home</span> {{-- Show 'Home' on smaller screens --}}
                </a>

                <form method="POST" action="{{ route('admin.logout') }}" class="inline-flex items-center">
                    @csrf
                    <button type="submit" class="group relative inline-flex items-center px-3 py-2.5 text-xs sm:text-sm bg-gradient-to-r from-red-500 to-red-600 text-white font-medium rounded-xl shadow-lg hover:from-red-600 hover:to-red-700 transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"> {{-- Adjusted padding and font size --}}
                        <svg class="w-4 h-4 mr-1 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"> {{-- Adjusted margin-right --}}
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="hidden sm:inline">Logout</span>
                        <span class="inline sm:hidden">Exit</span> {{-- Show 'Exit' on smaller screens --}}
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8 relative"> {{-- Changed max-w-4xl to container and added mx-auto --}}
        <!-- Decorative Elements -->
        {{-- Ensure these are absolutely positioned relative to the main container, not the viewport --}}
        <div class="absolute top-10 -left-10 w-64 h-64 bg-gradient-to-r from-emerald-200/20 to-teal-200/20 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse hidden md:block"></div> {{-- Added hidden md:block for desktop --}}
        <div class="absolute bottom-20 -right-10 w-64 h-64 bg-gradient-to-r from-blue-200/20 to-indigo-200/20 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000 hidden md:block"></div> {{-- Added hidden md:block for desktop --}}

        <div class="relative z-10">
            <!-- Success Message -->
            @if(session('success'))
            <div class="mb-8 p-4 bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200/50 rounded-2xl backdrop-blur-sm shadow-lg animate-in slide-in-from-top-2 duration-300" role="alert"> {{-- Added role for accessibility --}}
                <div class="flex items-center">
                    <div class="p-2 bg-emerald-100 rounded-xl mr-3 flex-shrink-0"> {{-- Added flex-shrink-0 --}}
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-emerald-800 font-semibold">{{ session('success') }}</p>
                        <p class="text-emerald-700 text-sm mt-1">Settings updated successfully</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Settings Card -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-6 sm:p-8"> {{-- Adjusted padding for responsiveness --}}
                <!-- Header Section -->
                <div class="flex items-center mb-8">
                    <div class="p-3 bg-gradient-to-br from-emerald-100 to-teal-200 rounded-xl mr-4 shadow-sm flex-shrink-0"> {{-- Added flex-shrink-0 --}}
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Contact Settings</h2> {{-- Adjusted font size for responsiveness --}}
                        <p class="text-sm sm:text-base text-slate-600">Manage your business contact information and availability</p> {{-- Adjusted font size for responsiveness --}}
                    </div>
                </div>

                <!-- Form Section -->
                <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6 sm:space-y-8"> {{-- Adjusted space-y for responsiveness --}}
                    @csrf

                    <!-- Contact Number Field -->
                    <div class="group">
                        <div class="flex items-start mb-3"> {{-- Changed to items-start for better label alignment --}}
                            <div class="p-2 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl mr-3 flex-shrink-0"> {{-- Added flex-shrink-0 --}}
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <label for="contact_number" class="block text-sm font-semibold text-gray-700 pt-0.5"> {{-- Added pt-0.5 for label alignment --}}
                                Main Contact Number
                            </label>
                        </div>

                        <div class="relative">
                            <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number', $contactNumber) }}" class="input-field w-full px-5 py-3.5 sm:py-4 pr-12 sm:pr-14 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-blue-300" placeholder="e.g., +6281234567890" required> {{-- Adjusted padding --}}
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-blue-400 group-focus-within:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                        </div>

                        <p class="mt-2 text-xs sm:text-sm text-slate-600 bg-slate-50/50 px-3 py-2 rounded-lg border border-slate-200/50"> {{-- Adjusted font size --}}
                            <svg class="w-4 h-4 inline mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Enter the primary phone number that visitors can use to reach your business
                        </p>
                    </div>

                    <!-- Contact Email Field -->
                    <div class="group">
                        <div class="flex items-start mb-3"> {{-- Changed to items-start for better label alignment --}}
                            <div class="p-2 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-xl mr-3 flex-shrink-0"> {{-- Added flex-shrink-0 --}}
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <label for="contact_email" class="block text-sm font-semibold text-gray-700 pt-0.5"> {{-- Added pt-0.5 for label alignment --}}
                                Contact Email
                            </label>
                        </div>

                        <div class="relative">
                            <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $contactEmail) }}" class="input-field w-full px-5 py-3.5 sm:py-4 pr-12 sm:pr-14 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-emerald-300" placeholder="e.g., info@ticash.com" required> {{-- Adjusted padding --}}
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-emerald-400 group-focus-within:text-emerald-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>

                        <p class="mt-2 text-xs sm:text-sm text-slate-600 bg-slate-50/50 px-3 py-2 rounded-lg border border-slate-200/50"> {{-- Adjusted font size --}}
                            <svg class="w-4 h-4 inline mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Primary email address for customer inquiries and business communications
                        </p>
                    </div>

                    <!-- WhatsApp Number Field -->
                    <div class="group">
                        <div class="flex items-start mb-3"> {{-- Changed to items-start for better label alignment --}}
                            <div class="p-2 bg-gradient-to-br from-green-100 to-green-200 rounded-xl mr-3 flex-shrink-0"> {{-- Added flex-shrink-0 --}}
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <label for="whatsapp_number" class="block text-sm font-semibold text-gray-700 pt-0.5"> {{-- Added pt-0.5 for label alignment --}}
                                WhatsApp Number
                            </label>
                        </div>

                        <div class="relative">
                            <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $whatsappNumber) }}" class="input-field w-full px-5 py-3.5 sm:py-4 pr-12 sm:pr-14 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-green-300" placeholder="e.g., +6281234567890" required> {{-- Adjusted padding --}}
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-green-400 group-focus-within:text-green-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <p class="mt-2 text-xs sm:text-sm text-slate-600 bg-slate-50/50 px-3 py-2 rounded-lg border border-slate-200/50"> {{-- Adjusted font size --}}
                            <svg class="w-4 h-4 inline mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            WhatsApp number for direct messaging and instant customer support
                        </p>
                    </div>

                    <!-- Office Hours Field -->
                    <div class="group">
                        <div class="flex items-start mb-3"> {{-- Changed to items-start for better label alignment --}}
                            <div class="p-2 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl mr-3 flex-shrink-0"> {{-- Added flex-shrink-0 --}}
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <label for="office_hours" class="block text-sm font-semibold text-gray-700 pt-0.5"> {{-- Added pt-0.5 for label alignment --}}
                                Office Hours
                            </label>
                        </div>

                        <div class="relative">
                            <input type="text" id="office_hours" name="office_hours" value="{{ old('office_hours', $officeHours) }}" class="input-field w-full px-5 py-3.5 sm:py-4 pr-12 sm:pr-14 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-purple-300" placeholder="e.g., Monday-Friday, 9AM-5PM" required> {{-- Adjusted padding --}}
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-purple-400 group-focus-within:text-purple-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <p class="mt-2 text-xs sm:text-sm text-slate-600 bg-slate-50/50 px-3 py-2 rounded-lg border border-slate-200/50"> {{-- Adjusted font size --}}
                            <svg class="w-4 h-4 inline mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Specify your operating hours for customer reference and availability information
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="group relative w-full bg-gradient-to-r from-emerald-500 to-teal-600 text-white py-3 sm:py-4 px-6 sm:px-8 rounded-xl font-semibold text-base sm:text-lg flex items-center justify-center space-x-3 transform transition-all duration-300 shadow-lg hover:shadow-xl hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-white"> {{-- Adjusted padding and font size --}}
                            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="relative z-10">Update Settings</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Additional Info Section -->
                <div class="mt-8 pt-6 border-t border-slate-200/50">
                    <div class="flex flex-col sm:flex-row items-center justify-between text-sm text-slate-600 gap-y-2"> {{-- Changed to flex-col on small screens --}}
                        <div class="flex items-center space-x-3"> {{-- Adjusted space-x --}}
                            <div class="flex items-center space-x-1">
                                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                                <span>Settings Active</span>
                            </div>
                            <span class="hidden sm:inline">•</span> {{-- Hidden on smaller screens --}}
                            <span class="block sm:inline">Last updated: <span class="font-medium text-slate-800">{{ now()->format('M d, Y \a\t g:i A') }}</span></span>
                        </div>
                        <div class="flex items-center space-x-2 text-xs bg-slate-100/50 px-3 py-1 rounded-full">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>4 Fields • Secure</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Custom CSS for Enhanced Styling -->
    <style>
        /* General input styling */
        .input-field {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(148, 163, 184, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Input focus state */
        .input-field:focus {
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow:
                0 0 0 3px rgba(59, 130, 246, 0.1),
                0 4px 16px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
        }

        /* Group focus within (for parent to react to child focus) */
        .group-focus-within .input-field {
            border-color: rgba(59, 130, 246, 0.4);
        }

        /* Animation for success message */
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

        /* Apply animation fill mode */
        .animate-in {
            animation-fill-mode: both;
        }

        /* Custom animation delay */
        .animation-delay-2000 {
            animation-delay: 0.2s;
        }

        /* Responsive adjustments for max-w-4xl on small screens */
        @media (max-width: 640px) {
            .max-w-4xl {
                max-width: 100%;
                /* padding-left: 1rem; -- Already handled by `px-4` in main tag */
                /* padding-right: 1rem; -- Already handled by `px-4` in main tag */
            }
        }

    </style>

    <!-- Enhanced JavaScript for Form Interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input');
            const submitButton = form.querySelector('button[type="submit"]');

            // Add loading state on form submission
            if (form && submitButton) { // Ensure form and button exist
                form.addEventListener('submit', function() {
                    submitButton.disabled = true;
                    submitButton.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Updating Settings...</span>
                    `;
                });
            }

            // Input focus management
            inputs.forEach(input => { // Removed index as it wasn't used
                const parentGroup = input.closest('.group'); // Find the closest parent with class 'group'
                if (parentGroup) {
                    input.addEventListener('focus', function() {
                        parentGroup.classList.add('group-focus-within');
                    });

                    input.addEventListener('blur', function() {
                        parentGroup.classList.remove('group-focus-within');
                    });
                }

                // Auto-format phone numbers
                if (input.name === 'contact_number' || input.name === 'whatsapp_number') {
                    input.addEventListener('input', function(e) {
                        let value = e.target.value.replace(/\D/g, '');
                        // Check if the input already starts with +62
                        if (!value.startsWith('62')) {
                            // If it starts with 0, remove it and add 62
                            if (value.startsWith('0')) {
                                value = '62' + value.substring(1);
                            } else {
                                // Otherwise, just add 62, assuming it's an Indonesian number
                                value = '62' + value;
                            }
                        }
                        // Limit length to avoid excessively long numbers (e.g., 6281234567890 -> 12 digits)
                        if (value.length > 12) { // 62 + 10 digits
                            value = value.substring(0, 12);
                        }
                        e.target.value = value;
                    });

                    // Phone number formatting on blur to add '+' prefix
                    input.addEventListener('blur', function() {
                        let value = this.value.replace(/\D/g, ''); // Clean again on blur
                        if (value && value.startsWith('62') && !this.value.startsWith('+')) {
                            this.value = '+' + value;
                        } else if (value && !value.startsWith('62')) { // If it's a number but not 62, format as +62
                            this.value = '+' + '62' + value;
                        }
                    });
                }
            });

            // Prevent smooth scrolling on mobile (original script logic)
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
