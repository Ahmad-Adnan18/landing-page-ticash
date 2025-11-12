@extends('layouts.admin')

@section('page-title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard Overview</h1>
        <p class="text-gray-600 mt-1">Welcome back! Here's what's happening with ticash today.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Testimonials Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Testimonials</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Testimonial::count() }}</p>
                </div>
                <div class="p-3 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.testimonials') }}" class="inline-flex items-center text-sm font-medium text-blue-600 mt-4 hover:text-blue-800">
                View Details
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Leads Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Leads</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Lead::count() }}</p>
                </div>
                <div class="p-3 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.leads') }}" class="inline-flex items-center text-sm font-medium text-purple-600 mt-4 hover:text-purple-800">
                Manage Leads
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Leads by Status Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Pending Leads</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Lead::where('status', 'pending')->count() }}</p>
                </div>
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.leads') }}?status=pending" class="inline-flex items-center text-sm font-medium text-yellow-600 mt-4 hover:text-yellow-800">
                View Pending
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Settings Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Settings</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">Updated</p>
                </div>
                <div class="p-3 bg-emerald-100 rounded-lg">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-2.573 1.065c-.94 1.543.826 3.31 2.37 2.37.996-.608 2.296.07 2.572 1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.settings') }}" class="inline-flex items-center text-sm font-medium text-emerald-600 mt-4 hover:text-emerald-800">
                Update Settings
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Leads Distribution Chart -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Leads Status Distribution</h3>
            <div class="space-y-4">
                @php
                    $pendingCount = \App\Models\Lead::where('status', 'pending')->count();
                    $processCount = \App\Models\Lead::where('status', 'process')->count();
                    $approvedCount = \App\Models\Lead::where('status', 'approved')->count();
                    $rejectedCount = \App\Models\Lead::where('status', 'rejected')->count();
                    $totalCount = \App\Models\Lead::count();
                    
                    $pendingPercent = $totalCount > 0 ? round(($pendingCount / $totalCount) * 100, 1) : 0;
                    $processPercent = $totalCount > 0 ? round(($processCount / $totalCount) * 100, 1) : 0;
                    $approvedPercent = $totalCount > 0 ? round(($approvedCount / $totalCount) * 100, 1) : 0;
                    $rejectedPercent = $totalCount > 0 ? round(($rejectedCount / $totalCount) * 100, 1) : 0;
                @endphp
                
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Pending: {{ $pendingCount }}</span>
                    <span class="text-sm text-gray-500">{{ $pendingPercent }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $pendingPercent }}%"></div>
                </div>
                
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">In Process: {{ $processCount }}</span>
                    <span class="text-sm text-gray-500">{{ $processPercent }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $processPercent }}%"></div>
                </div>
                
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Approved: {{ $approvedCount }}</span>
                    <span class="text-sm text-gray-500">{{ $approvedPercent }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ $approvedPercent }}%"></div>
                </div>
                
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Rejected: {{ $rejectedCount }}</span>
                    <span class="text-sm text-gray-500">{{ $rejectedPercent }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-red-500 h-2 rounded-full" style="width: {{ $rejectedPercent }}%"></div>
                </div>
            </div>
        </div>

        <!-- Recent Leads -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Recent Leads</h3>
            <div class="space-y-4">
                @forelse(\App\Models\Lead::orderBy('created_at', 'desc')->take(5)->get() as $lead)
                <div class="flex items-center justify-between border-b pb-3 last:border-0 last:pb-0">
                    <div>
                        <p class="font-medium text-gray-900">{{ $lead->name }}</p>
                        <p class="text-sm text-gray-500">{{ $lead->pesantren_name }}</p>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                        @if($lead->status === 'pending')
                            bg-yellow-100 text-yellow-800
                        @elseif($lead->status === 'process')
                            bg-blue-100 text-blue-800
                        @elseif($lead->status === 'approved')
                            bg-green-100 text-green-800
                        @elseif($lead->status === 'rejected')
                            bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($lead->status) }}
                    </span>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">No leads found</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection