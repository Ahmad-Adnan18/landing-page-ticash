@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 overflow-x-hidden">
    <!-- Admin Header -->
    <header class="bg-white/80 backdrop-blur-md shadow-lg border-b border-slate-200/50 sticky top-0 z-20">
        <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 flex flex-wrap justify-between items-center gap-y-3">
            <div class="flex items-center space-x-3 flex-shrink-0">
                <div class="p-2 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-gray-800 to-slate-700 bg-clip-text text-transparent">Admin Profile</h1>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium">Manage your account credentials</p>
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
    <main class="container mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8 relative">
        <!-- Decorative Elements -->
        <div class="absolute top-10 -left-10 w-64 h-64 bg-gradient-to-r from-emerald-200/20 to-teal-200/20 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse hidden md:block"></div>
        <div class="absolute bottom-20 -right-10 w-64 h-64 bg-gradient-to-r from-blue-200/20 to-indigo-200/20 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000 hidden md:block"></div>

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
                        <p class="text-emerald-700 text-sm mt-1">Your account updated successfully</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Profile Card -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-6 sm:p-8">
                <!-- Header Section -->
                <div class="flex items-center mb-8">
                    <div class="p-3 bg-gradient-to-br from-emerald-100 to-teal-200 rounded-xl mr-4 shadow-sm flex-shrink-0">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Account Credentials</h2>
                        <p class="text-sm text-slate-600 mt-1">Manage your username and password</p>
                    </div>
                </div>

                <!-- Update Credentials Form -->
                <form method="POST" action="{{ route('admin.update.credentials') }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Current Password -->
                    <div class="group">
                        <div class="flex items-start mb-3">
                            <div class="p-2 bg-gradient-to-br from-amber-100 to-orange-200 rounded-xl mr-3 flex-shrink-0">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                </svg>
                            </div>
                            <label for="current_password" class="block text-sm font-semibold text-gray-700 pt-0.5">
                                Current Password
                            </label>
                        </div>
                        <input type="password" id="current_password" name="current_password" class="input-field w-full px-5 py-3.5 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-amber-300" placeholder="Enter your current password" required>
                        @error('current_password')
                        <p class="mt-2 text-xs text-red-600 bg-red-50/50 px-3 py-2 rounded-lg border border-red-200/50">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Username -->
                    <div class="group">
                        <div class="flex items-start mb-3">
                            <div class="p-2 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl mr-3 flex-shrink-0">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <label for="new_username" class="block text-sm font-semibold text-gray-700 pt-0.5">
                                New Username
                            </label>
                        </div>
                        <input type="text" id="new_username" name="new_username" value="{{ old('new_username', $admin->username) }}" class="input-field w-full px-5 py-3.5 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-blue-300" placeholder="Enter new username" required>
                        @error('new_username')
                        <p class="mt-2 text-xs text-red-600 bg-red-50/50 px-3 py-2 rounded-lg border border-red-200/50">{{ $message }}</p>
                        @enderror
                        <p class="mt-2 text-xs text-slate-600 bg-slate-50/50 px-3 py-2 rounded-lg border border-slate-200/50">
                            <svg class="w-4 h-4 inline mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Username must be unique and at least 3 characters long
                        </p>
                    </div>

                    <!-- New Password -->
                    <div class="group">
                        <div class="flex items-start mb-3">
                            <div class="p-2 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl mr-3 flex-shrink-0">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <label for="new_password" class="block text-sm font-semibold text-gray-700 pt-0.5">
                                New Password (Optional)
                            </label>
                        </div>
                        <input type="password" id="new_password" name="new_password" class="input-field w-full px-5 py-3.5 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-purple-300" placeholder="Enter new password (leave blank to keep current)">
                        @error('new_password')
                        <p class="mt-2 text-xs text-red-600 bg-red-50/50 px-3 py-2 rounded-lg border border-red-200/50">{{ $message }}</p>
                        @enderror
                        <p class="mt-2 text-xs text-slate-600 bg-slate-50/50 px-3 py-2 rounded-lg border border-slate-200/50">
                            <svg class="w-4 h-4 inline mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Password must be at least 8 characters long (optional)
                        </p>
                    </div>

                    <!-- Confirm Password -->
                    <div class="group">
                        <div class="flex items-start mb-3">
                            <div class="p-2 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl mr-3 flex-shrink-0">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <label for="new_password_confirmation" class="block text-sm font-semibold text-gray-700 pt-0.5">
                                Confirm New Password
                            </label>
                        </div>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="input-field w-full px-5 py-3.5 rounded-xl focus:outline-none focus:ring-0 text-gray-800 font-medium placeholder:text-slate-400 transition-all duration-300 group-hover:border-indigo-300" placeholder="Confirm your new password">
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="group relative w-full bg-gradient-to-r from-emerald-500 to-teal-600 text-white py-3 sm:py-4 px-6 sm:px-8 rounded-xl font-semibold text-base sm:text-lg flex items-center justify-center space-x-3 transform transition-all duration-300 shadow-lg hover:shadow-xl hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-white">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="relative z-10">Update Credentials</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>
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
            }
        }

    </style>
</div>
@endsection