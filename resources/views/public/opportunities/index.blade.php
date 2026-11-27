@extends('layouts.public')

@section('title', 'Explore Opportunities | CareerBridge')

@section('content')

<link rel="stylesheet" href="{{ asset('css/public/opportunities.css') }}">

@php
    $currentCategory = request('category', 'all');
    $searchQuery = request('search', '');
    $currentStatus = request('status', 'all');
    $currentSort = request('sort', 'latest');

    // Warna kategori berdasarkan slug.
    // Ini hanya untuk styling, bukan sumber data kategori.
    $categoryStyles = [
        'scholarship' => [
            'background' => 'bg-amber-50',
            'text' => 'text-amber-500',
            'badge' => 'bg-amber-50 text-amber-600',
        ],
        'internship' => [
            'background' => 'bg-emerald-50',
            'text' => 'text-emerald-500',
            'badge' => 'bg-emerald-50 text-emerald-600',
        ],
        'competition' => [
            'background' => 'bg-purple-50',
            'text' => 'text-purple-500',
            'badge' => 'bg-purple-50 text-purple-600',
        ],
        'training' => [
            'background' => 'bg-sky-50',
            'text' => 'text-sky-500',
            'badge' => 'bg-sky-50 text-sky-600',
        ],
    ];

    $totalOpportunities = collect($categoryCounts)->sum();
@endphp

<div class="min-h-screen bg-[#F8FBFF]">

    <div class="mx-auto max-w-[1440px] px-5 py-8 sm:px-8 lg:px-10">

        {{-- Hero Section --}}
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#DCEEFF] via-[#EAF5FF] to-white p-7 sm:p-10 lg:p-12">

            {{-- Decorations --}}
            <div class="absolute -right-12 -top-16 h-64 w-64 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -bottom-20 left-1/3 h-48 w-48 rounded-full bg-blue-200/40 blur-3xl"></div>

            <div class="relative mx-auto max-w-3xl text-center">

                <span class="inline-flex items-center gap-2 rounded-full border border-sky-200 bg-white/80 px-4 py-2 text-xs font-bold uppercase tracking-wider text-[#478FC2]">
                    <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                    Discover Your Potential
                </span>

                <h1 class="mt-6 text-3xl font-extrabold leading-tight tracking-tight text-[#304F6B] sm:text-4xl lg:text-5xl">
                    Explore Opportunities,
                    <span class="text-[#5799CE]">
                        Shape Your Future.
                    </span>
                </h1>

                <p class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-[#6D8BA4] sm:text-base">
                    Find scholarships, internships, and competitions that match your interests, develop your skills, and help you achieve your ambitions.
                </p>

                {{-- Search Bar --}}
                <form action="{{ route('opportunities.index') }}" method="GET" class="mx-auto mt-8 max-w-2xl">

                    @if ($currentCategory !== 'all')
                        <input type="hidden" name="category" value="{{ $currentCategory }}">
                    @endif

                    @if ($currentStatus !== 'all')
                        <input type="hidden" name="status" value="{{ $currentStatus }}">
                    @endif

                    @if ($currentSort !== 'latest')
                        <input type="hidden" name="sort" value="{{ $currentSort }}">
                    @endif

                    <div class="flex flex-col gap-3 rounded-2xl border border-white/80 bg-white p-2 shadow-lg shadow-blue-100/60 sm:flex-row">

                        <div class="flex flex-1 items-center gap-3 px-3">
                            <svg class="opportunity-search-icon h-5 w-5 shrink-0 text-[#79A9CC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7" stroke-width="2" />
                                <path d="m16 16 4 4" stroke-width="2" stroke-linecap="round" />
                            </svg>

                            <input
                                type="text"
                                name="search"
                                value="{{ $searchQuery }}"
                                placeholder="Search scholarships, internships, competitions..."
                                class="w-full border-0 bg-transparent text-sm text-[#304F6B] outline-none placeholder:text-[#A8BDCF] focus:ring-0"
                            >
                        </div>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#65A9D8] px-7 py-3 text-sm font-bold text-white shadow-md shadow-blue-100 transition hover:bg-[#5599C9]"
                        >
                            Search
                        </button>

                    </div>
                </form>

                {{-- Dynamic Category Labels --}}
                <div class="mt-5 flex flex-wrap items-center justify-center gap-5 text-xs font-semibold text-[#7896AE]">

                    @foreach ($categories as $category)
                        <span class="inline-flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full {{ $categoryStyles[$category->slug]['text'] ?? 'text-[#5799CE]' }} bg-current"></span>
                            {{ $category->name }}
                        </span>
                    @endforeach

                </div>

            </div>
        </section>


        {{-- Category Section --}}
        <section class="mt-10">

            <div class="mb-5">
                <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#65A9D8]">
                    Browse Categories
                </p>

                <h2 class="mt-2 text-2xl font-extrabold text-[#304F6B]">
                    Find What Inspires You
                </h2>

                <p class="mt-2 text-sm text-slate-400">
                    Explore different opportunities based on your interests.
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                {{-- All Opportunities --}}
                @php
                    $isAllActive = $currentCategory === 'all';
                @endphp

                <a
                    href="{{ route('opportunities.index', array_merge(request()->except('page', 'category'), ['category' => 'all'])) }}"
                    class="opportunity-category-card group rounded-2xl border p-5 transition hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-100/60
                    {{ $isAllActive ? 'border-[#65A9D8] bg-[#F0F8FF] shadow-md shadow-blue-100/50' : 'border-[#E2EDF5] bg-white hover:border-sky-200' }}"
                >

                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#E5F1FC]">
                            <svg class="h-6 w-6 text-[#5799CE]" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                <path d="M12 3v18M3 12h18" stroke-width="1.8" stroke-linecap="round" />
                            </svg>
                        </div>

                        @if ($isAllActive)
                            <span class="rounded-full bg-[#DCEEFF] px-3 py-1 text-[10px] font-bold text-[#478FC2]">
                                Selected
                            </span>
                        @else
                            <svg class="opportunity-arrow h-5 w-5 text-[#A8BDCF]" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        @endif
                    </div>

                    <h3 class="mt-4 text-base font-extrabold text-[#304F6B]">
                        All Opportunities
                    </h3>

                    <p class="mt-1 text-xs leading-5 text-slate-400">
                        Explore every available opportunity.
                    </p>

                    <p class="mt-3 text-xs font-bold text-[#5799CE]">
                        {{ $totalOpportunities }} Opportunities
                    </p>

                </a>


                {{-- Dynamic Categories --}}
                @foreach ($categories as $category)

                    @php
                        $slug = $category->slug;
                        $isActive = $currentCategory === $slug;

                        $style = $categoryStyles[$slug] ?? [
                            'background' => 'bg-[#E5F1FC]',
                            'text' => 'text-[#5799CE]',
                            'badge' => 'bg-[#E5F1FC] text-[#5799CE]',
                        ];

                        $categoryDescription = $category->description
                            ?: 'Explore opportunities in this category.';

                        $categoryCount = $categoryCounts[$slug] ?? 0;
                    @endphp

                    <a
                        href="{{ route('opportunities.index', array_merge(request()->except('page'), ['category' => $slug])) }}"
                        class="opportunity-category-card group rounded-2xl border p-5 transition hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-100/60
                        {{ $isActive ? 'border-[#65A9D8] bg-[#F0F8FF] shadow-md shadow-blue-100/50' : 'border-[#E2EDF5] bg-white hover:border-sky-200' }}"
                    >

                        <div class="flex items-center justify-between">

                            <div class="opportunity-category-icon flex h-12 w-12 items-center justify-center rounded-xl {{ $style['background'] }}">

                                @if ($slug === 'scholarship')

                                    <svg class="h-6 w-6 {{ $style['text'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                        <path d="m2 10 10-6 10 6-10 6-10-6Z M6 12.5V16l6 4 6-4v-3.5M22 10v6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                @elseif ($slug === 'internship')

                                    <svg class="h-6 w-6 {{ $style['text'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                        <rect x="3" y="7" width="18" height="14" rx="2" stroke-width="1.8" />
                                        <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18" stroke-width="1.8" stroke-linecap="round" />
                                    </svg>

                                @elseif ($slug === 'competition')

                                    <svg class="h-6 w-6 {{ $style['text'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                        <path d="M8 21h8m-4-4v4M7 4h10v5a5 5 0 0 1-10 0V4ZM7 6H4v2a4 4 0 0 0 4 4m9-6h3v2a4 4 0 0 1-4 4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                @else

                                    <svg class="h-6 w-6 {{ $style['text'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                @endif

                            </div>

                            @if ($isActive)
                                <span class="rounded-full bg-[#DCEEFF] px-3 py-1 text-[10px] font-bold text-[#478FC2]">
                                    Selected
                                </span>
                            @else
                                <svg class="opportunity-arrow h-5 w-5 text-[#A8BDCF]" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                    <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @endif

                        </div>

                        <h3 class="mt-4 text-base font-extrabold text-[#304F6B]">
                            {{ $category->name }}
                        </h3>

                        <p class="mt-1 text-xs leading-5 text-slate-400">
                            {{ $categoryDescription }}
                        </p>

                        <p class="mt-3 text-xs font-bold text-[#5799CE]">
                            {{ $categoryCount }} Available
                        </p>

                    </a>

                @endforeach

            </div>
        </section>


        {{-- Opportunity Listing --}}
        <section class="mt-12">

            {{-- Section Header --}}
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">

                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#65A9D8]">
                        Opportunity Directory
                    </p>

                    <h2 class="mt-2 text-2xl font-extrabold text-[#304F6B]">
                        Latest Opportunities
                    </h2>

                    <p class="mt-2 text-sm text-slate-400">
                        Discover opportunities and take the next step toward your goals.
                    </p>
                </div>

                <span class="inline-flex w-fit items-center gap-2 rounded-full bg-white px-4 py-2 text-xs font-bold text-[#478FC2] shadow-sm ring-1 ring-[#E2EDF5]">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    {{ $opportunities->total() }} Results Found
                </span>

            </div>


            {{-- Filters and Sorting --}}
            <form
                action="{{ route('opportunities.index') }}"
                method="GET"
                class="mt-6 flex flex-col gap-3 rounded-2xl border border-[#E2EDF5] bg-white p-4 sm:flex-row sm:items-center sm:justify-between"
            >

                <input type="hidden" name="category" value="{{ $currentCategory }}">
                <input type="hidden" name="search" value="{{ $searchQuery }}">

                <div class="flex flex-wrap items-center gap-2">

                    <span class="mr-1 text-xs font-bold text-[#7896AE]">
                        Filter by:
                    </span>

                    <select
                        name="status"
                        onchange="this.form.submit()"
                        class="rounded-xl border border-[#E2EDF5] bg-[#F8FBFF] px-4 py-2.5 text-xs font-semibold text-[#52718D] outline-none focus:border-[#65A9D8] focus:ring-2 focus:ring-sky-100"
                    >
                        <option value="all" {{ $currentStatus === 'all' ? 'selected' : '' }}>
                            All Status
                        </option>

                        <option value="open" {{ $currentStatus === 'open' ? 'selected' : '' }}>
                            Open
                        </option>

                        <option value="closed" {{ $currentStatus === 'closed' ? 'selected' : '' }}>
                            Closed
                        </option>
                    </select>

                    @if ($currentCategory !== 'all' || $searchQuery !== '' || $currentStatus !== 'all' || $currentSort !== 'latest')

                        <a
                            href="{{ route('opportunities.index') }}"
                            class="rounded-xl px-3 py-2.5 text-xs font-bold text-rose-400 transition hover:bg-rose-50"
                        >
                            Clear Filters
                        </a>

                    @endif

                </div>

                <div class="flex items-center gap-2">

                    <label for="sort" class="whitespace-nowrap text-xs font-semibold text-[#7896AE]">
                        Sort by:
                    </label>

                    <select
                        id="sort"
                        name="sort"
                        onchange="this.form.submit()"
                        class="w-full rounded-xl border border-[#E2EDF5] bg-[#F8FBFF] px-4 py-2.5 text-xs font-semibold text-[#52718D] outline-none focus:border-[#65A9D8] focus:ring-2 focus:ring-sky-100 sm:w-auto"
                    >
                        <option value="latest" {{ $currentSort === 'latest' ? 'selected' : '' }}>
                            Latest
                        </option>

                        <option value="deadline" {{ $currentSort === 'deadline' ? 'selected' : '' }}>
                            Closing Soon
                        </option>

                        <option value="title" {{ $currentSort === 'title' ? 'selected' : '' }}>
                            Alphabetical
                        </option>
                    </select>

                </div>

            </form>


            {{-- Opportunity Cards --}}
            <div class="mt-6 grid gap-5 md:grid-cols-2 xl:grid-cols-3">

                @forelse ($opportunities as $opportunity)

                    @php
                        $category = $opportunity->category ?? 'other';

                        $categoryData = $categories->firstWhere('slug', $category);

                        $categoryLabel = $categoryData?->name ?? ucfirst($category);

                        $categoryStyle = $categoryStyles[$category] ?? [
                            'background' => 'bg-slate-100',
                            'text' => 'text-slate-500',
                            'badge' => 'bg-slate-100 text-slate-600',
                        ];

                        $organization = $opportunity->organizerProfile?->organization_name
                            ?? 'Independent Organizer';

                        $deadline = $opportunity->registration_deadline;

                        $isClosed = $deadline
                            ? \Carbon\Carbon::parse($deadline)->startOfDay()->lt(now()->startOfDay())
                            : false;

                        $status = $isClosed ? 'closed' : 'open';

                        $description = $opportunity->description
                            ?: 'Discover this opportunity and learn more about its requirements and benefits.';

                        $skills = $opportunity->opportunitySkills
                            ->map(fn ($item) => $item->skill?->name ?? $item->skill?->skill_name)
                            ->filter()
                            ->take(3);

                        $opportunityType = $opportunity->opportunityType?->name;

                        $detailUrl = route('opportunities.show', $opportunity->slug);
                    @endphp

                    <article class="opportunity-card group flex flex-col overflow-hidden rounded-2xl border border-[#E2EDF5] bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-xl hover:shadow-blue-100/50">

                        {{-- Card Top --}}
                        <div class="border-b border-[#F0F5F9] bg-gradient-to-r from-[#F4F9FF] to-white p-5">

                            <div class="flex items-start justify-between gap-3">

                                <div class="opportunity-card-icon flex h-12 w-12 items-center justify-center rounded-xl {{ $categoryStyle['background'] }}">

                                    @if ($category === 'scholarship')

                                        <svg class="h-6 w-6 {{ $categoryStyle['text'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                            <path d="m2 10 10-6 10 6-10 6-10-6Z M6 12.5V16l6 4 6-4v-3.5M22 10v6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    @elseif ($category === 'internship')

                                        <svg class="h-6 w-6 {{ $categoryStyle['text'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                            <rect x="3" y="7" width="18" height="14" rx="2" stroke-width="1.8" />
                                            <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18" stroke-width="1.8" stroke-linecap="round" />
                                        </svg>

                                    @elseif ($category === 'competition')

                                        <svg class="h-6 w-6 {{ $categoryStyle['text'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                            <path d="M8 21h8m-4-4v4M7 4h10v5a5 5 0 0 1-10 0V4ZM7 6H4v2a4 4 0 0 0 4 4m9-6h3v2a4 4 0 0 1-4 4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    @else

                                        <svg class="h-6 w-6 {{ $categoryStyle['text'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    @endif

                                </div>

                                <span class="rounded-full px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider {{ $status === 'open' ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-500' }}">
                                    {{ $status === 'open' ? '● Open' : '● Closed' }}
                                </span>

                            </div>

                            <div class="mt-4 flex flex-wrap items-center gap-2">

                                <span class="rounded-full px-3 py-1 text-[10px] font-bold {{ $categoryStyle['badge'] }}">
                                    {{ $categoryLabel }}
                                </span>

                                @if ($opportunityType)
                                    <span class="rounded-full bg-[#F1F6FA] px-3 py-1 text-[10px] font-semibold text-[#7896AE]">
                                        {{ $opportunityType }}
                                    </span>
                                @endif

                            </div>

                            <h3 class="mt-3 text-lg font-extrabold leading-snug text-[#304F6B] transition group-hover:text-[#5799CE]">
                                {{ $opportunity->title }}
                            </h3>

                            <p class="mt-1 text-xs font-semibold text-[#8AA4B9]">
                                {{ $organization }}
                            </p>

                        </div>


                        {{-- Card Content --}}
                        <div class="flex flex-1 flex-col p-5">

                            <p class="text-sm leading-6 text-slate-400">
                                {{ \Illuminate\Support\Str::limit(strip_tags($description), 125) }}
                            </p>

                            {{-- Skills --}}
                            @if ($skills->isNotEmpty())

                                <div class="mt-4 flex flex-wrap gap-2">

                                    @foreach ($skills as $skill)
                                        <span class="rounded-lg bg-[#F1F7FC] px-2.5 py-1.5 text-[10px] font-semibold text-[#7394AF]">
                                            {{ $skill }}
                                        </span>
                                    @endforeach

                                </div>

                            @endif

                            <div class="mt-5 space-y-3 border-t border-[#EEF3F7] pt-4">

                                {{-- Deadline --}}
                                <div class="flex items-center justify-between gap-3 text-xs">

                                    <span class="flex items-center gap-2 text-[#91A9BC]">
                                        <svg class="opportunity-meta-icon h-4 w-4 text-[#65A9D8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 0 1 1 1v14H4V6a1 1 0 0 1 1-1Z" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Application Deadline
                                    </span>

                                    <span class="font-bold text-[#52718D]">
                                        {{ $deadline ? \Carbon\Carbon::parse($deadline)->format('d M Y') : 'Not specified' }}
                                    </span>

                                </div>

                                {{-- Location --}}
                                @if ($opportunity->location)

                                    <div class="flex items-center justify-between gap-3 text-xs">

                                        <span class="flex items-center gap-2 text-[#91A9BC]">
                                            <svg class="opportunity-meta-icon h-4 w-4 text-[#65A9D8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" stroke-width="1.7" />
                                                <circle cx="12" cy="10" r="2.5" stroke-width="1.7" />
                                            </svg>
                                            Location
                                        </span>

                                        <span class="font-bold text-[#52718D]">
                                            {{ $opportunity->location }}
                                        </span>

                                    </div>

                                @endif

                            </div>

                            <a
                                href="{{ $detailUrl }}"
                                class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#EAF5FF] px-4 py-3 text-xs font-bold text-[#478FC2] transition hover:bg-[#65A9D8] hover:text-white"
                            >
                                View Opportunity Details

                                <svg class="opportunity-arrow h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                    <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>

                        </div>

                    </article>

                @empty

                    {{-- Empty State --}}
                    <div class="col-span-full rounded-3xl border border-dashed border-[#C9E0F2] bg-white px-6 py-16 text-center">

                        <div class="opportunity-empty-icon mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-[#EAF5FF] text-[#5799CE]">
                            <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                <circle cx="10.8" cy="10.8" r="6.8" stroke-width="1.8" />
                                <path d="m16 16 4.5 4.5M8.5 10.8h4.6" stroke-width="1.8" stroke-linecap="round" />
                            </svg>
                        </div>

                        <h3 class="mt-5 text-xl font-extrabold text-[#304F6B]">
                            No Opportunities Found
                        </h3>

                        <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-400">
                            We couldn't find any opportunities matching your search. Try adjusting your filters or exploring other categories.
                        </p>

                        <a
                            href="{{ route('opportunities.index') }}"
                            class="mt-6 inline-flex items-center gap-2 rounded-xl bg-[#65A9D8] px-6 py-3 text-sm font-bold text-white transition hover:bg-[#5599C9]"
                        >
                            Explore All Opportunities

                            <svg class="opportunity-arrow h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                    </div>

                @endforelse

            </div>


            {{-- Pagination --}}
            @if ($opportunities->hasPages())

                <div class="mt-8">
                    {{ $opportunities->links() }}
                </div>

            @endif

        </section>


        {{-- Bottom CTA --}}
        <section class="relative mt-12 overflow-hidden rounded-3xl bg-gradient-to-r from-[#65A9D8] to-[#46C6D4] p-7 shadow-lg shadow-blue-100 sm:p-10">

            <div class="absolute -right-10 -top-16 h-48 w-48 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-20 right-1/3 h-40 w-40 rounded-full bg-white/10"></div>

            <div class="relative flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">

                <div class="max-w-2xl">

                    <span class="text-xs font-bold uppercase tracking-widest text-white/80">
                        Your Next Chapter Starts Here
                    </span>

                    <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">
                        Ready to Discover Your Potential?
                    </h2>

                    <p class="mt-3 text-sm leading-7 text-white/85">
                        Take the next step in your academic and professional journey. Explore opportunities and turn your ambitions into achievements.
                    </p>

                </div>

                <a
                    href="{{ route('opportunities.index') }}"
                    class="inline-flex shrink-0 items-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-bold text-[#478FC2] shadow-lg transition hover:-translate-y-0.5 hover:bg-[#F2F8FD]"
                >
                    Start Your Journey

                    <svg class="opportunity-arrow h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                        <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

            </div>

        </section>

    </div>

</div>

@endsection
