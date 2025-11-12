@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                        <form method="GET" action="{{ route('admin.leads') }}" class="flex flex-col sm:flex-row gap-3 w-full max-w-2xl">
                            <div class="relative flex-1">
                                <input type="text" name="search" placeholder="Cari nama, pesantren, atau email..." value="{{ request('search') }}" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <select name="status" class="px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                <option value="">Semua Status</option>
                                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="process" {{ request('status') === 'process' ? 'selected' : '' }}>Process</option>
                                <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>

                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                Filter
                            </button>
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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
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
                                    <div class="relative">
                                        <select class="status-select px-3 py-1 rounded-lg text-sm 
                                                @if($lead->status === 'pending')
                                                    bg-yellow-100 border-yellow-300 text-yellow-800
                                                @elseif($lead->status === 'process')
                                                    bg-blue-100 border-blue-300 text-blue-800
                                                @elseif($lead->status === 'approved')
                                                    bg-green-100 border-green-300 text-green-800
                                                @elseif($lead->status === 'rejected')
                                                    bg-red-100 border-red-300 text-red-800
                                                @else
                                                    bg-white border-slate-300 text-gray-700
                                                @endif
                                                focus:ring-2 focus:ring-opacity-50 transition w-full max-w-[140px] appearance-none pr-8 pl-4" data-lead-id="{{ $lead->id }}" data-current-status="{{ $lead->status }}">
                                            <option value="pending" {{ $lead->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="process" {{ $lead->status === 'process' ? 'selected' : '' }}>Process</option>
                                            <option value="approved" {{ $lead->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ $lead->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                        <!-- Custom dropdown arrow -->
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-gray-700">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="status-updating hidden text-xs text-blue-500 mt-1">
                                        <svg class="animate-spin h-3 w-3 text-blue-500 inline" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Updating...
                                    </div>
                                    <div class="status-message text-xs mt-1 hidden"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $lead->created_at->format('d M Y H:i') }}</div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
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

        .status-pending {
            background-color: #fde68a;
            color: #92400e;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
        }

        .status-process {
            background-color: #d9f99d;
            color: #3f6212;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
        }

        .status-approved {
            background-color: #bbf7d0;
            color: #14532d;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
        }

        .status-rejected {
            background-color: #fecaca;
            color: #b91c1c;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
        }

    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelects = document.querySelectorAll('.status-select');

            statusSelects.forEach(select => {
                select.addEventListener('change', function() {
                    const leadId = this.getAttribute('data-lead-id');
                    const newStatus = this.value;
                    const currentStatus = this.getAttribute('data-current-status');

                    // Skip if no change
                    if (newStatus === currentStatus) {
                        return;
                    }

                    // Show updating indicator
                    const updatingEl = this.closest('td').querySelector('.status-updating');
                    const messageEl = this.closest('td').querySelector('.status-message');

                    updatingEl.classList.remove('hidden');
                    messageEl.classList.add('hidden');

                    // Send AJAX request
                    fetch(`/admin/leads/${leadId}/status`, {
                            method: 'PUT'
                            , headers: {
                                'Content-Type': 'application/json'
                                , 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                , 'X-Requested-With': 'XMLHttpRequest'
                            }
                            , body: JSON.stringify({
                                status: newStatus
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Update current status attribute
                                this.setAttribute('data-current-status', newStatus);

                                // Update the dropdown styling based on new status
                                const selectElement = this;
                                // Remove all status-related classes
                                selectElement.className = 'status-select px-3 py-1 rounded-lg text-sm focus:ring-2 focus:ring-opacity-50 transition w-full max-w-[140px] appearance-none pr-8';

                                // Add the appropriate class based on new status
                                if (newStatus === 'pending') {
                                    selectElement.classList.add('bg-yellow-100', 'border-yellow-300', 'text-yellow-800');
                                } else if (newStatus === 'process') {
                                    selectElement.classList.add('bg-blue-100', 'border-blue-300', 'text-blue-800');
                                } else if (newStatus === 'approved') {
                                    selectElement.classList.add('bg-green-100', 'border-green-300', 'text-green-800');
                                } else if (newStatus === 'rejected') {
                                    selectElement.classList.add('bg-red-100', 'border-red-300', 'text-red-800');
                                } else {
                                    selectElement.classList.add('bg-white', 'border-slate-300', 'text-gray-700');
                                }

                                // Show success message
                                messageEl.textContent = data.message;
                                messageEl.className = 'status-message text-xs text-green-600 mt-1';
                                messageEl.classList.remove('hidden');

                                // Hide updating indicator after a short delay
                                setTimeout(() => {
                                    updatingEl.classList.add('hidden');
                                }, 1000);
                            } else {
                                // Revert to original status
                                this.value = currentStatus;

                                // Show error message
                                messageEl.textContent = data.message || 'Gagal memperbarui status';
                                messageEl.className = 'status-message text-xs text-red-600 mt-1';
                                messageEl.classList.remove('hidden');

                                updatingEl.classList.add('hidden');
                            }
                        })
                        .catch(error => {
                            // Revert to original status in case of network error
                            this.value = currentStatus;

                            // Show error message
                            messageEl.textContent = 'Terjadi kesalahan jaringan';
                            messageEl.className = 'status-message text-xs text-red-600 mt-1';
                            messageEl.classList.remove('hidden');

                            updatingEl.classList.add('hidden');

                            console.error('Error:', error);
                        });
                });
            });
        });

    </script>
</div>
@endsection
