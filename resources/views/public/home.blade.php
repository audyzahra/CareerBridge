@extends('layouts.public')

@section('title', 'Home | CareerBridge')

@section('content')

<link rel="stylesheet" href="{{ asset('css/public/home.css') }}">

<div class="mx-auto max-w-[1440px] px-5 py-6 sm:px-8 lg:px-10">

    {{-- Hero Section --}}
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#DCEEFF] via-[#EAF5FF] to-white p-7 sm:p-10 lg:p-12">

        {{-- Decoration --}}
        <div class="absolute -right-10 -top-10 h-48 w-48 rounded-full bg-sky-200/40 blur-3xl"></div>
        <div class="absolute -bottom-16 right-1/3 h-40 w-40 rounded-full bg-blue-200/40 blur-3xl"></div>

        <div class="relative grid items-center gap-10 lg:grid-cols-2">

            {{-- Hero Text --}}
            <div>
                <span class="inline-flex items-center gap-2 rounded-full border border-sky-200 bg-white/80 px-4 py-2 text-xs font-bold text-[#478FC2]">
                    <span class="cb-pulse h-2 w-2 rounded-full bg-sky-400"></span>
                    STUDENT DEVELOPMENT PLATFORM
                </span>

                <h1 class="mt-6 text-3xl font-extrabold leading-tight tracking-tight text-[#304F6B] sm:text-4xl lg:text-5xl">
                    Discover Opportunities,
                    <br>
                    <span class="text-[#5799CE]">
                        Build Your Future.
                    </span>
                </h1>

                <p class="mt-5 max-w-xl text-sm leading-7 text-[#6D8BA4] sm:text-base">
                    CareerBridge helps students discover various academic and professional development opportunities, including scholarships, internship programs, and competitions.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">

                    <a href="{{ route('opportunities.index') }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-[#65A9D8] px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-200 transition hover:-translate-y-0.5 hover:bg-[#5599C9]">

                        Explore Opportunities

                        <svg class="cb-icon-arrow h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>

                    <a href="{{ route('about') }}"
                       class="inline-flex items-center rounded-xl border border-[#C9E0F2] bg-white px-6 py-3.5 text-sm font-bold text-[#478FC2] transition hover:bg-[#F2F8FD]">
                        About CareerBridge
                    </a>

                </div>
            </div>

            {{-- Hero Illustration --}}
            <div class="relative mx-auto w-full max-w-md">
                <div class="rounded-[2rem] border border-white/80 bg-white/70 p-5 shadow-xl shadow-blue-100/70 backdrop-blur-sm">

                    <div class="rounded-2xl bg-gradient-to-br from-[#DCEEFF] to-[#EEF7FF] p-8 text-center">

                        <div class="cb-float mx-auto flex h-36 w-36 items-center justify-center rounded-full bg-white shadow-lg">

                            <svg viewBox="0 0 120 120" class="h-24 w-24" fill="none" aria-hidden="true">
                                <defs>
                                    <linearGradient id="heroCapGradient" x1="15" y1="20" x2="105" y2="85" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#38BDF8"/>
                                        <stop offset="1" stop-color="#22D3EE"/>
                                    </linearGradient>
                                </defs>

                                <path d="M15 42L60 20L105 42L60 64L15 42Z" fill="url(#heroCapGradient)"/>
                                <path d="M29 50V70C29 70 42 83 60 83C78 83 91 70 91 70V50L60 65L29 50Z" fill="#5799CE"/>
                                <path d="M105 42V70" stroke="#397DAE" stroke-width="4" stroke-linecap="round"/>
                                <circle cx="105" cy="76" r="5" fill="#397DAE"/>
                                <path d="M45 94H75" stroke="#65B5E8" stroke-width="5" stroke-linecap="round"/>
                            </svg>

                        </div>

                        <h2 class="mt-6 text-xl font-extrabold text-[#304F6B]">
                            Your Future Starts Here
                        </h2>

                        <p class="mt-2 text-xs leading-6 text-[#7896AE]">
                            Small steps today, greater opportunities tomorrow.
                        </p>

                    </div>

                    <div class="mt-4 flex items-center gap-3 rounded-xl bg-white p-4 shadow-sm">

                        <div class="cb-category-icon flex h-11 w-11 items-center justify-center rounded-xl bg-[#E5F1FC] text-[#5799CE]">

                            <svg class="cb-shine h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="m12 3 1.9 5.8L20 11l-6.1 2.2L12 19l-1.9-5.8L4 11l6.1-2.2L12 3Z" stroke-width="1.7" stroke-linejoin="round"/>
                                <path d="m19 15 .9 2.1L22 18l-2.1.9L19 21l-.9-2.1L16 18l2.1-.9L19 15Z" stroke-width="1.5" stroke-linejoin="round"/>
                            </svg>

                        </div>

                        <div>
                            <p class="text-sm font-bold text-[#304F6B]">
                                Endless Opportunities Await
                            </p>

                            <p class="mt-1 text-xs text-[#91A9BC]">
                                Start exploring today.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>


    {{-- Opportunity Categories --}}
    <section class="mt-10">

        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-end">

            <div>
                <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#65A9D8]">
                    Explore Opportunities
                </p>

                <h2 class="mt-2 text-2xl font-extrabold text-[#304F6B]">
                    Find Your Next Opportunity
                </h2>

                <p class="mt-2 text-sm text-slate-400">
                    Choose an opportunity category that matches your goals.
                </p>
            </div>

            <a href="{{ route('opportunities.index') }}"
               class="group inline-flex items-center gap-2 text-sm font-bold text-[#5799CE] transition hover:text-[#397DAE]">

                View All Opportunities

                <svg class="cb-icon-arrow h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

        </div>

        <div class="mt-6 grid gap-5 md:grid-cols-3">

            {{-- Scholarships --}}
            <a href="{{ route('opportunities.index', ['category' => 'beasiswa']) }}"
               class="group rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-lg hover:shadow-blue-100/60">

                <div class="cb-category-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-amber-500">

                    <svg class="h-7 w-7 transition-transform duration-300 group-hover:rotate-[-8deg]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M22 10L12 4 2 10l10 6 10-6Z" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 12.5V16l6 4 6-4v-3.5M22 10v6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-extrabold text-[#304F6B]">
                    Scholarships
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-400">
                    Discover educational funding opportunities to support your academic journey.
                </p>

                <span class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#5799CE] group-hover:text-[#397DAE]">
                    Explore Scholarships

                    <svg class="cb-icon-arrow h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>

            </a>


            {{-- Internships --}}
            <a href="{{ route('opportunities.index', ['category' => 'magang']) }}"
               class="group rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-lg hover:shadow-blue-100/60">

                <div class="cb-category-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-500">

                    <svg class="h-7 w-7 transition-transform duration-300 group-hover:-rotate-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <rect x="3" y="7" width="18" height="14" rx="2" stroke-width="1.8"/>
                        <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18M10 12v2h4v-2" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-extrabold text-[#304F6B]">
                    Internships
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-400">
                    Gain work experience and explore the professional world.
                </p>

                <span class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#5799CE] group-hover:text-[#397DAE]">
                    Explore Internships

                    <svg class="cb-icon-arrow h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>

            </a>


            {{-- Competitions --}}
            <a href="{{ route('opportunities.index', ['category' => 'kompetisi']) }}"
               class="group rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-lg hover:shadow-blue-100/60">

                <div class="cb-category-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-50 text-purple-500">

                    <svg class="h-7 w-7 transition-transform duration-300 group-hover:rotate-6 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8 21h8m-4-4v4M7 4h10v5a5 5 0 0 1-10 0V4Z" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 6H4v2a4 4 0 0 0 4 4m9-6h3v2a4 4 0 0 1-4 4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-extrabold text-[#304F6B]">
                    Competitions
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-400">
                    Enhance your skills, unleash your creativity, and achieve new milestones.
                </p>

                <span class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#5799CE] group-hover:text-[#397DAE]">
                    Explore Competitions

                    <svg class="cb-icon-arrow h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>

            </a>

        </div>
    </section>


    {{-- About CareerBridge --}}
    <section class="mt-10 rounded-2xl border border-[#DCEAF5] bg-white p-7 sm:p-9">

        <div class="grid items-center gap-6 md:grid-cols-[1fr_auto]">

            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-[#65A9D8]">
                    CareerBridge
                </span>

                <h2 class="mt-3 text-xl font-extrabold text-[#304F6B] sm:text-2xl">
                    One Platform, Endless Opportunities.
                </h2>

                <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-400">
                    CareerBridge helps students discover academic and professional development opportunities all in one platform.
                    Start your journey and find the opportunities that are right for you.
                </p>
            </div>

            <a href="{{ route('opportunities.index') }}"
               class="group inline-flex items-center justify-center gap-2 rounded-xl bg-[#E5F1FC] px-6 py-3 text-sm font-bold text-[#478FC2] transition hover:bg-[#DCEEFF]">

                Find Opportunities

                <svg class="cb-icon-arrow h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

        </div>
    </section>

</div>

@endsection
