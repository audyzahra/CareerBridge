
@extends('layouts.app')

@section('body')

@php
    $savedOpportunities = [
        [
            'id' => 1,
            'title' => 'Google Career Certificates Scholarship',
            'organization' => 'Google Indonesia',
            'category' => 'Scholarship',
            'description' => 'An opportunity to develop professional skills through Google Career Certificates programs. Learn in-demand skills and prepare yourself for a career in the technology industry.',
            'location' => 'Online',
            'type' => 'Remote',
            'deadline' => '2026-12-20',
            'benefits' => [
                'Free access to selected Google Career Certificates',
                'Industry-recognized certificate',
                'Flexible online learning',
            ],
            'requirements' => [
                'Currently enrolled university student or recent graduate',
                'Interested in developing professional skills',
                'Willing to complete the selected learning program',
            ],
            'initials' => 'G',
            'color' => 'bg-blue-100 text-blue-700',
        ],
        [
            'id' => 2,
            'title' => 'Frontend Developer Internship',
            'organization' => 'TechNova Indonesia',
            'category' => 'Internship',
            'description' => 'Join our frontend development team and gain practical experience building modern and responsive web applications using current frontend technologies.',
            'location' => 'Jakarta, Indonesia',
            'type' => 'Hybrid',
            'deadline' => '2026-12-15',
            'benefits' => [
                'Hands-on development experience',
                'Mentorship from experienced developers',
                'Internship certificate',
            ],
            'requirements' => [
                'Basic knowledge of HTML, CSS, and JavaScript',
                'Familiarity with frontend frameworks is a plus',
                'Currently studying in a related field',
            ],
            'initials' => 'TN',
            'color' => 'bg-cyan-100 text-cyan-700',
        ],
        [
            'id' => 3,
            'title' => 'National Business Plan Competition',
            'organization' => 'Young Entrepreneur Network',
            'category' => 'Competition',
            'description' => 'A national competition that challenges university students to develop innovative and sustainable business ideas with real-world impact.',
            'location' => 'Online',
            'type' => 'Online',
            'deadline' => '2026-12-10',
            'benefits' => [
                'Cash prizes for selected winners',
                'Business mentoring sessions',
                'Networking opportunities',
            ],
            'requirements' => [
                'Active university student',
                'Submit an original business plan',
                'Follow the competition guidelines',
            ],
            'initials' => 'YE',
            'color' => 'bg-orange-100 text-orange-700',
        ],
        [
            'id' => 4,
            'title' => 'UI/UX Design Bootcamp',
            'organization' => 'Creative Digital Academy',
            'category' => 'Training',
            'description' => 'Improve your UI/UX design skills through practical learning sessions covering user research, wireframing, prototyping, and design fundamentals.',
            'location' => 'Online',
            'type' => 'Remote',
            'deadline' => '2026-12-25',
            'benefits' => [
                'Practical design projects',
                'Professional mentor guidance',
                'Certificate of completion',
            ],
            'requirements' => [
                'Interested in UI/UX design',
                'Basic computer skills',
                'Commitment to attend learning sessions',
            ],
            'initials' => 'CA',
            'color' => 'bg-purple-100 text-purple-700',
        ],
    ];
@endphp

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<div
    x-data="{
        opportunities: @js($savedOpportunities),
        search: '',
        category: 'All',
        selectedOpportunity: null,

        get filteredOpportunities() {
            return this.opportunities.filter(item => {
                const keyword = this.search.toLowerCase();

                const matchesSearch =
                    item.title.toLowerCase().includes(keyword) ||
                    item.organization.toLowerCase().includes(keyword);

                const matchesCategory =
                    this.category === 'All' ||
                    item.category === this.category;

                return matchesSearch && matchesCategory;
            });
        },

        removeOpportunity(id) {
            this.opportunities = this.opportunities.filter(item => item.id !== id);
            this.selectedOpportunity = null;
        }
    }"
    @keydown.escape.window="selectedOpportunity = null"
    class="min-h-screen bg-slate-50"
>
    <div class="mx-auto max-w-7xl px-5 py-10 sm:px-8 lg:px-10">

        {{-- Page Header --}}
        <div class="mb-8">
            <div class="mb-3 flex items-center gap-2 text-sm font-medium text-blue-600">
                <a href="{{ route('student.home') }}" class="hover:text-blue-800">Home</a>
                <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6"/>
                </svg>
                <span class="text-slate-500">Saved Opportunities</span>
            </div>

            <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Saved Opportunities
                    </h1>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base">
                        Keep track of opportunities you're interested in and explore them whenever you're ready.
                    </p>
                </div>

                <a
                    href="{{ route('student.opportunities') }}"
                    class="inline-flex items-center justify-center gap-2 self-start rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"/>
                    </svg>
                    Explore Opportunities
                </a>
            </div>
        </div>

        {{-- Summary --}}
        <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Saved</p>
                        <p class="mt-2 text-3xl font-bold text-slate-900" x-text="opportunities.length"></p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 5.5A2.5 2.5 0 0 1 7.5 3h9A2.5 2.5 0 0 1 19 5.5V21l-7-4-7 4V5.5Z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Scholarships</p>
                        <p class="mt-2 text-3xl font-bold text-slate-900"
                           x-text="opportunities.filter(item => item.category === 'Scholarship').length"></p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3 3 8l9 5 9-5-9-5Zm-6 8.5V16l6 3 6-3v-4.5M21 8v7"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Internships</p>
                        <p class="mt-2 text-3xl font-bold text-slate-900"
                           x-text="opportunities.filter(item => item.category === 'Internship').length"></p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7h18v13H3zM8 7V4h8v3M3 12h18m-11 0v2h4v-2"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Search and Filter --}}
        <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="relative w-full lg:max-w-md">
                    <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="11" cy="11" r="7" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-width="2" d="m16 16 4 4"/>
                    </svg>
                    <input
                        type="text"
                        x-model="search"
                        placeholder="Search saved opportunities..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                <div class="flex flex-wrap gap-2">
                    <template x-for="item in ['All', 'Scholarship', 'Internship', 'Competition', 'Training']" :key="item">
                        <button
                            type="button"
                            @click="category = item"
                            :class="category === item
                                ? 'border-blue-600 bg-blue-600 text-white'
                                : 'border-slate-200 bg-white text-slate-600 hover:border-blue-300 hover:text-blue-600'"
                            class="rounded-lg border px-3 py-2 text-xs font-semibold transition sm:text-sm"
                            x-text="item"
                        ></button>
                    </template>
                </div>
            </div>
        </div>

        {{-- Opportunity List Header --}}
        <div class="mb-5 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-slate-900">Your Saved List</h2>
                <p class="mt-1 text-sm text-slate-500">
                    <span x-text="filteredOpportunities.length"></span> opportunities found
                </p>
            </div>
        </div>

        {{-- Opportunity Cards --}}
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">

            <template x-for="opportunity in filteredOpportunities" :key="opportunity.id">
                <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-md sm:p-6">

                    <div class="flex items-start justify-between gap-4">
                        <div class="flex min-w-0 items-center gap-3">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl text-sm font-bold"
                                :class="opportunity.color"
                                x-text="opportunity.initials"
                            ></div>

                            <div class="min-w-0">
                                <p class="truncate text-sm font-semibold text-slate-800" x-text="opportunity.organization"></p>
                                <p class="mt-1 text-xs text-slate-400">Opportunity Provider</p>
                            </div>
                        </div>

                        <button
                            type="button"
                            @click="removeOpportunity(opportunity.id)"
                            title="Remove from saved"
                            class="rounded-lg p-2 text-slate-400 transition hover:bg-red-50 hover:text-red-500"
                        >
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 7h12m-10 0 1 13h6l1-13M9 7V4h6v3m-5 4v5m4-5v5"/>
                            </svg>
                        </button>
                    </div>

                    <div class="mt-5">
                        <span
                            class="inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700"
                            x-text="opportunity.category"
                        ></span>

                        <h3 class="mt-3 text-lg font-bold leading-snug text-slate-900" x-text="opportunity.title"></h3>

                        <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-500" x-text="opportunity.description"></p>
                    </div>

                    <div class="mt-5 grid grid-cols-2 gap-3 border-t border-slate-100 pt-4">
                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <svg class="h-4 w-4 shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s7-5.2 7-12a7 7 0 1 0-14 0c0 6.8 7 12 7 12Z"/>
                                <circle cx="12" cy="9" r="2.2" stroke-width="1.8"/>
                            </svg>
                            <span class="truncate" x-text="opportunity.location"></span>
                        </div>

                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <svg class="h-4 w-4 shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="3" y="5" width="18" height="16" rx="2" stroke-width="1.8"/>
                                <path stroke-linecap="round" stroke-width="1.8" d="M16 3v4M8 3v4M3 10h18"/>
                            </svg>
                            <span class="truncate" x-text="'Deadline: ' + new Date(opportunity.deadline + 'T00:00:00').toLocaleDateString('en-US', {month:'short', day:'numeric', year:'numeric'})"></span>
                        </div>
                    </div>

                    <div class="mt-5 flex flex-col gap-3 border-t border-slate-100 pt-4 sm:flex-row">
                        <button
                            type="button"
                            @click="selectedOpportunity = opportunity"
                            class="flex-1 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
                        >
                            View Details
                        </button>

                        <button
                            type="button"
                            @click="removeOpportunity(opportunity.id)"
                            class="rounded-xl border border-slate-200 px-4 py-3 text-sm font-semibold text-slate-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                        >
                            Remove Saved
                        </button>
                    </div>
                </div>
            </template>

        </div>

        {{-- Empty Search Result --}}
        <div
            x-cloak
            x-show="filteredOpportunities.length === 0 && opportunities.length > 0"
            class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center"
        >
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <circle cx="11" cy="11" r="7" stroke-width="2"/>
                    <path stroke-linecap="round" stroke-width="2" d="m16 16 4 4"/>
                </svg>
            </div>
            <h3 class="mt-5 text-lg font-bold text-slate-900">No opportunities found</h3>
            <p class="mt-2 text-sm text-slate-500">Try another keyword or select a different category.</p>
            <button
                type="button"
                @click="search = ''; category = 'All'"
                class="mt-5 text-sm font-semibold text-blue-600 hover:text-blue-700"
            >
                Clear filters
            </button>
        </div>

        {{-- Empty Saved List --}}
        <div
            x-cloak
            x-show="opportunities.length === 0"
            class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center"
        >
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-50 text-blue-500">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 5.5A2.5 2.5 0 0 1 7.5 3h9A2.5 2.5 0 0 1 19 5.5V21l-7-4-7 4V5.5Z"/>
                </svg>
            </div>
            <h3 class="mt-5 text-lg font-bold text-slate-900">No saved opportunities yet</h3>
            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                Save opportunities that interest you so you can easily find and review them later.
            </p>
            <a
                href="{{ route('student.opportunities') }}"
                class="mt-6 inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
            >
                Explore Opportunities
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7 7 7-7 7"/>
                </svg>
            </a>
        </div>

        {{-- Opportunity Detail Modal --}}
        <div
            x-cloak
            x-show="selectedOpportunity !== null"
            x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-slate-950/50 p-4 backdrop-blur-sm"
            @click.self="selectedOpportunity = null"
        >
            <div
                x-show="selectedOpportunity !== null"
                x-transition
                class="my-auto max-h-[90vh] w-full max-w-2xl overflow-y-auto rounded-2xl bg-white shadow-2xl"
            >
                <template x-if="selectedOpportunity">
                    <div>
                        <div class="sticky top-0 z-10 flex items-center justify-between border-b border-slate-100 bg-white px-6 py-5">
                            <h2 class="text-lg font-bold text-slate-900">Opportunity Details</h2>
                            <button
                                type="button"
                                @click="selectedOpportunity = null"
                                class="rounded-lg p-2 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                            >
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 6 12 12M18 6 6 18"/>
                                </svg>
                            </button>
                        </div>

                        <div class="p-6">
                            <div class="flex items-center gap-4">
                                <div
                                    class="flex h-14 w-14 items-center justify-center rounded-xl text-lg font-bold"
                                    :class="selectedOpportunity.color"
                                    x-text="selectedOpportunity.initials"
                                ></div>
                                <div>
                                    <p class="text-sm font-medium text-slate-500" x-text="selectedOpportunity.organization"></p>
                                    <h3 class="mt-1 text-xl font-bold text-slate-900" x-text="selectedOpportunity.title"></h3>
                                </div>
                            </div>

                            <div class="mt-5 flex flex-wrap gap-2">
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700" x-text="selectedOpportunity.category"></span>
                                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600" x-text="selectedOpportunity.type"></span>
                            </div>

                            <div class="mt-7">
                                <h4 class="font-bold text-slate-900">About This Opportunity</h4>
                                <p class="mt-2 text-sm leading-7 text-slate-600" x-text="selectedOpportunity.description"></p>
                            </div>

                            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div class="rounded-xl bg-slate-50 p-4">
                                    <p class="text-xs font-medium text-slate-500">Location</p>
                                    <p class="mt-2 text-sm font-semibold text-slate-800" x-text="selectedOpportunity.location"></p>
                                </div>
                                <div class="rounded-xl bg-slate-50 p-4">
                                    <p class="text-xs font-medium text-slate-500">Registration Deadline</p>
                                    <p class="mt-2 text-sm font-semibold text-slate-800" x-text="new Date(selectedOpportunity.deadline + 'T00:00:00').toLocaleDateString('en-US', {month:'long', day:'numeric', year:'numeric'})"></p>
                                </div>
                            </div>

                            <div class="mt-7">
                                <h4 class="font-bold text-slate-900">Requirements</h4>
                                <ul class="mt-3 space-y-2">
                                    <template x-for="(requirement, index) in selectedOpportunity.requirements" :key="index">
                                        <li class="flex gap-3 text-sm leading-6 text-slate-600">
                                            <svg class="mt-1 h-4 w-4 shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4 4L19 6"/>
                                            </svg>
                                            <span x-text="requirement"></span>
                                        </li>
                                    </template>
                                </ul>
                            </div>

                            <div class="mt-7">
                                <h4 class="font-bold text-slate-900">Benefits</h4>
                                <ul class="mt-3 space-y-2">
                                    <template x-for="(benefit, index) in selectedOpportunity.benefits" :key="index">
                                        <li class="flex gap-3 text-sm leading-6 text-slate-600">
                                            <svg class="mt-1 h-4 w-4 shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4 4L19 6"/>
                                            </svg>
                                            <span x-text="benefit"></span>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>

                        <div class="flex flex-col-reverse gap-3 border-t border-slate-100 bg-slate-50 px-6 py-5 sm:flex-row sm:justify-end">
                            <button
                                type="button"
                                @click="selectedOpportunity = null"
                                class="rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                            >
                                Close
                            </button>
                            <button
                                type="button"
                                @click="removeOpportunity(selectedOpportunity.id)"
                                class="rounded-xl bg-red-50 px-5 py-3 text-sm font-semibold text-red-600 transition hover:bg-red-100"
                            >
                                Remove from Saved
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </div>
</div>

@endsection
