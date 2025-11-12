@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <!-- Admin Header -->
    <header class="bg-white/80 backdrop-blur-md shadow-lg border-b border-slate-200/50 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div class="p-2 rounded-xl shadow-lg">
                    <img src="{{ asset('images/logo-ticash.png') }}" alt="ticash Logo" class="h-12 w-auto mr-2">
                </div>
                <div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-slate-700 bg-clip-text text-transparent">ticash</h1>
                    <p class="text-sm text-slate-500 font-medium">Admin Dashboard Management</p>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.logout') }}" class="inline-flex items-center space-x-2">
                @csrf
                <button type="submit" class="group relative inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-red-500 to-red-600 text-white font-medium rounded-xl shadow-lg hover:from-red-600 hover:to-red-700 transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    <svg class="w-4 h-4 mr-1 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="hidden sm:inline">Logout</span>
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8 relative">
        <!-- Decorative Elements -->
        <div class="absolute top-20 left-0 w-72 h-72 bg-gradient-to-r from-blue-200/30 to-purple-200/30 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-40 right-0 w-72 h-72 bg-gradient-to-r from-pink-200/30 to-rose-200/30 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-gradient-to-r from-indigo-200/30 to-cyan-200/30 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>

        <div class="relative z-10">
            <!-- Page Header -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar Permintaan Demo</h2>
                <p class="text-slate-600">Kelola dan pantau semua permintaan demo dari calon pengguna ticash</p>
            </div>

            <!-- Leads Table -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200/50">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                @if(request('search'))
                                    Hasil Pencarian: "{{ request('search') }}"
                                @else
                                    Data Leads
                                @endif
                            </h3>
                            <p class="text-sm text-slate-500">
                                @if(request('search'))
                                    {{ $leads->count() }} hasil untuk "{{ request('search') }}"
                                @else
                                    {{ $leads->count() }} total leads
                                @endif
                            </p>
                        </div>
                        
                        <!-- Search Form -->
                        <form method="GET" action="{{ route('admin.leads') }}" class="flex-1 max-w-md">
                            <div class="relative">
                                <input 
                                    type="text" 
                                    name="search" 
                                    placeholder="Cari nama, pesantren, atau email..." 
                                    value="{{ request('search') }}"
                                    class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200/50">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Nama</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Pesantren</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Jabatan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">WhatsApp</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/60 divide-y divide-slate-200/50">
                            @forelse($leads as $lead)
                            <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-800">{{ $lead->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $lead->pesantren_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $lead->position }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $lead->whatsapp_number }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $lead->email ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $lead->created_at->format('d M Y H:i') }}</div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <h3 class="text-lg font-medium text-slate-700 mb-1">
                                            @if(request('search'))
                                                Tidak ditemukan hasil untuk "{{ request('search') }}"
                                            @else
                                                Belum ada permintaan demo
                                            @endif
                                        </h3>
                                        <p class="text-slate-500">
                                            @if(request('search'))
                                                Coba dengan kata kunci yang berbeda
                                            @else
                                                Permintaan demo dari form kontak akan muncul di sini
                                            @endif
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($leads->count() > 0)
                <div class="px-6 py-4 border-t border-slate-200/50">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-slate-500">
                            Menampilkan {{ $leads->count() }} dari {{ $totalLeads }} leads
                        </div>
                        <!-- Optional: Add export functionality here -->
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Custom CSS for animations -->
    <style>
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

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</div>
@endsection