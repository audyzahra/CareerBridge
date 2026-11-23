@extends('layouts.super-admin')

@section('title', 'Organizer Details')

@section('page-content')
<div class="min-h-screen bg-[#F8FBFF] px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl">

        {{-- Back Button --}}
        <div class="mb-6">
            <a
                href="{{ route('super-admin.organizers.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-sky-600"
            >
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Organizer Management
            </a>
        </div>

        {{-- Header --}}
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Organizer Details
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Review organizer information and manage verification.
                </p>
            </div>

            @php
                $statusClasses = [
                    'pending' => 'bg-amber-50 text-amber-700 ring-amber-200',
                    'verified' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                    'rejected' => 'bg-red-50 text-red-700 ring-red-200',
                ];

                $statusClass = $statusClasses[$organizer->verification_status]
                    ?? 'bg-slate-50 text-slate-600 ring-slate-200';
            @endphp

            <span class="inline-flex w-fit rounded-full px-4 py-2 text-sm font-semibold capitalize ring-1 ring-inset {{ $statusClass }}">
                {{ $organizer->verification_status }}
            </span>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <p class="font-semibold">Unable to update verification status.</p>
                <ul class="mt-1 list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Organizer Overview --}}
        <div class="mb-6 rounded-2xl border border-sky-100 bg-white p-6 shadow-sm sm:p-8">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

                <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-2xl bg-sky-100 text-3xl font-bold text-sky-700">
                    {{ strtoupper(substr($organizer->organization_name, 0, 1)) }}
                </div>

                <div class="min-w-0 flex-1">
                    <h2 class="text-xl font-bold text-slate-800">
                        {{ $organizer->organization_name }}
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ ucwords(str_replace('_', ' ', $organizer->organization_type)) }}
                    </p>

                    <p class="mt-2 text-sm text-slate-400">
                        Registered on
                        {{ $organizer->created_at?->format('d M Y') ?? '-' }}
                    </p>
                </div>

                <div class="rounded-xl bg-sky-50 px-5 py-4 sm:min-w-36">
                    <p class="text-xs font-medium text-slate-500">
                        Total Opportunities
                    </p>
                    <p class="mt-1 text-2xl font-bold text-sky-700">
                        {{ number_format($organizer->opportunities_count) }}
                    </p>
                </div>

            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Organizer Information --}}
            <div class="space-y-6 lg:col-span-2">

                {{-- Organization Information --}}
                <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 border-b border-slate-100 pb-4">
                        <h3 class="text-base font-semibold text-slate-800">
                            Organization Information
                        </h3>
                        <p class="mt-1 text-sm text-slate-500">
                            Basic information about the registered organization.
                        </p>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Organization Name
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ $organizer->organization_name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Organization Type
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ ucwords(str_replace('_', ' ', $organizer->organization_type)) }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Description
                            </p>
                            <p class="mt-1 whitespace-pre-line text-sm leading-6 text-slate-600">
                                {{ $organizer->description ?: 'No description provided.' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Website
                            </p>

                            @if ($organizer->website_url)
                                <a
                                    href="{{ $organizer->website_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-1 inline-flex items-center gap-1 text-sm font-medium text-sky-600 hover:text-sky-700 hover:underline"
                                >
                                    {{ $organizer->website_url }}

                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 3h7v7m-1-6L10 14M19 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6"/>
                                    </svg>
                                </a>
                            @else
                                <p class="mt-1 text-sm text-slate-400">
                                    No website provided.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Contact Information --}}
                <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 border-b border-slate-100 pb-4">
                        <h3 class="text-base font-semibold text-slate-800">
                            Contact Information
                        </h3>
                        <p class="mt-1 text-sm text-slate-500">
                            Organizer contact details.
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                            Contact Email
                        </p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $organizer->contact_email }}
                        </p>
                    </div>
                </div>

                {{-- Account Information --}}
                <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 border-b border-slate-100 pb-4">
                        <h3 class="text-base font-semibold text-slate-800">
                            Account Information
                        </h3>
                        <p class="mt-1 text-sm text-slate-500">
                            User account associated with this organizer.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Account Name
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ $organizer->user?->name ?? 'Unavailable' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Account Email
                            </p>
                            <p class="mt-1 break-all text-sm font-semibold text-slate-700">
                                {{ $organizer->user?->email ?? 'Unavailable' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Account ID
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ $organizer->user_id }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Profile ID
                            </p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                {{ $organizer->id }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Verification Panel --}}
            <div class="lg:col-span-1">
                <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <div class="mb-5">
                        <h3 class="text-base font-semibold text-slate-800">
                            Verification Management
                        </h3>
                        <p class="mt-1 text-sm leading-5 text-slate-500">
                            Review and update this organizer's verification status.
                        </p>
                    </div>

                    <div class="mb-5 rounded-xl bg-slate-50 p-4">
                        <p class="text-xs font-medium text-slate-500">
                            Current Status
                        </p>

                        <span class="mt-2 inline-flex rounded-full px-3 py-1 text-xs font-semibold capitalize ring-1 ring-inset {{ $statusClass }}">
                            {{ $organizer->verification_status }}
                        </span>
                    </div>

                    <form
                        action="{{ route('super-admin.organizers.update-verification', $organizer->id) }}"
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
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                        >
                            <option value="pending" @selected($organizer->verification_status === 'pending')>
                                Pending
                            </option>
                            <option value="verified" @selected($organizer->verification_status === 'verified')>
                                Verified
                            </option>
                            <option value="rejected" @selected($organizer->verification_status === 'rejected')>
                                Rejected
                            </option>
                        </select>

                        <button
                            type="submit"
                            class="mt-4 w-full rounded-xl bg-[#65B5E8] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#4DA4DC]"
                        >
                            Update Status
                        </button>
                    </form>

                    <div class="mt-5 border-t border-slate-100 pt-5">
                        <p class="text-xs leading-5 text-slate-400">
                            Changing the verification status will immediately update the organizer profile.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
