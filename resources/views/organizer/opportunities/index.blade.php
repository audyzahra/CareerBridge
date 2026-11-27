@extends('layouts.organizer')

@section('title', 'My Opportunities - CareerBridge')

@section('content')

<div class="space-y-8">

    {{-- PAGE HEADER --}}
    <div class="rounded-3xl border border-[#D5E8F7]
        bg-gradient-to-r from-[#DCEEFF] via-[#E5F1FC] to-[#EDF6FC]
        p-6 shadow-sm sm:p-8">

        <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="inline-flex rounded-full border border-[#B9D9F1]
                    bg-white/70 px-3 py-1.5 text-xs font-bold tracking-wide
                    text-[#47799F]">
                    ORGANIZER PORTAL
                </p>

                <h1 class="mt-4 text-2xl font-extrabold text-[#294D6B] sm:text-3xl">
                    My Opportunities
                </h1>

                <p class="mt-2 max-w-xl text-sm text-[#58758D]">
                    Manage all scholarships, internships, competitions,
                    and training programs that you offer to students.
                </p>
            </div>

            <a href="{{ route('organizer.opportunities.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl
                bg-[#65A9D8] px-5 py-3 text-sm font-bold text-white
                shadow-md hover:bg-[#5599C9]">

                <span class="text-xl">+</span>
                Add Opportunity

            </a>

        </div>
    </div>


    {{-- NOTIFICATIONS --}}
    @if (session('success'))
        <div class="rounded-xl border border-emerald-200 bg-emerald-50
            px-4 py-3 text-sm text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="rounded-xl border border-red-200 bg-red-50
            px-4 py-3 text-sm text-red-700">
            {{ session('error') }}
        </div>
    @endif


    {{-- STATISTICS --}}
    @php
        $stats = $statistics ?? [];

        $total = $stats['total'] ?? $opportunities->total();
        $published = $stats['published'] ?? 0;
        $draft = $stats['draft'] ?? 0;
        $closed = $stats['closed'] ?? 0;
    @endphp

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        @foreach([
            [
                'label' => 'Total Opportunities',
                'value' => $total,
                'tag' => 'Overall',
                'color' => 'sky'
            ],
            [
                'label' => 'Published',
                'value' => $published,
                'tag' => 'Active',
                'color' => 'emerald'
            ],
            [
                'label' => 'Draft Opportunities',
                'value' => $draft,
                'tag' => 'Draft',
                'color' => 'orange'
            ],
            [
                'label' => 'Closed',
                'value' => $closed,
                'tag' => 'Closed',
                'color' => 'purple'
            ],
        ] as $stat)

            <div class="rounded-2xl border border-[#E2EDF5]
                bg-white p-6 shadow-sm transition hover:-translate-y-1
                hover:shadow-md">

                <div class="flex items-center justify-between">

                    <span class="flex h-11 w-11 items-center justify-center
                        rounded-xl bg-{{ $stat['color'] }}-50 font-bold
                        text-{{ $stat['color'] }}-600">
                        ●
                    </span>

                    <span class="rounded-lg bg-{{ $stat['color'] }}-50
                        px-3 py-1 text-xs font-semibold
                        text-{{ $stat['color'] }}-600">
                        {{ $stat['tag'] }}
                    </span>

                </div>

                <p class="mt-5 text-sm text-slate-500">
                    {{ $stat['label'] }}
                </p>

                <h2 class="mt-1 text-3xl font-extrabold text-[#304F6B]">
                    {{ $stat['value'] }}
                </h2>

            </div>

        @endforeach

    </div>


    {{-- OPPORTUNITY LIST --}}
    <section class="overflow-hidden rounded-2xl border border-[#E0EAF2]
        bg-white shadow-sm">

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
                {{ $opportunities->total() }} Opportunities
            </span>

        </div>


        {{-- SEARCH AND FILTER --}}
        <form method="GET"
            action="{{ route('organizer.opportunities.index') }}"
            class="grid grid-cols-1 gap-3 border-b border-slate-100
            bg-[#F8FBFE] p-5 md:grid-cols-2 xl:grid-cols-4">

            <input type="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search opportunities..."
                class="rounded-xl border border-[#DCE8F1] bg-white
                px-4 py-3 text-sm outline-none focus:border-[#78B8E3]">


            <select name="category"
                class="rounded-xl border border-[#DCE8F1] bg-white
                px-4 py-3 text-sm">

                <option value="">All Categories</option>

                @foreach([
                    'scholarship' => 'Scholarship',
                    'internship' => 'Internship',
                    'competition' => 'Competition',
                    'training' => 'Training'
                ] as $value => $label)

                    <option value="{{ $value }}"
                        @selected(request('category') === $value)>
                        {{ $label }}
                    </option>

                @endforeach

            </select>


            <select name="status"
                class="rounded-xl border border-[#DCE8F1] bg-white
                px-4 py-3 text-sm">

                <option value="">All Statuses</option>

                @foreach([
                    'published' => 'Published',
                    'draft' => 'Draft',
                    'closed' => 'Closed'
                ] as $value => $label)

                    <option value="{{ $value }}"
                        @selected(request('status') === $value)>
                        {{ $label }}
                    </option>

                @endforeach

            </select>


            <div class="flex gap-2">

                <select name="verification_status"
                    class="min-w-0 flex-1 rounded-xl border border-[#DCE8F1]
                    bg-white px-3 py-3 text-sm">

                    <option value="">All Verification</option>

                    @foreach([
                        'verified' => 'Verified',
                        'pending' => 'Pending',
                        'rejected' => 'Rejected'
                    ] as $value => $label)

                        <option value="{{ $value }}"
                            @selected(request('verification_status') === $value)>
                            {{ $label }}
                        </option>

                    @endforeach

                </select>

                <button type="submit"
                    class="rounded-xl bg-[#65A9D8] px-4 py-3
                    text-sm font-bold text-white">
                    Filter
                </button>

            </div>

        </form>


        {{-- TABLE --}}
        <div class="overflow-x-auto p-5">

            <table class="w-full min-w-[950px] border-collapse text-left">

                <thead>
                    <tr class="border-b border-[#E2EDF5] bg-[#F8FBFE]">

                        @foreach([
                            'Opportunity',
                            'Category',
                            'Location',
                            'Deadline',
                            'Publication',
                            'Verification',
                            'Actions'
                        ] as $heading)

                            <th class="px-4 py-4 text-xs font-bold
                                uppercase tracking-wide text-[#7892A8]">
                                {{ $heading }}
                            </th>

                        @endforeach

                    </tr>
                </thead>


                <tbody class="divide-y divide-[#EDF2F7]">

                    @forelse($opportunities as $opportunity)

                        <tr class="transition hover:bg-[#F8FBFE]">

                            {{-- TITLE --}}
                            <td class="px-4 py-5">

                                <p class="max-w-[260px] text-sm font-bold
                                    text-[#304F6B]">
                                    {{ $opportunity->title }}
                                </p>

                                <p class="mt-1 max-w-[260px] truncate
                                    text-xs text-slate-400">
                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($opportunity->description),
                                        90
                                    ) }}
                                </p>

                            </td>


                            {{-- CATEGORY --}}
                            <td class="px-4 py-5">

                                <span class="rounded-lg bg-sky-50
                                    px-3 py-1.5 text-xs font-bold
                                    capitalize text-sky-600">
                                    {{ $opportunity->category }}
                                </span>

                            </td>


                            {{-- LOCATION --}}
                            <td class="px-4 py-5 text-sm text-slate-500">
                                {{ $opportunity->location ?: '—' }}
                            </td>


                            {{-- DEADLINE --}}
                            <td class="whitespace-nowrap px-4 py-5
                                text-sm text-slate-500">

                                {{ $opportunity->registration_deadline?->format('d M Y') ?? '—' }}

                            </td>


                            {{-- PUBLICATION STATUS --}}
                            <td class="px-4 py-5">

                                <span class="rounded-full px-3 py-1
                                    text-xs font-bold capitalize
                                    {{ $opportunity->status === 'published'
                                        ? 'bg-emerald-50 text-emerald-600'
                                        : ($opportunity->status === 'draft'
                                            ? 'bg-orange-50 text-orange-600'
                                            : 'bg-purple-50 text-purple-600') }}">

                                    {{ $opportunity->status }}

                                </span>

                            </td>


                            {{-- VERIFICATION --}}
                            <td class="px-4 py-5">

                                <span class="rounded-full px-3 py-1
                                    text-xs font-bold capitalize
                                    {{ $opportunity->verification_status === 'verified'
                                        ? 'bg-emerald-50 text-emerald-600'
                                        : ($opportunity->verification_status === 'rejected'
                                            ? 'bg-red-50 text-red-600'
                                            : 'bg-amber-50 text-amber-600') }}">

                                    {{ $opportunity->verification_status }}

                                </span>

                            </td>


                            {{-- ACTIONS --}}
                            <td class="px-4 py-5">

                                <div class="flex items-center gap-2">

                                    <a href="{{ route(
                                        'organizer.opportunities.edit',
                                        $opportunity
                                    ) }}"
                                        class="rounded-lg border border-[#DCE8F1]
                                        px-3 py-2 text-xs font-bold
                                        text-[#5289B5] hover:bg-sky-50">

                                        Edit

                                    </a>


                                    <form action="{{ route(
                                        'organizer.opportunities.destroy',
                                        $opportunity
                                    ) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this opportunity?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="rounded-lg border border-red-100
                                            px-3 py-2 text-xs font-bold
                                            text-red-500 hover:bg-red-50">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-6 py-14 text-center">

                                <p class="font-bold text-[#304F6B]">
                                    No opportunities found
                                </p>

                                <p class="mt-2 text-sm text-slate-400">
                                    Create your first opportunity or adjust your filters.
                                </p>

                                <a href="{{ route('organizer.opportunities.create') }}"
                                    class="mt-5 inline-flex rounded-xl
                                    bg-[#65A9D8] px-5 py-3 text-sm
                                    font-bold text-white">

                                    Add Opportunity

                                </a>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if ($opportunities->hasPages())

            <div class="border-t border-slate-100 px-5 py-4">
                {{ $opportunities->withQueryString()->links() }}
            </div>

        @endif

    </section>

</div>

@endsection
