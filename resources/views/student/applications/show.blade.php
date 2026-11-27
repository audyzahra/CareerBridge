@extends('layouts.public')

@section('title', 'Application Details | CareerBridge')

@section('content')

<div class="min-h-screen bg-[#F8FBFF] px-5 py-10 sm:px-8">

    <div class="mx-auto max-w-4xl">

        {{-- Breadcrumb --}}
        <nav class="mb-7 flex items-center gap-2 text-xs font-semibold text-[#91A9BC]">
            <a href="{{ route('student.applications') }}" class="hover:text-[#5799CE]">
                My Applications
            </a>
            <span>/</span>
            <span class="text-[#5799CE]">Application Details</span>
        </nav>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- Header --}}
        <div class="mb-7">
            <span class="text-xs font-bold uppercase tracking-widest text-[#65A9D8]">
                CareerBridge
            </span>

            <h1 class="mt-2 text-3xl font-extrabold text-[#304F6B]">
                Application Details
            </h1>

            <p class="mt-2 text-sm text-[#8AA4B9]">
                Review the information of your submitted application.
            </p>
        </div>

        {{-- Application Status --}}
        <div class="mb-6 rounded-2xl border border-[#E2EDF5] bg-white p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#91A9BC]">
                        Application Status
                    </p>

                    <h2 class="mt-2 text-xl font-extrabold text-[#304F6B]">
                        {{ ucfirst($application->status) }}
                    </h2>
                </div>

                @php
                    $statusStyles = [
                        'pending' => 'bg-amber-50 text-amber-700',
                        'reviewing' => 'bg-blue-50 text-blue-700',
                        'shortlisted' => 'bg-purple-50 text-purple-700',
                        'accepted' => 'bg-emerald-50 text-emerald-700',
                        'rejected' => 'bg-rose-50 text-rose-700',
                        'withdrawn' => 'bg-slate-100 text-slate-600',
                    ];
                @endphp

                <span class="rounded-full px-4 py-2 text-xs font-bold {{ $statusStyles[$application->status] ?? 'bg-slate-100 text-slate-600' }}">
                    {{ ucfirst($application->status) }}
                </span>
            </div>
        </div>

        {{-- Opportunity Information --}}
        <div class="mb-6 rounded-2xl border border-[#E2EDF5] bg-white p-6">
            <h2 class="text-lg font-extrabold text-[#304F6B]">
                Opportunity Information
            </h2>

            <div class="mt-5 space-y-4">
                <div>
                    <p class="text-xs text-[#91A9BC]">Opportunity Title</p>
                    <p class="mt-1 font-bold text-[#52718D]">
                        {{ $application->opportunity->title }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-[#91A9BC]">Organizer</p>
                    <p class="mt-1 font-semibold text-[#52718D]">
                        {{ $application->opportunity->organizerProfile?->organization_name ?? 'Independent Organizer' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-[#91A9BC]">Registration Deadline</p>
                    <p class="mt-1 font-semibold text-[#52718D]">
                        {{ $application->opportunity->registration_deadline
                            ? \Carbon\Carbon::parse($application->opportunity->registration_deadline)->format('d M Y')
                            : 'Not specified' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Submitted Information --}}
        <div class="mb-6 rounded-2xl border border-[#E2EDF5] bg-white p-6">
            <h2 class="text-lg font-extrabold text-[#304F6B]">
                Submitted Information
            </h2>

            <div class="mt-5 space-y-5">
                <div>
                    <p class="text-xs text-[#91A9BC]">Application Date</p>
                    <p class="mt-1 text-sm font-semibold text-[#52718D]">
                        {{ $application->applied_at?->format('d M Y, H:i') ?? '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-[#91A9BC]">Resume</p>
                    <p class="mt-1 text-sm font-semibold text-[#52718D]">
                        {{ $application->resume?->file_name ?? 'No resume attached' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-[#91A9BC]">Cover Letter</p>
                    <div class="mt-2 rounded-xl bg-[#F8FBFF] p-4 text-sm leading-7 text-[#6D8BA4]">
                        {{ $application->cover_letter ?: 'No cover letter submitted.' }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex flex-wrap justify-between gap-3">
            <a href="{{ route('student.applications') }}"
                class="rounded-xl border border-[#DCEAF5] bg-white px-5 py-3 text-sm font-bold text-[#7896AE] transition hover:bg-[#F1F7FC]">
                Back to My Applications
            </a>

            <a href="{{ route('opportunities.show', $application->opportunity->slug) }}"
                class="rounded-xl bg-[#65A9D8] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#5599C9]">
                View Opportunity
            </a>
        </div>

    </div>

</div>

@endsection
