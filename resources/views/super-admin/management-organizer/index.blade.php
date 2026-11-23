@extends('layouts.super-admin')

@section('title', 'Organizer Management')

@section('content')
<div class="min-h-screen bg-[#F8FBFF] px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-slate-800">
                Organizer Management
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Manage organizer profiles and review their verification status.
            </p>
        </div>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        {{-- Statistics --}}
        <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Total Organizers --}}
            <div class="rounded-2xl border border-sky-100 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Total Organizers
                        </p>
                        <h3 class="mt-2 text-2xl font-bold text-slate-800">
                            {{ number_format($totalOrganizers) }}
                        </h3>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-50 text-sky-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M17 20h5v-2a3 3 0 00-5.65-1.35M17 20H7m10 0v-2c0-.7-.15-1.37-.42-1.97M7 20H2v-2a3 3 0 015.65-1.35M7 20v-2c0-.7.15-1.37.42-1.97m0 0a5 5 0 019.16 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Pending --}}
            <div class="rounded-2xl border border-amber-100 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Pending Verification
                        </p>
                        <h3 class="mt-2 text-2xl font-bold text-slate-800">
                            {{ number_format($pendingOrganizers) }}
                        </h3>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 8v4l2.5 2.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Verified --}}
            <div class="rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Verified Organizers
                        </p>
                        <h3 class="mt-2 text-2xl font-bold text-slate-800">
                            {{ number_format($verifiedOrganizers) }}
                        </h3>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Rejected --}}
            <div class="rounded-2xl border border-red-100 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Rejected Organizers
                        </p>
                        <h3 class="mt-2 text-2xl font-bold text-slate-800">
                            {{ number_format($rejectedOrganizers) }}
                        </h3>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-50 text-red-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M10 10l4 4m0-4l-4 4m11-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>

        {{-- Organizer Table --}}
        <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-sm">

            {{-- Table Header --}}
            <div class="border-b border-slate-100 px-5 py-5 sm:px-6">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">
                            Organizer List
                        </h2>
                        <p class="mt-1 text-sm text-slate-500">
                            View and manage registered organizers.
                        </p>
                    </div>

                    {{-- Search and Filter --}}
                    <form
                        action="{{ route('super-admin.organizers.index') }}"
                        method="GET"
                        id="organizerFilterForm"
                        class="flex flex-col gap-3 sm:flex-row"
                    >
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search organizers..."
                                class="w-full rounded-xl border border-slate-200 py-2.5 pl-10 pr-4 text-sm text-slate-700 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100 sm:w-64"
                            >
                        </div>

                        <select
                            name="status"
                            class="rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-600 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                            onchange="document.getElementById('organizerFilterForm').submit()"
                        >
                            <option value="">All Statuses</option>
                            <option value="pending" @selected(request('status') === 'pending')>
                                Pending
                            </option>
                            <option value="verified" @selected(request('status') === 'verified')>
                                Verified
                            </option>
                            <option value="rejected" @selected(request('status') === 'rejected')>
                                Rejected
                            </option>
                        </select>

                        <button
                            type="submit"
                            class="rounded-xl bg-[#65B5E8] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#4DA4DC]"
                        >
                            Search
                        </button>
                    </form>
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left">
                    <thead class="bg-[#F4F9FE]">
                        <tr class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-6 py-4">Organizer</th>
                            <th class="px-6 py-4">Contact Email</th>
                            <th class="px-6 py-4">Organization Type</th>
                            <th class="px-6 py-4 text-center">Opportunities</th>
                            <th class="px-6 py-4">Verification Status</th>
                            <th class="px-6 py-4 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse ($organizers as $organizer)
                            <tr class="transition hover:bg-sky-50/40">

                                {{-- Organizer --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sky-100 text-sm font-bold text-sky-700">
                                            {{ strtoupper(substr($organizer->organization_name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-700">
                                                {{ $organizer->organization_name }}
                                            </p>
                                            <p class="mt-0.5 text-xs text-slate-400">
                                                {{ $organizer->user?->name ?? 'No user name' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Contact Email --}}
                                <td class="px-6 py-4">
                                    <span class="text-sm text-slate-600">
                                        {{ $organizer->contact_email }}
                                    </span>
                                </td>

                                {{-- Organization Type --}}
                                <td class="px-6 py-4">
                                    <span class="text-sm text-slate-600">
                                        {{ ucwords(str_replace('_', ' ', $organizer->organization_type)) }}
                                    </span>
                                </td>

                                {{-- Opportunities --}}
                                <td class="px-6 py-4 text-center">
                                    <span class="text-sm font-semibold text-slate-700">
                                        {{ $organizer->opportunities_count }}
                                    </span>
                                </td>

                                {{-- Verification Status --}}
                                <td class="px-6 py-4">
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-amber-50 text-amber-700 ring-amber-200',
                                            'verified' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                                            'rejected' => 'bg-red-50 text-red-700 ring-red-200',
                                        ];

                                        $statusClass = $statusClasses[$organizer->verification_status]
                                            ?? 'bg-slate-50 text-slate-600 ring-slate-200';
                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold capitalize ring-1 ring-inset {{ $statusClass }}">
                                        {{ $organizer->verification_status }}
                                    </span>
                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-4 text-center">
                                    <a
                                        href="{{ route('super-admin.organizers.show', $organizer->id) }}"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-sky-200 px-3 py-2 text-xs font-semibold text-sky-700 transition hover:bg-sky-50"
                                    >
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M2.5 12s3.5-7 9.5-7 9.5 7 9.5 7-3.5 7-9.5 7-9.5-7-9.5-7z"/>
                                            <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                                        </svg>
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                                d="M17 20h5v-2a3 3 0 00-5.65-1.35M17 20H7m10 0v-2c0-.7-.15-1.37-.42-1.97M7 20H2v-2a3 3 0 015.65-1.35M7 20v-2c0-.7.15-1.37.42-1.97m0 0a5 5 0 019.16 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>

                                    <h3 class="mt-4 text-sm font-semibold text-slate-700">
                                        No organizers found
                                    </h3>
                                    <p class="mt-1 text-sm text-slate-400">
                                        Try adjusting your search or filter criteria.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($organizers->hasPages() || $organizers->total() > 0)
                <div class="flex flex-col gap-4 border-t border-slate-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">

                    <p class="text-sm text-slate-500">
                        Showing
                        <span class="font-semibold text-slate-700">
                            {{ $organizers->firstItem() ?? 0 }}
                        </span>
                        to
                        <span class="font-semibold text-slate-700">
                            {{ $organizers->lastItem() ?? 0 }}
                        </span>
                        of
                        <span class="font-semibold text-slate-700">
                            {{ $organizers->total() }}
                        </span>
                        organizers
                    </p>

                    <div>
                        {{ $organizers->onEachSide(1)->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
