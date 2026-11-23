@extends('layouts.super-admin')

@section('title', 'Opportunity Details')

@section('content')
<div class="min-h-screen bg-[#F8FBFF] px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-6xl">

        {{-- Back Button --}}
        <div class="mb-6">
            <a
                href="{{ route('super-admin.opportunities.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-sky-600"
            >
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Opportunity Management
            </a>
        </div>

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-slate-800">
                Opportunity Details
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Review opportunity information and manage its publication and verification status.
            </p>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <p class="font-semibold">Unable to update opportunity status.</p>
                <ul class="mt-1 list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Opportunity Overview --}}
        <div class="mb-6 rounded-2xl border border-sky-100 bg-white p-6 shadow-sm sm:p-8">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-start">

                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-sky-100 text-2xl font-bold text-sky-700">
                    {{ strtoupper(substr($opportunity->title, 0, 1)) }}
                </div>

                <div class="min-w-0 flex-1">
                    <span class="inline-flex rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold capitalize text-sky-700">
                        {{ $opportunity->category }}
                    </span>

                    <h2 class="mt-3 text-xl font-bold text-slate-800">
                        {{ $opportunity->title }}
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Organized by
                        <span class="font-semibold text-slate-700">
                            {{ $opportunity->organizerProfile?->organization_name ?? 'Unavailable' }}
                        </span>
                    </p>

                    <p class="mt-2 text-xs text-slate-400">
                        Created on {{ $opportunity->created_at?->format('d M Y') ?? '-' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Main Information --}}
            <div class="space-y-6 lg:col-span-2">

                {{-- Description --}}
                <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <h3 class="mb-5 border-b border-slate-100 pb-4 text-base font-semibold text-slate-800">
                        Opportunity Information
                    </h3>

                    <div class="space-y-5">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Description
                            </p>
                            <p class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600">{{ $opportunity->description }}</p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Requirements
                            </p>
                            <p class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600">
                                {{ $opportunity->requirements ?: 'No requirements provided.' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Eligibility
                            </p>
                            <p class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600">
                                {{ $opportunity->eligibility ?: 'No eligibility information provided.' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Benefits
                            </p>
                            <p class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600">
                                {{ $opportunity->benefits ?: 'No benefits information provided.' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Registration Information --}}
                <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <h3 class="mb-5 border-b border-slate-100 pb-4 text-base font-semibold text-slate-800">
                        Registration Information
                    </h3>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Location
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ $opportunity->location ?: 'Not specified' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Registration URL
                            </p>

                            @if ($opportunity->registration_url)
                                <a
                                    href="{{ $opportunity->registration_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-1 block break-all text-sm font-medium text-sky-600 hover:underline"
                                >
                                    {{ $opportunity->registration_url }}
                                </a>
                            @else
                                <p class="mt-1 text-sm text-slate-400">
                                    Not provided
                                </p>
                            @endif
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Registration Start
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ $opportunity->registration_start?->format('d M Y') ?? 'Not specified' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Registration Deadline
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ $opportunity->registration_deadline?->format('d M Y') ?? 'Not specified' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Organizer Information --}}
                <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <h3 class="mb-5 border-b border-slate-100 pb-4 text-base font-semibold text-slate-800">
                        Organizer Information
                    </h3>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Organization Name
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ $opportunity->organizerProfile?->organization_name ?? 'Unavailable' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Contact Email
                            </p>
                            <p class="mt-1 break-all text-sm font-semibold text-slate-700">
                                {{ $opportunity->organizerProfile?->contact_email ?? 'Unavailable' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Organizer Account
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ $opportunity->organizerProfile?->user?->name ?? 'Unavailable' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Organizer Verification
                            </p>
                            <p class="mt-1 text-sm font-semibold capitalize text-slate-700">
                                {{ $opportunity->organizerProfile?->verification_status ?? 'Unavailable' }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Status Management --}}
            <div class="space-y-6">

                {{-- Publication Status --}}
                <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-semibold text-slate-800">
                        Publication Management
                    </h3>
                    <p class="mt-1 text-sm leading-5 text-slate-500">
                        Manage the publication status of this opportunity.
                    </p>

                    <div class="my-5 rounded-xl bg-slate-50 p-4">
                        <p class="text-xs font-medium text-slate-500">
                            Current Status
                        </p>
                        <p class="mt-2 text-sm font-semibold capitalize text-slate-700">
                            {{ $opportunity->status }}
                        </p>
                    </div>

                    <form
                        action="{{ route('super-admin.opportunities.update-publication-status', $opportunity->id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        <label for="status" class="mb-2 block text-sm font-medium text-slate-700">
                            Update Publication Status
                        </label>

                        <select
                            name="status"
                            id="status"
                            required
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                        >
                            <option value="draft" @selected($opportunity->status === 'draft')>Draft</option>
                            <option value="published" @selected($opportunity->status === 'published')>Published</option>
                            <option value="closed" @selected($opportunity->status === 'closed')>Closed</option>
                        </select>

                        <button
                            type="submit"
                            class="mt-4 w-full rounded-xl bg-[#65B5E8] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#4DA4DC]"
                        >
                            Update Publication
                        </button>
                    </form>
                </div>

                {{-- Verification Status --}}
                <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-semibold text-slate-800">
                        Verification Management
                    </h3>
                    <p class="mt-1 text-sm leading-5 text-slate-500">
                        Review and update the verification status of this opportunity.
                    </p>

                    <div class="my-5 rounded-xl bg-slate-50 p-4">
                        <p class="text-xs font-medium text-slate-500">
                            Current Status
                        </p>
                        <p class="mt-2 text-sm font-semibold capitalize text-slate-700">
                            {{ $opportunity->verification_status }}
                        </p>
                    </div>

                    <form
                        action="{{ route('super-admin.opportunities.update-verification-status', $opportunity->id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        <label
                            for="verification_status"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Update Verification Status
                        </label>

                        <select
                            name="verification_status"
                            id="verification_status"
                            required
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                        >
                            <option value="pending" @selected($opportunity->verification_status === 'pending')>Pending</option>
                            <option value="verified" @selected($opportunity->verification_status === 'verified')>Verified</option>
                            <option value="rejected" @selected($opportunity->verification_status === 'rejected')>Rejected</option>
                        </select>

                        <button
                            type="submit"
                            class="mt-4 w-full rounded-xl bg-[#65B5E8] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#4DA4DC]"
                        >
                            Update Verification
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
