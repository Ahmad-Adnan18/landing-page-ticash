<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - ticash</title>

    <!-- Favicon dari folder images -->
    <link rel="shortcut icon" href="{{ asset('images/logo-ticash.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('images/logo-ticash.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(147, 51, 234, 0.1) 100%);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.7;
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.3;
            }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.1),
                0 4px 16px rgba(0, 0, 0, 0.06);
        }

        .input-field {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(148, 163, 184, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .input-field:focus {
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow:
                0 0 0 3px rgba(59, 130, 246, 0.1),
                0 4px 16px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
        }

        .login-button {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            box-shadow:
                0 4px 14px 0 rgba(59, 130, 246, 0.4),
                0 2px 6px 0 rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow:
                0 8px 25px 0 rgba(59, 130, 246, 0.4),
                0 4px 12px 0 rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .error-message {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%);
            border: 1px solid rgba(239, 68, 68, 0.2);
            backdrop-filter: blur(10px);
        }

        .logo-container {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(147, 51, 234, 0.1) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 640px) {
            .shape {
                display: none;
            }
        }

    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 overflow-hidden">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center relative px-4">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-purple-500/5 to-indigo-500/5"></div>

        <!-- Main Login Card -->
        <div class="relative z-10 w-full max-w-md">
            <!-- Logo Section -->
            <div class="text-center mb-8">
                <div class="logo-container inline-block p-4 rounded-2xl mb-4 mx-auto">
                    <div class="p-2 rounded-xl shadow-lg">
                        <img src="{{ asset('images/logo-ticash.png') }}" alt="ticash Logo" class="h-12 w-auto mr-2">
                    </div>
                </div>
                <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-800 via-gray-700 to-slate-600 bg-clip-text text-transparent mb-2">
                    Welcome Back
                </h2>
                <p class="text-slate-500 text-sm font-medium">Sign in to your admin account</p>
            </div>

            <!-- Error Message -->
            @if(session('error'))
            <div class="error-message mb-6 p-4 rounded-2xl animate-pulse">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div>
                        <p class="text-red-800 font-medium">{{ session('error') }}</p>
                        <p class="text-red-700 text-sm mt-1">Please check your credentials and try again.</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Login Form -->
            <div class="glass-card rounded-2xl p-8">
                <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                    @csrf

                    <!-- Username Field -->
                    <div class="relative">
                        <label for="username" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Username
                        </label>
                        <div class="relative">
                            <input type="text" id="username" name="username" class="input-field w-full px-4 py-3.5 pr-12 rounded-xl placeholder:text-slate-400 focus:outline-none focus:ring-0 text-gray-800 font-medium" placeholder="Enter your username" required>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="relative">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" class="input-field w-full px-4 py-3.5 pr-12 rounded-xl placeholder:text-slate-400 focus:outline-none focus:ring-0 text-gray-800 font-medium" placeholder="Enter your password" required>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="login-button w-full py-3.5 px-6 rounded-xl text-white font-semibold text-lg flex items-center justify-center space-x-2 transform transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-transparent">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Sign In</span>
                    </button>
                </form>
            </div>

            <!-- Footer Info -->
            <div class="text-center mt-6 pt-6 border-t border-slate-200/50">
                <p class="text-xs text-slate-500">
                    <span class="font-medium text-slate-700">ticash</span> Admin Portal • Secure Login
                </p>
                <div class="flex items-center justify-center space-x-1 mt-2">
                    <div class="w-1 h-1 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-xs text-green-600 font-medium">System Online</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Script for Enhanced UX -->
    <script>
        // Add loading state to form submission
        document.querySelector('form').addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;

            button.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Signing In...
            `;
            button.disabled = true;
        });

        // Add focus trap for better accessibility
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input');

            inputs.forEach((input, index) => {
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Tab' && index === inputs.length - 1 && e.shiftKey === false) {
                        e.preventDefault();
                        inputs[0].focus();
                    }
                });
            });
        });

        // Smooth scroll prevention on mobile
        if (/Mobi|Android/i.test(navigator.userAgent)) {
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                document.body.style.overflow = 'auto';
            }, 100);
        }

    </script>
</body>
</html>
