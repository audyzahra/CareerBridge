@extends('layouts.public')

@section('title', $opportunity->title . ' | CareerBridge')

@section('content')

    @php
        use Illuminate\Support\Facades\Storage;
        use Illuminate\Support\Str;

        $categoryStyles = [
            'scholarship' => 'bg-amber-50 text-amber-600',
            'internship' => 'bg-emerald-50 text-emerald-600',
            'competition' => 'bg-purple-50 text-purple-600',
            'training' => 'bg-sky-50 text-sky-600',
        ];

        $category = $opportunity->category ?? 'other';

        $categoryStyle = $categoryStyles[$category] ?? 'bg-slate-100 text-slate-600';

        $deadline = $opportunity->registration_deadline;

        $isClosed = $deadline ? \Carbon\Carbon::parse($deadline)->startOfDay()->lt(now()->startOfDay()) : false;

        $organization = $opportunity->organizerProfile?->organization_name ?? 'Independent Organizer';

        $skills = $opportunity->opportunitySkills
            ->map(fn($item) => $item->skill?->name ?? $item->skill?->skill_name)
            ->filter();

        $posterUrl = $opportunity->poster_path ? Storage::disk('s3_public')->url($opportunity->poster_path) : null;
    @endphp

    <div class="min-h-screen bg-[#F8FBFF]">

        <div class="mx-auto max-w-[1200px] px-5 py-8 sm:px-8 lg:px-10">

            {{-- Breadcrumb --}}
            <nav class="mb-7 flex flex-wrap items-center gap-2 text-xs font-semibold text-[#91A9BC]">

                <a href="{{ route('home') }}" class="transition hover:text-[#5799CE]">
                    Home
                </a>

                <span>/</span>

                <a href="{{ route('opportunities.index') }}" class="transition hover:text-[#5799CE]">
                    Opportunities
                </a>

                <span>/</span>

                <span class="max-w-[200px] truncate text-[#5799CE]">
                    {{ $opportunity->title }}
                </span>

            </nav>


            {{-- Main Header --}}
            <section
                class="relative overflow-hidden rounded-3xl border border-[#E2EDF5] bg-gradient-to-br from-[#DCEEFF] via-[#EAF5FF] to-white p-7 sm:p-10">

                <div class="absolute -right-12 -top-16 h-64 w-64 rounded-full bg-sky-200/40 blur-3xl"></div>
                <div class="absolute -bottom-20 left-1/3 h-48 w-48 rounded-full bg-blue-200/40 blur-3xl"></div>

                <div class="relative">

                    <div class="flex flex-wrap items-center gap-2">

                        <span
                            class="rounded-full px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider {{ $categoryStyle }}">
                            {{ ucfirst($category) }}
                        </span>

                        @if ($opportunity->opportunityType)
                            <span class="rounded-full bg-white/80 px-3 py-1.5 text-[10px] font-bold text-[#7896AE]">
                                {{ $opportunity->opportunityType->name }}
                            </span>
                        @endif

                        <span
                            class="rounded-full px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider
                        {{ $isClosed ? 'bg-rose-50 text-rose-500' : 'bg-emerald-50 text-emerald-600' }}">
                            {{ $isClosed ? 'Closed' : 'Open' }}
                        </span>

                    </div>

                    <h1
                        class="mt-5 max-w-4xl text-3xl font-extrabold leading-tight tracking-tight text-[#304F6B] sm:text-4xl">
                        {{ $opportunity->title }}
                    </h1>

                    <div class="mt-5 flex flex-wrap items-center gap-x-6 gap-y-3 text-sm font-semibold text-[#7896AE]">

                        <span class="inline-flex items-center gap-2">
                            <svg class="h-4 w-4 text-[#65A9D8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4" stroke-width="1.7" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            {{ $organization }}
                        </span>

                        @if ($opportunity->location)
                            <span class="inline-flex items-center gap-2">
                                <svg class="h-4 w-4 text-[#65A9D8]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" stroke-width="1.7" />
                                    <circle cx="12" cy="10" r="2.5" stroke-width="1.7" />
                                </svg>
                                {{ $opportunity->location }}
                            </span>
                        @endif

                    </div>

                </div>

            </section>


            {{-- Main Content --}}
            <div class="mt-8 grid items-start gap-7 lg:grid-cols-3">

                {{-- Left Content --}}
                <div class="space-y-6 lg:col-span-2">

                    {{-- Poster --}}
                    @if ($posterUrl)
                        <section class="overflow-hidden rounded-3xl border border-[#E2EDF5] bg-white p-3 shadow-sm">

                            <img src="{{ $posterUrl }}" alt="{{ $opportunity->title }} poster"
                                class="max-h-[480px] w-full rounded-2xl object-contain">

                        </section>
                    @endif


                    {{-- Description --}}
                    <section class="rounded-3xl border border-[#E2EDF5] bg-white p-6 shadow-sm sm:p-8">

                        <div class="mb-5 flex items-center gap-3">

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EAF5FF] text-[#5799CE]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 20h9M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4Z" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-extrabold text-[#304F6B]">
                                    About This Opportunity
                                </h2>
                                <p class="text-xs text-[#91A9BC]">
                                    Get to know more about this opportunity.
                                </p>
                            </div>

                        </div>

                        <div class="text-sm leading-7 text-[#6D8BA4]">
                            {!! nl2br(e(strip_tags($opportunity->description ?? 'No description available.'))) !!}
                        </div>

                    </section>


                    {{-- Requirements --}}
                    @if ($opportunity->requirements)
                        <section class="rounded-3xl border border-[#E2EDF5] bg-white p-6 shadow-sm sm:p-8">

                            <div class="mb-5 flex items-center gap-3">

                                <div
                                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 11l3 3L22 4M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"
                                            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <div>
                                    <h2 class="text-lg font-extrabold text-[#304F6B]">
                                        Requirements
                                    </h2>
                                    <p class="text-xs text-[#91A9BC]">
                                        What you need to prepare.
                                    </p>
                                </div>

                            </div>

                            <div class="text-sm leading-7 text-[#6D8BA4]">
                                {!! nl2br(e(strip_tags($opportunity->requirements))) !!}
                            </div>

                        </section>
                    @endif


                    {{-- Eligibility --}}
                    @if ($opportunity->eligibility)
                        <section class="rounded-3xl border border-[#E2EDF5] bg-white p-6 shadow-sm sm:p-8">

                            <div class="mb-5 flex items-center gap-3">

                                <div
                                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-purple-50 text-purple-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="8" r="4" stroke-width="1.7" />
                                        <path d="M8.5 12.5 7 22l5-3 5 3-1.5-9.5" stroke-width="1.7" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <div>
                                    <h2 class="text-lg font-extrabold text-[#304F6B]">
                                        Eligibility
                                    </h2>
                                    <p class="text-xs text-[#91A9BC]">
                                        Who can apply?
                                    </p>
                                </div>

                            </div>

                            <div class="text-sm leading-7 text-[#6D8BA4]">
                                {!! nl2br(e(strip_tags($opportunity->eligibility))) !!}
                            </div>

                        </section>
                    @endif


                    {{-- Benefits --}}
                    @if ($opportunity->benefits)
                        <section class="rounded-3xl border border-[#E2EDF5] bg-white p-6 shadow-sm sm:p-8">

                            <div class="mb-5 flex items-center gap-3">

                                <div
                                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.6l6.2-.9L12 3Z"
                                            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <div>
                                    <h2 class="text-lg font-extrabold text-[#304F6B]">
                                        Benefits
                                    </h2>
                                    <p class="text-xs text-[#91A9BC]">
                                        What you will gain.
                                    </p>
                                </div>

                            </div>

                            <div class="text-sm leading-7 text-[#6D8BA4]">
                                {!! nl2br(e(strip_tags($opportunity->benefits))) !!}
                            </div>

                        </section>
                    @endif


                    {{-- Skills --}}
                    @if ($skills->isNotEmpty())
                        <section class="rounded-3xl border border-[#E2EDF5] bg-white p-6 shadow-sm sm:p-8">

                            <h2 class="text-lg font-extrabold text-[#304F6B]">
                                Required Skills
                            </h2>

                            <p class="mt-1 text-xs text-[#91A9BC]">
                                Skills related to this opportunity.
                            </p>

                            <div class="mt-5 flex flex-wrap gap-2">

                                @foreach ($skills as $skill)
                                    <span class="rounded-xl bg-[#F1F7FC] px-4 py-2 text-xs font-semibold text-[#7394AF]">
                                        {{ $skill }}
                                    </span>
                                @endforeach

                            </div>

                        </section>
                    @endif

                </div>


                {{-- Right Sidebar --}}
                <aside class="space-y-6 lg:sticky lg:top-8">

                    {{-- Application Card --}}
                    <section class="rounded-3xl border border-[#E2EDF5] bg-white p-6 shadow-sm">

                        <h2 class="text-lg font-extrabold text-[#304F6B]">
                            Opportunity Overview
                        </h2>

                        <p class="mt-1 text-xs text-[#91A9BC]">
                            Important information at a glance.
                        </p>

                        <div class="mt-6 space-y-5">

                            {{-- Registration Start --}}
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-[#91A9BC]">
                                    Registration Starts
                                </p>

                                <p class="mt-1 text-sm font-bold text-[#52718D]">
                                    {{ $opportunity->registration_start
                                        ? \Carbon\Carbon::parse($opportunity->registration_start)->format('d M Y')
                                        : 'Not specified' }}
                                </p>
                            </div>

                            {{-- Deadline --}}
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-[#91A9BC]">
                                    Registration Deadline
                                </p>

                                <p class="mt-1 text-sm font-bold {{ $isClosed ? 'text-rose-500' : 'text-[#52718D]' }}">
                                    {{ $deadline ? \Carbon\Carbon::parse($deadline)->format('d M Y') : 'Not specified' }}
                                </p>
                            </div>

                            {{-- Location --}}
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-[#91A9BC]">
                                    Location
                                </p>

                                <p class="mt-1 text-sm font-bold text-[#52718D]">
                                    {{ $opportunity->location ?: 'Not specified' }}
                                </p>
                            </div>

                            {{-- Organizer --}}
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-[#91A9BC]">
                                    Organizer
                                </p>

                                <p class="mt-1 text-sm font-bold text-[#52718D]">
                                    {{ $organization }}
                                </p>
                            </div>

                            {{-- Category --}}
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-[#91A9BC]">
                                    Category
                                </p>

                                <p class="mt-1 text-sm font-bold text-[#52718D]">
                                    {{ ucfirst($category) }}
                                </p>
                            </div>

                        </div>

                        {{-- Apply Button --}}
                        @if ($isClosed)
                            <div class="mt-7 rounded-xl bg-rose-50 p-4 text-center">
                                <p class="text-sm font-bold text-rose-500">
                                    Registration Closed
                                </p>
                                <p class="mt-1 text-xs text-rose-400">
                                    The registration deadline has passed.
                                </p>
                            </div>
                        @elseif (auth()->check() && auth()->user()->role === 'student')
                            <a href="{{ route('student.opportunities.apply.create', $opportunity->slug) }}"
                                class="mt-7 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#65A9D8] px-5 py-3.5 text-sm font-bold text-white shadow-md shadow-blue-100 transition hover:bg-[#5599C9]">
                                Apply Now

                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 17 17 7M7 7h10v10" stroke-width="1.8" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        @elseif (!auth()->check())
                            <a href="{{ route('login') }}"
                                class="mt-7 inline-flex w-full items-center justify-center rounded-xl bg-[#65A9D8] px-5 py-3.5 text-sm font-bold text-white transition hover:bg-[#5599C9]">
                                Login to Apply
                            </a>
                        @else
                            <div class="mt-7 rounded-xl bg-[#F1F7FC] p-4 text-center">
                                <p class="text-xs font-semibold text-[#7896AE]">
                                    This opportunity is available for Student accounts.
                                </p>
                            </div>
                        @endif

                    </section>


                    {{-- Organizer Card --}}
                    <section class="rounded-3xl border border-[#E2EDF5] bg-white p-6 shadow-sm">

                        <h2 class="text-base font-extrabold text-[#304F6B]">
                            About the Organizer
                        </h2>

                        <div class="mt-5 flex items-center gap-3">

                            @if ($opportunity->organizerProfile?->logo_path)
                                <img src="{{ Storage::disk('s3_public')->url($opportunity->organizerProfile->logo_path) }}"
                                    alt="{{ $organization }}"
                                    class="h-12 w-12 rounded-xl border border-[#E2EDF5] object-cover">
                            @else
                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#EAF5FF] text-lg font-extrabold text-[#5799CE]">
                                    {{ Str::upper(Str::substr($organization, 0, 1)) }}
                                </div>
                            @endif

                            <div class="min-w-0">
                                <p class="truncate text-sm font-bold text-[#304F6B]">
                                    {{ $organization }}
                                </p>

                                <p class="mt-1 text-xs text-[#91A9BC]">
                                    Opportunity Organizer
                                </p>
                            </div>

                        </div>

                        @if ($opportunity->organizerProfile?->description)
                            <p class="mt-4 text-xs leading-6 text-[#8AA4B9]">
                                {{ Str::limit(strip_tags($opportunity->organizerProfile->description), 150) }}
                            </p>
                        @endif

                    </section>


                    {{-- Back Button --}}
                    <a href="{{ route('opportunities.index') }}"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-[#DCEAF5] bg-white px-5 py-3.5 text-sm font-bold text-[#7896AE] transition hover:border-[#65A9D8] hover:text-[#5799CE]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="m15 18-6-6 6-6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        Back to Opportunities
                    </a>

                </aside>

            </div>

        </div>

    </div>

@endsection
