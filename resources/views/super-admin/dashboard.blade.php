@extends('layouts.super-admin')

@section('title', 'Dashboard | CareerBridge')

@section('content')

<div class="space-y-8">

    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-semibold text-sky-500">
                Administration
            </p>

            <h1 class="mt-1 text-3xl font-extrabold text-slate-800">
                Dashboard
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Welcome to the CareerBridge administration panel.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white px-5 py-3 shadow-sm">
            <p class="text-sm font-medium text-slate-600">
                {{ now()->format('d F Y') }}
            </p>
        </div>
    </div>


    {{-- Main Statistics --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Total Users --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M17 20h5v-2a4 4 0 00-5.5-3.7M9 20H2v-2a4 4 0 017-2.6M16 7a4 4 0 11-8 0 4 4 0 018 0zm6 4a3 3 0 11-6 0 3 3 0 016 0zM2 11a3 3 0 106 0 3 3 0 00-6 0z"/>
                    </svg>
                </div>

                <span class="text-xs font-semibold text-slate-400">
                    All Accounts
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Users
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalUsers) }}
            </h2>
        </div>


        {{-- Total Students --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-100 text-cyan-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 3L2 8l10 5 10-5-10-5zm-7 8v5l7 4 7-4v-5"/>
                    </svg>
                </div>

                <span class="text-xs font-semibold text-slate-400">
                    Student Accounts
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Students
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalStudents) }}
            </h2>
        </div>


        {{-- Total Organizers --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4M9 9v.01M9 12v.01M9 15v.01M9 18v.01M15 14v.01M15 17v.01"/>
                    </svg>
                </div>

                <span class="text-xs font-semibold text-slate-400">
                    Organizer Accounts
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Organizers
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalOrganizers) }}
            </h2>
        </div>


        {{-- Total Opportunities --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-orange-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 3l2.5 5.5L20 11l-5.5 2.5L12 19l-2.5-5.5L4 11l5.5-2.5L12 3z"/>
                    </svg>
                </div>

                <span class="text-xs font-semibold text-slate-400">
                    Platform Listings
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Opportunities
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalOpportunities) }}
            </h2>
        </div>

    </div>


    {{-- Organizer and Opportunity Overview --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

        {{-- Organizer Verification --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-slate-800">
                        Organizer Verification
                    </h2>
                    <p class="mt-1 text-xs text-slate-400">
                        Overview of organizer verification requests.
                    </p>
                </div>

                <a href="{{ route('super-admin.organizers.index') }}"
                   class="text-xs font-bold text-sky-600 hover:text-sky-700">
                    View All
                </a>
            </div>

            <div class="mt-6 grid grid-cols-3 gap-3">

                <div class="rounded-xl bg-amber-50 p-4">
                    <p class="text-xs font-semibold text-amber-600">Pending</p>
                    <p class="mt-2 text-2xl font-extrabold text-amber-700">
                        {{ number_format($pendingOrganizers) }}
                    </p>
                </div>

                <div class="rounded-xl bg-emerald-50 p-4">
                    <p class="text-xs font-semibold text-emerald-600">Verified</p>
                    <p class="mt-2 text-2xl font-extrabold text-emerald-700">
                        {{ number_format($verifiedOrganizers) }}
                    </p>
                </div>

                <div class="rounded-xl bg-rose-50 p-4">
                    <p class="text-xs font-semibold text-rose-600">Rejected</p>
                    <p class="mt-2 text-2xl font-extrabold text-rose-700">
                        {{ number_format($rejectedOrganizers) }}
                    </p>
                </div>

            </div>
        </div>


        {{-- Opportunity Overview --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-slate-800">
                        Opportunity Overview
                    </h2>
                    <p class="mt-1 text-xs text-slate-400">
                        Overview of opportunity publication status.
                    </p>
                </div>

                <a href="{{ route('super-admin.opportunities.index') }}"
                   class="text-xs font-bold text-sky-600 hover:text-sky-700">
                    View All
                </a>
            </div>

            <div class="mt-6 grid grid-cols-3 gap-3">

                <div class="rounded-xl bg-emerald-50 p-4">
                    <p class="text-xs font-semibold text-emerald-600">Published</p>
                    <p class="mt-2 text-2xl font-extrabold text-emerald-700">
                        {{ number_format($publishedOpportunities) }}
                    </p>
                </div>

                <div class="rounded-xl bg-amber-50 p-4">
                    <p class="text-xs font-semibold text-amber-600">Draft</p>
                    <p class="mt-2 text-2xl font-extrabold text-amber-700">
                        {{ number_format($draftOpportunities) }}
                    </p>
                </div>

                <div class="rounded-xl bg-slate-100 p-4">
                    <p class="text-xs font-semibold text-slate-600">Closed</p>
                    <p class="mt-2 text-2xl font-extrabold text-slate-700">
                        {{ number_format($closedOpportunities) }}
                    </p>
                </div>

            </div>
        </div>

    </div>


    {{-- Recent Users --}}
    <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">

        <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">
            <div>
                <h2 class="font-bold text-slate-800">
                    Recent Users
                </h2>
                <p class="mt-1 text-xs text-slate-400">
                    Latest registered accounts on CareerBridge.
                </p>
            </div>

            <a href="{{ route('super-admin.users.index') }}"
               class="text-sm font-bold text-sky-600 hover:text-sky-700">
                View All
            </a>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-400">
                    <tr>
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4">Email Address</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Registration Date</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($recentUsers as $user)

                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-sky-100 font-bold text-sky-600">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>

                                    <span class="font-semibold text-slate-700">
                                        {{ $user->name }}
                                    </span>

                                </div>
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ $user->email }}
                            </td>

                            <td class="px-6 py-4">

                                @php
                                    $roleStyle = match($user->role) {
                                        'super_admin' => 'bg-purple-50 text-purple-700',
                                        'organizer' => 'bg-emerald-50 text-emerald-700',
                                        default => 'bg-sky-50 text-sky-700',
                                    };
                                @endphp

                                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $roleStyle }}">
                                    {{ ucfirst(str_replace('_', ' ', $user->role)) }}
                                </span>

                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-400">
                                No users found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Recent Opportunities --}}
    <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">

        <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">
            <div>
                <h2 class="font-bold text-slate-800">
                    Recent Opportunities
                </h2>
                <p class="mt-1 text-xs text-slate-400">
                    Latest opportunities submitted by organizers.
                </p>
            </div>

            <a href="{{ route('super-admin.opportunities.index') }}"
               class="text-sm font-bold text-sky-600 hover:text-sky-700">
                View All
            </a>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-400">
                    <tr>
                        <th class="px-6 py-4">Opportunity</th>
                        <th class="px-6 py-4">Organizer</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Publication</th>
                        <th class="px-6 py-4">Verification</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($recentOpportunities as $opportunity)

                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-700">
                                    {{ $opportunity->title }}
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    {{ \Carbon\Carbon::parse($opportunity->created_at)->format('d M Y') }}
                                </p>
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ $opportunity->organization_name }}
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ ucfirst($opportunity->category) }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">
                                    {{ ucfirst($opportunity->status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4">

                                @php
                                    $verificationStyle = match($opportunity->verification_status) {
                                        'verified' => 'bg-emerald-50 text-emerald-700',
                                        'rejected' => 'bg-rose-50 text-rose-700',
                                        default => 'bg-amber-50 text-amber-700',
                                    };
                                @endphp

                                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $verificationStyle }}">
                                    {{ ucfirst($opportunity->verification_status) }}
                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                No opportunities found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
