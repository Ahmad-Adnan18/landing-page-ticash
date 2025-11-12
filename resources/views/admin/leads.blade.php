@extends('layouts.admin')

@section('page-title', 'Leads Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Leads Management</h2>
                <p class="text-gray-600 mt-1">Manage and monitor all demo requests from potential ticash users</p>
            </div>
        </div>
    </div>

    <!-- Leads Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">
                        @if(request('search'))
                        Search Results: "{{ request('search') }}"
                        @else
                        All Leads
                        @endif
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        @if(request('search'))
                        {{ $leads->count() }} results for "{{ request('search') }}"
                        @elseif(request('status'))
                        {{ $leads->count() }} leads with status "{{ request('status') }}"
                        @else
                        {{ $leads->count() }} total leads
                        @endif
                    </p>
                </div>

                <!-- Search and Filter Form -->
                <form method="GET" action="{{ route('admin.leads') }}" class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Search by name, pesantren, or email..." value="{{ request('search') }}" class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="process" {{ request('status') === 'process' ? 'selected' : '' }}>Process</option>
                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Filter
                    </button>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pesantren</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">WhatsApp</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($leads as $lead)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $lead->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $lead->pesantren_name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $lead->position }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $lead->whatsapp_number }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $lead->email ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="relative inline-block w-full max-w-[140px]">
                                <select class="status-select px-3 py-1 rounded-lg text-sm w-full
                @if($lead->status === 'pending')
                    bg-yellow-100 border border-yellow-300 text-yellow-800
                @elseif($lead->status === 'process')
                    bg-blue-100 border border-blue-300 text-blue-800
                @elseif($lead->status === 'approved')
                    bg-green-100 border border-green-300 text-green-800
                @elseif($lead->status === 'rejected')
                    bg-red-100 border border-red-300 text-red-800
                @else
                    bg-white border border-gray-300 text-gray-700
                @endif
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none pr-8" data-lead-id="{{ $lead->id }}" data-current-status="{{ $lead->status }}">
                                    <option value="pending" {{ $lead->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="process" {{ $lead->status === 'process' ? 'selected' : '' }}>Process</option>
                                    <option value="approved" {{ $lead->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $lead->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                                <!-- Custom dropdown arrow - FIXED -->
                                <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center text-gray-700">
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
                            <div class="text-sm text-gray-900">{{ $lead->created_at->format('d M Y H:i') }}</div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-1">
                                    @if(request('search'))
                                    No results found for "{{ request('search') }}"
                                    @else
                                    No leads found
                                    @endif
                                </h3>
                                <p class="text-gray-500">
                                    @if(request('search'))
                                    Try with different keywords
                                    @else
                                    Demo requests from the contact form will appear here
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
        <div class="px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing {{ $leads->count() }} of {{ $totalLeads }} leads
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

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
                                selectElement.classList.add('bg-white', 'border-gray-300', 'text-gray-700');
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
                            messageEl.textContent = data.message || 'Failed to update status';
                            messageEl.className = 'status-message text-xs text-red-600 mt-1';
                            messageEl.classList.remove('hidden');

                            updatingEl.classList.add('hidden');
                        }
                    })
                    .catch(error => {
                        // Revert to original status in case of network error
                        this.value = currentStatus;

                        // Show error message
                        messageEl.textContent = 'Network error occurred';
                        messageEl.className = 'status-message text-xs text-red-600 mt-1';
                        messageEl.classList.remove('hidden');

                        updatingEl.classList.add('hidden');

                        console.error('Error:', error);
                    });
            });
        });
    });

</script>
@endsection
