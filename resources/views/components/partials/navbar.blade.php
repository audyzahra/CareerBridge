@php
    $variant = $variant ?? 'public';

    $isStudent = auth()->check()
        && auth()->user()->role === 'student';

    $isDashboard = $variant === 'dashboard' && ! $isStudent;
@endphp

<header class="sticky top-0 z-40 w-full border-b border-[#DCEAF5] bg-gradient-to-br from-[#EAF5FF] via-[#F2F8FD] to-white">
    <div class="mx-auto flex h-[72px] max-w-[1440px] items-center justify-between px-5 sm:px-8 lg:px-10">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex shrink-0 items-center gap-2.5">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#65B5E8] to-[#5799CE] text-xl font-extrabold text-white shadow-sm">
                C
            </div>

            <span class="text-xl font-extrabold tracking-tight text-slate-800">
                Career<span class="text-[#65A9D8]">Bridge</span>
            </span>
        </a>

        {{-- ========================================== --}}
        {{-- ADMIN AND ORGANIZER DASHBOARD NAVBAR       --}}
        {{-- ========================================== --}}
        @if ($isDashboard)

            <div class="flex items-center gap-3 sm:gap-5">

                <button type="button"
                    class="relative flex h-10 w-10 items-center justify-center rounded-xl text-slate-500 transition hover:bg-sky-50 hover:text-sky-500"
                    aria-label="Notifications">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 00-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0m6 0H9"/>
                    </svg>

                    <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-cyan-400 ring-2 ring-white"></span>
                </button>

                <div class="hidden h-8 w-px bg-slate-200 sm:block"></div>

                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-sky-100 font-bold text-sky-600">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>

                    <div class="hidden text-left sm:block">
                        <p class="text-sm font-bold text-slate-800">
                            {{ auth()->user()->name ?? 'User' }}
                        </p>

                        <p class="text-xs text-slate-400">
                            {{ ucfirst(auth()->user()->role ?? 'User') }}
                        </p>
                    </div>
                </div>

            </div>

        {{-- ========================================== --}}
        {{-- STUDENT NAVBAR                             --}}
        {{-- ========================================== --}}

        {{-- ========================================== --}}
        {{-- STUDENT NAVBAR                             --}}
        {{-- ========================================== --}}
        @elseif ($isStudent)

            {{-- Desktop Navigation --}}
            <nav class="hidden items-center gap-8 md:flex">

                <a href="{{ route('student.home') }}"
                    class="text-sm font-semibold transition
                    {{ request()->routeIs('student.home') ? 'text-[#478FC2]' : 'text-slate-600 hover:text-[#478FC2]' }}">
                    Home
                </a>

                <a href="{{ route('student.opportunities') }}"
                    class="text-sm font-medium transition
                    {{ request()->routeIs('student.opportunities') ? 'text-[#478FC2]' : 'text-slate-600 hover:text-[#478FC2]' }}">
                    Explore Opportunities
                </a>

                <a href="{{ route('about') }}"
                    class="text-sm font-medium transition
                    {{ request()->routeIs('about') ? 'text-[#478FC2]' : 'text-slate-600 hover:text-[#478FC2]' }}">
                    About Us
                </a>

            </nav>

            {{-- Student Menu Dropdown --}}
            <details class="group relative">

                {{-- Hamburger Button --}}
                <summary
                    class="flex h-11 w-11 cursor-pointer list-none items-center justify-center rounded-xl border border-[#DCEAF5] bg-[#F2F8FD] text-[#477FA8] transition hover:bg-[#E5F1FC] [&::-webkit-details-marker]:hidden"
                    aria-label="Open student menu">

                    {{-- Menu Icon --}}
                    <svg class="h-6 w-6 group-open:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    {{-- Close Icon --}}
                    <svg class="hidden h-6 w-6 group-open:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                </summary>

                {{-- Dropdown Panel --}}
                <div class="absolute right-0 top-14 z-50 w-[310px] overflow-hidden rounded-2xl border border-[#DCEAF5] bg-white shadow-xl shadow-slate-200/60">

                    {{-- Student Information --}}
                    <div class="bg-gradient-to-r from-[#DCEEFF] to-[#EDF6FC] p-5">

                        <div class="flex items-center gap-3">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-[#65B5E8] to-[#5799CE] text-lg font-extrabold text-white shadow-sm">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                            </div>

                            <div class="min-w-0">
                                <p class="truncate text-sm font-bold text-[#304F6B]">
                                    {{ auth()->user()->name }}
                                </p>

                                <p class="truncate text-xs text-[#6D8BA4]">
                                    {{ auth()->user()->email }}
                                </p>

                                <span class="mt-1 inline-block rounded-full bg-white/80 px-2.5 py-1 text-[10px] font-bold text-[#478FC2]">
                                    Student
                                </span>
                            </div>

                        </div>

                    </div>

                    {{-- Student Menu --}}
                    <div class="p-2">

                        {{-- Home --}}
                        <a href="{{ route('student.home') }}"
                            class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                            {{ request()->routeIs('student.home') ? 'bg-[#F0F7FC] text-[#397DAE]' : 'text-slate-600 hover:bg-[#F0F7FC] hover:text-[#397DAE]' }}">

                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-6v-7h-4v7H4a1 1 0 0 1-1-1V10Z"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Home
                        </a>

                        {{-- Explore Opportunities --}}
                        <a href="{{ route('student.opportunities') }}"
                            class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                            {{ request()->routeIs('student.opportunities') ? 'bg-[#F0F7FC] text-[#397DAE]' : 'text-slate-600 hover:bg-[#F0F7FC] hover:text-[#397DAE]' }}">

                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="m12 3 2.2 6.8L21 12l-6.8 2.2L12 21l-2.2-6.8L3 12l6.8-2.2L12 3Z"
                                    stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Explore Opportunities
                        </a>

                        {{-- Saved Opportunities --}}
                        <a href="{{ route('student.saved') }}"
                            class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                            {{ request()->routeIs('student.saved') ? 'bg-[#F0F7FC] text-[#397DAE]' : 'text-slate-600 hover:bg-[#F0F7FC] hover:text-[#397DAE]' }}">

                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M20.8 8.8c0 5.2-8.8 10.2-8.8 10.2S3.2 14 3.2 8.8A4.8 4.8 0 0 1 12 6.1a4.8 4.8 0 0 1 8.8 2.7Z"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Saved Opportunities
                        </a>

                        {{-- My Applications --}}
                        <a href="{{ route('student.applications') }}"
                            class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                            {{ request()->routeIs('student.applications') ? 'bg-[#F0F7FC] text-[#397DAE]' : 'text-slate-600 hover:bg-[#F0F7FC] hover:text-[#397DAE]' }}">

                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M7 3h7l5 5v13H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 3v5h5M9 13h6M9 17h6"
                                    stroke-width="1.8" stroke-linecap="round"/>
                            </svg>

                            My Applications
                        </a>

                        {{-- Notifications --}}
                        <a href="{{ route('student.notifications') }}"
                            class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                            {{ request()->routeIs('student.notifications') ? 'bg-[#F0F7FC] text-[#397DAE]' : 'text-slate-600 hover:bg-[#F0F7FC] hover:text-[#397DAE]' }}">

                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9Z"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 21h4" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>

                            Notifications
                        </a>

                        {{-- My Profile --}}
                        <a href="{{ route('student.profile') }}"
                            class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                            {{ request()->routeIs('student.profile') ? 'bg-[#F0F7FC] text-[#397DAE]' : 'text-slate-600 hover:bg-[#F0F7FC] hover:text-[#397DAE]' }}">

                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" stroke-width="1.8"/>
                                <path d="M4 21a8 8 0 0 1 16 0"
                                    stroke-width="1.8" stroke-linecap="round"/>
                            </svg>

                            My Profile
                        </a>

                    </div>

                    {{-- Logout --}}
                    <div class="border-t border-slate-100 p-2">

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-rose-500 transition hover:bg-rose-50">

                                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M10 17l5-5-5-5m5 5H3m9-9h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                Log Out

                            </button>
                        </form>

                    </div>

                </div>

            </details>


        {{-- ========================================== --}}
        {{-- GUEST NAVBAR                               --}}
        {{-- ========================================== --}}
        @else

            <nav class="hidden items-center gap-8 md:flex">

                <a href="{{ url('/') }}"
                    class="text-sm font-semibold text-[#478FC2] transition hover:text-[#397DAE]">
                    Home
                </a>

                <a href="{{ url('/opportunities') }}"
                    class="text-sm font-medium text-slate-600 transition hover:text-[#478FC2]">
                    Opportunities
                </a>

                <a href="{{ url('/about') }}"
                    class="text-sm font-medium text-slate-600 transition hover:text-[#478FC2]">
                    About Us
                </a>

            </nav>

            <div class="flex items-center gap-2.5">

                <a href="{{ url('/login') }}"
                    class="hidden rounded-xl px-5 py-2.5 text-sm font-bold text-[#478FC2] transition hover:bg-[#F0F7FC] sm:inline-flex">
                    Log In
                </a>

                <a href="{{ url('/register') }}"
                    class="inline-flex items-center rounded-xl bg-[#65A9D8] px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#5599C9]">
                    Sign Up
                </a>

            </div>

        @endif

    </div>
</header>
