@extends('layouts.organizer')

@section('title', 'My Opportunities - CareerBridge')

@section('content')

@php
    // Dummy data for the temporary interface
    $opportunities = [
        [
            'title' => 'National Business Plan Competition 2026',
            'category' => 'competition',
            'location' => 'Jakarta, Indonesia',
            'deadline' => 'December 15, 2026',
            'status' => 'published',
            'verification' => 'verified',
            'icon' => '🏆',
            'color' => 'from-blue-400 to-indigo-400',
            'description' => 'A business plan competition for university students across Indonesia.'
        ],
        [
            'title' => 'Digital Marketing Internship Program',
            'category' => 'internship',
            'location' => 'Remote',
            'deadline' => 'December 20, 2026',
            'status' => 'published',
            'verification' => 'pending',
            'icon' => '💼',
            'color' => 'from-cyan-400 to-blue-400',
            'description' => 'An internship opportunity to develop digital marketing skills.'
        ],
        [
            'title' => 'Future Leaders Scholarship 2026',
            'category' => 'scholarship',
            'location' => 'Indonesia',
            'deadline' => 'January 10, 2027',
            'status' => 'draft',
            'verification' => 'pending',
            'icon' => '🎓',
            'color' => 'from-violet-400 to-purple-400',
            'description' => 'A scholarship program for outstanding students and future leaders.'
        ],
        [
            'title' => 'UI/UX Design Bootcamp',
            'category' => 'training',
            'location' => 'Online',
            'deadline' => 'November 25, 2026',
            'status' => 'closed',
            'verification' => 'verified',
            'icon' => '🎨',
            'color' => 'from-orange-400 to-pink-400',
            'description' => 'An intensive UI/UX design training program for university students.'
        ],
    ];

    $total = count($opportunities);
    $published = collect($opportunities)->where('status', 'published')->count();
    $draft = collect($opportunities)->where('status', 'draft')->count();
    $closed = collect($opportunities)->where('status', 'closed')->count();
@endphp

<div class="space-y-8"
    x-data="{
        showDetailModal: false,
        selectedOpportunity: {},

        openDetail(opportunity) {
            this.selectedOpportunity = opportunity;
            this.showDetailModal = true;
        }
    }">

    {{-- PAGE HEADER --}}
    <div class="relative overflow-hidden rounded-3xl border border-[#D5E8F7]
        bg-gradient-to-r from-[#DCEEFF] via-[#E5F1FC] to-[#EDF6FC]
        p-6 shadow-sm sm:p-8">

        <div class="pointer-events-none absolute -right-10 -top-16
            h-52 w-52 rounded-full bg-white/30"></div>

        <div class="pointer-events-none absolute -bottom-20 right-32
            h-40 w-40 rounded-full bg-[#A9D4F2]/20"></div>

        <div class="relative flex flex-col gap-6 sm:flex-row
            sm:items-center sm:justify-between">

            <div>
                <div class="inline-flex items-center gap-2 rounded-full
                    border border-[#B9D9F1] bg-white/70 px-3 py-1.5">

                    <span class="h-2 w-2 rounded-full bg-[#65B5E8]"></span>

                    <span class="text-xs font-bold tracking-wide text-[#47799F]">
                        ORGANIZER PORTAL
                    </span>
                </div>

                <h1 class="mt-4 text-2xl font-extrabold tracking-tight
                    text-[#294D6B] sm:text-3xl">
                    My Opportunities
                </h1>

                <p class="mt-2 max-w-xl text-sm leading-relaxed text-[#58758D]">
                    Manage all scholarships, internships, competitions, and training programs
                    that you offer to students.
                </p>
            </div>

            <a href="{{ route('organizer.opportunities.create') }}"
                class="inline-flex shrink-0 items-center justify-center gap-2
                rounded-xl bg-[#65A9D8] px-5 py-3 text-sm font-bold
                text-white shadow-md shadow-[#8CBFE2]/30 transition
                hover:-translate-y-0.5 hover:bg-[#5599C9]">

                <span class="text-xl leading-none">+</span>
                Add Opportunity
            </a>

        </div>
    </div>


    {{-- STATISTICS --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Total --}}
        <div class="rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm
            transition hover:-translate-y-1 hover:shadow-md">

            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center
                    rounded-xl bg-sky-100 text-xl text-sky-600">
                    ✦
                </div>

                <span class="rounded-lg bg-sky-50 px-3 py-1 text-xs
                    font-semibold text-sky-600">
                    Overall
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Opportunities
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-[#304F6B]">
                {{ $total }}
            </h2>

            <p class="mt-2 text-xs text-slate-400">
                All opportunities under management
            </p>
        </div>


        {{-- Published --}}
        <div class="rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm
            transition hover:-translate-y-1 hover:shadow-md">

            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center
                    rounded-xl bg-emerald-100 text-xl text-emerald-600">
                    ✓
                </div>

                <span class="rounded-lg bg-emerald-50 px-3 py-1 text-xs
                    font-semibold text-emerald-600">
                    Active
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Published
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-[#304F6B]">
                {{ $published }}
            </h2>

            <p class="mt-2 text-xs text-slate-400">
                Published opportunities
            </p>
        </div>


        {{-- Draft --}}
        <div class="rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm
            transition hover:-translate-y-1 hover:shadow-md">

            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center
                    rounded-xl bg-orange-100 text-xl text-orange-600">
                    ▤
                </div>

                <span class="rounded-lg bg-orange-50 px-3 py-1 text-xs
                    font-semibold text-orange-600">
                    Draft
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Draft Opportunities
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-[#304F6B]">
                {{ $draft }}
            </h2>

            <p class="mt-2 text-xs text-slate-400">
                Unpublished opportunities
            </p>
        </div>


        {{-- Closed --}}
        <div class="rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm
            transition hover:-translate-y-1 hover:shadow-md">

            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center
                    rounded-xl bg-purple-100 text-xl text-purple-600">
                    ◷
                </div>

                <span class="rounded-lg bg-purple-50 px-3 py-1 text-xs
                    font-semibold text-purple-600">
                    Closed
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Closed
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-[#304F6B]">
                {{ $closed }}
            </h2>

            <p class="mt-2 text-xs text-slate-400">
                Closed opportunities
            </p>
        </div>

    </div>


    {{-- OPPORTUNITY SECTION --}}
    <div class="overflow-hidden rounded-2xl border border-[#E0EAF2]
        bg-white shadow-sm">

        {{-- Section Heading --}}
        <div class="flex flex-col gap-2 border-b border-slate-100
            px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h2 class="font-bold text-[#304F6B]">
                    Opportunity List
                </h2>

                <p class="mt-1 text-xs text-slate-400">
                    Monitor and manage all the opportunities you create.
                </p>
            </div>

            <span class="text-xs font-semibold text-[#6D8BA4]">
                {{ $total }} Opportunities
            </span>

        </div>


        {{-- SEARCH & FILTER --}}
        <div class="grid grid-cols-1 gap-3 border-b border-slate-100
            bg-[#F8FBFE] p-5 md:grid-cols-2 xl:grid-cols-4">

            {{-- Search --}}
            <div class="relative">
                <span class="absolute left-3 top-3 text-slate-400">
                    ⌕
                </span>

                <input type="text"
                    placeholder="Search opportunities..."
                    class="w-full rounded-xl border border-[#DCE8F1]
                    bg-white py-3 pl-10 pr-4 text-sm text-slate-700
                    outline-none transition focus:border-[#78B8E3]
                    focus:ring-2 focus:ring-sky-100">
            </div>

            {{-- Category --}}
            <select class="rounded-xl border border-[#DCE8F1] bg-white
                px-4 py-3 text-sm text-slate-600 outline-none
                focus:border-[#78B8E3]">

                <option>All Categories</option>
                <option>Scholarship</option>
                <option>Internship</option>
                <option>Competition</option>
                <option>Training</option>

            </select>

            {{-- Status --}}
            <select class="rounded-xl border border-[#DCE8F1] bg-white
                px-4 py-3 text-sm text-slate-600 outline-none
                focus:border-[#78B8E3]">

                <option>All Statuses</option>
                <option>Published</option>
                <option>Draft</option>
                <option>Closed</option>

            </select>

            {{-- Verification --}}
            <select class="rounded-xl border border-[#DCE8F1] bg-white
                px-4 py-3 text-sm text-slate-600 outline-none
                focus:border-[#78B8E3]">

                <option>All Verification Statuses</option>
                <option>Verified</option>
                <option>Pending</option>
                <option>Rejected</option>

            </select>

        </div>


        {{-- OPPORTUNITY TABLE --}}
        <div class="overflow-x-auto p-5">

            <table class="w-full min-w-[1000px] border-collapse text-left">

                {{-- Table Header --}}
                <thead>
                    <tr class="border-b border-[#E2EDF5] bg-[#F8FBFE]">
                        <th class="px-4 py-4 text-xs font-bold uppercase tracking-wide text-[#7892A8]">
                            Opportunities
                        </th>
                        <th class="px-4 py-4 text-xs font-bold uppercase tracking-wide text-[#7892A8]">
                            Category
                        </th>
                        <th class="px-4 py-4 text-xs font-bold uppercase tracking-wide text-[#7892A8]">
                            Location
                        </th>
                        <th class="px-4 py-4 text-xs font-bold uppercase tracking-wide text-[#7892A8]">
                            Deadline
                        </th>
                        <th class="px-4 py-4 text-xs font-bold uppercase tracking-wide text-[#7892A8]">
                            Publication
                        </th>
                        <th class="px-4 py-4 text-xs font-bold uppercase tracking-wide text-[#7892A8]">
                            Verification
                        </th>
                        <th class="px-4 py-4 text-center text-xs font-bold uppercase tracking-wide text-[#7892A8]">
                            Actions
                        </th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="divide-y divide-[#EDF2F7]">

                    @foreach($opportunities as $opportunity)

                        <tr class="transition hover:bg-[#F8FBFE]">

                            {{-- Opportunity Name --}}
                            <td class="px-4 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#EAF4FC] text-xl">
                                        {{ $opportunity['icon'] }}
                                    </div>

                                    <div class="max-w-[240px]">
                                        <p class="text-sm font-bold leading-snug text-[#304F6B]">
                                            {{ $opportunity['title'] }}
                                        </p>
                                        <p class="mt-1 line-clamp-1 text-xs text-slate-400">
                                            {{ $opportunity['description'] }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            {{-- Category --}}
                            <td class="px-4 py-5">
                                <span class="inline-flex rounded-lg bg-sky-50 px-3 py-1.5 text-xs font-bold text-sky-600">
                                    {{ match($opportunity['category']) {
                                        'scholarship' => 'Scholarship',
                                        'internship' => 'Internship',
                                        'competition' => 'Competition',
                                        'training' => 'Training',
                                        default => $opportunity['category'],
                                    } }}
                                </span>
                            </td>

                            {{-- Location --}}
                            <td class="px-4 py-5 text-sm text-slate-500">
                                {{ $opportunity['location'] }}
                            </td>

                            {{-- Deadline --}}
                            <td class="px-4 py-5 whitespace-nowrap text-sm text-slate-500">
                                {{ $opportunity['deadline'] }}
                            </td>

                            {{-- Publication Status --}}
                            <td class="px-4 py-5">
                                @if($opportunity['status'] === 'published')
                                    <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-600">
                                        Published
                                    </span>
                                @elseif($opportunity['status'] === 'draft')
                                    <span class="inline-flex rounded-full bg-orange-50 px-3 py-1.5 text-xs font-bold text-orange-600">
                                        Draft
                                    </span>
                                @else
                                    <span class="inline-flex rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600">
                                        Closed
                                    </span>
                                @endif
                            </td>

                            {{-- Verification Status --}}
                            <td class="px-4 py-5">
                                @if($opportunity['verification'] === 'verified')
                                    <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600">
                                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                        Verified
                                    </span>
                                @elseif($opportunity['verification'] === 'pending')
                                    <span class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-600">
                                        <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                                        Pending
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 text-xs font-bold text-rose-600">
                                        <span class="h-2 w-2 rounded-full bg-rose-500"></span>
                                        Rejected
                                    </span>
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="px-4 py-5">
                                <div class="flex items-center justify-center gap-2">

                                    <button
                                        type="button"
                                        @click="openDetail({{ Illuminate\Support\Js::from($opportunity) }})"
                                        class="rounded-lg border border-[#D5E8F7] px-3 py-2 text-xs font-bold text-[#5799CE] transition hover:bg-[#EFF7FD]">
                                        View
                                    </button>

                                    <a href="{{ route('organizer.opportunities.edit', 1) }}"
                                        class="rounded-lg bg-[#65A9D8] px-3 py-2 text-xs font-bold text-white transition hover:bg-[#5599C9]">
                                        Edit
                                    </a>
                                    
                                    {{-- DELETE --}}
                                    <button type="button"
                                        onclick="if(confirm('Are you sure you want to delete this opportunity?')) { alert('Delete functionality will be available once the backend is implemented.'); }"
                                        class="rounded-lg border border-rose-200 px-3 py-2
                                        text-xs font-semibold text-rose-600 transition hover:bg-rose-50">
                                        Delete
                                    </button>

                                </div>
                            </td>

                        </tr>

                    @endforeach

                </tbody>
            </table>

        </div>


        {{-- FOOTER --}}
        <div class="flex flex-col items-center justify-between gap-3
            border-t border-slate-100 bg-[#FBFDFF] px-6 py-4 sm:flex-row">

            <p class="text-xs text-slate-400">
                Showing {{ $total }} sample opportunities
            </p>

            <div class="flex items-center gap-2">

                <button type="button"
                    class="flex h-9 w-9 items-center justify-center
                    rounded-lg border border-slate-200 text-slate-400">
                    ‹
                </button>

                <span class="flex h-9 w-9 items-center justify-center
                    rounded-lg bg-[#65A9D8] text-xs font-bold text-white">
                    1
                </span>

                <button type="button"
                    class="flex h-9 w-9 items-center justify-center
                    rounded-lg border border-slate-200 text-slate-400">
                    ›
                </button>

            </div>

        </div>

    </div>

</div>

@endsection