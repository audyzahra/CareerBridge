@extends('layouts.super-admin')

@section('title', 'Opportunity Management')

@section('content')
<div class="min-h-screen bg-[#F8FBFF] px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-slate-800">
                Opportunity Management
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Manage opportunities, review submissions, and monitor publication status.
            </p>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- Publication Statistics --}}
        <div class="mb-5 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            <div class="rounded-2xl border border-sky-100 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Total Opportunities</p>
                <p class="mt-2 text-2xl font-bold text-slate-800">
                    {{ number_format($totalOpportunities) }}
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Draft</p>
                <p class="mt-2 text-2xl font-bold text-slate-800">
                    {{ number_format($draftOpportunities) }}
                </p>
            </div>

            <div class="rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Published</p>
                <p class="mt-2 text-2xl font-bold text-emerald-600">
                    {{ number_format($publishedOpportunities) }}
                </p>
            </div>

            <div class="rounded-2xl border border-red-100 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Closed</p>
                <p class="mt-2 text-2xl font-bold text-red-600">
                    {{ number_format($closedOpportunities) }}
                </p>
            </div>

        </div>

        {{-- Verification Statistics --}}
        <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-3">

            <div class="rounded-2xl border border-amber-100 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Pending Verification</p>
                <p class="mt-2 text-2xl font-bold text-amber-600">
                    {{ number_format($pendingOpportunities) }}
                </p>
            </div>

            <div class="rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Verified Opportunities</p>
                <p class="mt-2 text-2xl font-bold text-emerald-600">
                    {{ number_format($verifiedOpportunities) }}
                </p>
            </div>

            <div class="rounded-2xl border border-red-100 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Rejected Opportunities</p>
                <p class="mt-2 text-2xl font-bold text-red-600">
                    {{ number_format($rejectedOpportunities) }}
                </p>
            </div>

        </div>

        {{-- Opportunity Table --}}
        <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-sm">

            {{-- Table Header --}}
            <div class="border-b border-slate-100 px-5 py-5 sm:px-6">
                <div class="flex flex-col gap-4">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">
                            Opportunity List
                        </h2>
                        <p class="mt-1 text-sm text-slate-500">
                            View and manage all submitted opportunities.
                        </p>
                    </div>

                    {{-- Search and Filters --}}
                    <form
                        action="{{ route('super-admin.opportunities.index') }}"
                        method="GET"
                        id="opportunityFilterForm"
                        class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-4"
                    >
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search opportunities..."
                            class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                        >

                        <select
                            name="category"
                            onchange="this.form.submit()"
                            class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-600 outline-none focus:border-sky-400"
                        >
                            <option value="">All Categories</option>
                            <option value="scholarship" @selected(request('category') === 'scholarship')>Scholarship</option>
                            <option value="internship" @selected(request('category') === 'internship')>Internship</option>
                            <option value="competition" @selected(request('category') === 'competition')>Competition</option>
                            <option value="training" @selected(request('category') === 'training')>Training</option>
                        </select>

                        <select
                            name="status"
                            onchange="this.form.submit()"
                            class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-600 outline-none focus:border-sky-400"
                        >
                            <option value="">All Publication Statuses</option>
                            <option value="draft" @selected(request('status') === 'draft')>Draft</option>
                            <option value="published" @selected(request('status') === 'published')>Published</option>
                            <option value="closed" @selected(request('status') === 'closed')>Closed</option>
                        </select>

                        <select
                            name="verification_status"
                            onchange="this.form.submit()"
                            class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-600 outline-none focus:border-sky-400"
                        >
                            <option value="">All Verification Statuses</option>
                            <option value="pending" @selected(request('verification_status') === 'pending')>Pending</option>
                            <option value="verified" @selected(request('verification_status') === 'verified')>Verified</option>
                            <option value="rejected" @selected(request('verification_status') === 'rejected')>Rejected</option>
                        </select>

                        <div class="flex flex-wrap gap-2 sm:col-span-2 xl:col-span-4">
                            <button
                                type="submit"
                                class="rounded-xl bg-[#65B5E8] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#4DA4DC]"
                            >
                                Search
                            </button>

                            <a
                                href="{{ route('super-admin.opportunities.index') }}"
                                class="rounded-xl border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                            >
                                Reset Filters
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full min-w-[1050px] text-left">
                    <thead class="bg-[#F4F9FE]">
                        <tr class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-6 py-4">Opportunity</th>
                            <th class="px-6 py-4">Organizer</th>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Deadline</th>
                            <th class="px-6 py-4">Publication</th>
                            <th class="px-6 py-4">Verification</th>
                            <th class="px-6 py-4 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse ($opportunities as $opportunity)
                            <tr class="transition hover:bg-sky-50/40">

                                {{-- Opportunity --}}
                                <td class="px-6 py-4">
                                    <p class="max-w-xs truncate text-sm font-semibold text-slate-700">
                                        {{ $opportunity->title }}
                                    </p>
                                    <p class="mt-1 text-xs text-slate-400">
                                        #{{ $opportunity->id }}
                                    </p>
                                </td>

                                {{-- Organizer --}}
                                <td class="px-6 py-4">
                                    <span class="text-sm text-slate-600">
                                        {{ $opportunity->organizerProfile?->organization_name ?? 'Unavailable' }}
                                    </span>
                                </td>

                                {{-- Category --}}
                                <td class="px-6 py-4">
                                    <span class="text-sm capitalize text-slate-600">
                                        {{ $opportunity->category }}
                                    </span>
                                </td>

                                {{-- Deadline --}}
                                <td class="px-6 py-4">
                                    <span class="text-sm text-slate-600">
                                        {{ $opportunity->registration_deadline?->format('d M Y') ?? 'Not specified' }}
                                    </span>
                                </td>

                                {{-- Publication Status --}}
                                <td class="px-6 py-4">
                                    @php
                                        $publicationClasses = [
                                            'draft' => 'bg-slate-100 text-slate-600',
                                            'published' => 'bg-emerald-50 text-emerald-700',
                                            'closed' => 'bg-red-50 text-red-700',
                                        ];
                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold capitalize {{ $publicationClasses[$opportunity->status] ?? 'bg-slate-100 text-slate-600' }}">
                                        {{ $opportunity->status }}
                                    </span>
                                </td>

                                {{-- Verification Status --}}
                                <td class="px-6 py-4">
                                    @php
                                        $verificationClasses = [
                                            'pending' => 'bg-amber-50 text-amber-700',
                                            'verified' => 'bg-emerald-50 text-emerald-700',
                                            'rejected' => 'bg-red-50 text-red-700',
                                        ];
                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold capitalize {{ $verificationClasses[$opportunity->verification_status] ?? 'bg-slate-100 text-slate-600' }}">
                                        {{ $opportunity->verification_status }}
                                    </span>
                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-4 text-center">
                                    <a
                                        href="{{ route('super-admin.opportunities.show', $opportunity->id) }}"
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
                                <td colspan="7" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                                d="M4 5h16M4 10h16M4 15h10M4 20h10"/>
                                        </svg>
                                    </div>

                                    <h3 class="mt-4 text-sm font-semibold text-slate-700">
                                        No opportunities found
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
            @if ($opportunities->total() > 0)
                <div class="flex flex-col gap-4 border-t border-slate-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                    <p class="text-sm text-slate-500">
                        Showing
                        <span class="font-semibold text-slate-700">{{ $opportunities->firstItem() }}</span>
                        to
                        <span class="font-semibold text-slate-700">{{ $opportunities->lastItem() }}</span>
                        of
                        <span class="font-semibold text-slate-700">{{ $opportunities->total() }}</span>
                        opportunities
                    </p>

                    <div>
                        {{ $opportunities->onEachSide(1)->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
