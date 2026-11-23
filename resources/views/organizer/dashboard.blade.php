@extends('layouts.organizer')

@section('title', 'Dashboard Organizer - CareerBridge')

@section('content')

<div class="space-y-8">


{{-- Page Heading --}}
<div class="relative overflow-hidden rounded-3xl border border-[#D5E8F7] bg-gradient-to-r from-[#DCEEFF] via-[#E5F1FC] to-[#EDF6FC] p-6 shadow-sm sm:p-8">

    {{-- Dekorasi Background --}}
    <div class="pointer-events-none absolute -right-10 -top-16 h-52 w-52 rounded-full bg-white/30"></div>
    <div class="pointer-events-none absolute -bottom-20 right-32 h-40 w-40 rounded-full bg-[#A9D4F2]/20"></div>

    <div class="relative flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">

        {{-- Informasi Dashboard --}}
        <div>
            <div class="inline-flex items-center gap-2 rounded-full border border-[#B9D9F1] bg-white/70 px-3 py-1.5">
                <span class="h-2 w-2 rounded-full bg-[#65B5E8]"></span>
                <span class="text-xs font-bold tracking-wide text-[#47799F]">
                    ORGANIZER PORTAL
                </span>
            </div>

            <h1 class="mt-4 text-2xl font-extrabold tracking-tight text-[#294D6B] sm:text-3xl">
                Dashboard Organizer
            </h1>

            <p class="mt-2 max-w-xl text-sm leading-relaxed text-[#58758D]">
                Selamat datang, {{ auth()->user()->name }}!
                Kelola dan pantau peluang yang kamu publikasikan melalui CareerBridge.
            </p>
        </div>

        {{-- Tombol Tambah Peluang --}}
        <a href="{{ url('/organizer/opportunities') }}"
            class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-[#65A9D8] px-5 py-3 text-sm font-bold text-white shadow-md shadow-[#8CBFE2]/30 transition duration-200 hover:-translate-y-0.5 hover:bg-[#5599C9] hover:shadow-lg">

            <span class="text-xl leading-none">+</span>
            Tambah Peluang
        </a>

    </div>
</div>



    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Total Opportunities --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-100 text-xl text-sky-600">
                    ✦
                </div>

                <span class="text-xs font-semibold text-slate-400">
                    Keseluruhan
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Peluang
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalOpportunities ?? 0) }}
            </h2>

        </div>


        {{-- Active Opportunities --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-xl text-emerald-600">
                    ✓
                </div>

                <span class="text-xs font-semibold text-slate-400">
                    Publikasi
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Peluang Aktif
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($activeOpportunities ?? 0) }}
            </h2>

        </div>


        {{-- Draft Opportunities --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-xl text-orange-600">
                    ▤
                </div>

                <span class="text-xs font-semibold text-slate-400">
                    Belum dipublikasikan
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Draft Peluang
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($draftOpportunities ?? 0) }}
            </h2>

        </div>


        {{-- Total Applicants --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-xl text-purple-600">
                    ♙
                </div>

                <span class="text-xs font-semibold text-slate-400">
                    Pendaftar
                </span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Pendaftar
            </p>

            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalApplicants ?? 0) }}
            </h2>

        </div>

    </div>


    {{-- Main Content --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- Recent Opportunities --}}
        <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm xl:col-span-2">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">

                <div>
                    <h2 class="font-bold text-slate-800">
                        Peluang Terbaru
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Daftar peluang yang kamu kelola.
                    </p>
                </div>

                <a href="{{ url('/organizer/opportunities') }}"
                    class="text-sm font-semibold text-sky-500 transition hover:text-sky-700">
                    Lihat Semua
                </a>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="bg-slate-50 text-xs uppercase text-slate-400">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Nama Peluang</th>
                            <th class="px-6 py-4 font-semibold">Kategori</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse(($recentOpportunities ?? []) as $opportunity)

                            <tr class="transition hover:bg-slate-50">

                                <td class="px-6 py-4">
                                    <p class="font-semibold text-slate-700">
                                        {{ $opportunity->title }}
                                    </p>
                                </td>

                                <td class="px-6 py-4 text-slate-500">
                                    {{ $opportunity->category ?? '-' }}
                                </td>

                                <td class="px-6 py-4">

                                    @if(($opportunity->status ?? '') === 'published')
                                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-600">
                                            Aktif
                                        </span>
                                    @elseif(($opportunity->status ?? '') === 'draft')
                                        <span class="rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-600">
                                            Draft
                                        </span>
                                    @else
                                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                                            {{ ucfirst($opportunity->status ?? 'Tidak diketahui') }}
                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center">

                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-sky-50 text-2xl text-sky-500">
                                        ✦
                                    </div>

                                    <p class="mt-4 font-semibold text-slate-600">
                                        Belum ada peluang
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Mulai publikasikan peluang pertamamu.
                                    </p>

                                    <a href="{{ url('/organizer/opportunities') }}"
                                        class="mt-4 inline-flex rounded-lg bg-sky-50 px-4 py-2 text-xs font-bold text-sky-600 transition hover:bg-sky-100">
                                        Kelola Peluang
                                    </a>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Organizer Profile --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">

            <h2 class="font-bold text-slate-800">
                Informasi Akun
            </h2>

            <p class="mt-1 text-xs text-slate-400">
                Informasi akun Organizer kamu.
            </p>


            <div class="mt-7 flex flex-col items-center text-center">

                <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-400 to-cyan-400 text-3xl font-extrabold text-white shadow-lg shadow-sky-100">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <h3 class="mt-4 text-lg font-bold text-slate-800">
                    {{ auth()->user()->name }}
                </h3>

                <p class="mt-1 text-sm text-slate-400">
                    {{ auth()->user()->email }}
                </p>

                <span class="mt-3 rounded-full bg-sky-100 px-4 py-1.5 text-xs font-semibold text-sky-600">
                    Organizer
                </span>

            </div>


            <div class="mt-7 border-t border-slate-100 pt-5">

                <div class="flex items-center justify-between">
                    <span class="text-sm text-slate-500">
                        Status Akun
                    </span>

                    <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-600">
                        Aktif
                    </span>
                </div>

                <a href="{{ url('/organizer/profile') }}"
                    class="mt-5 flex w-full items-center justify-center rounded-xl border border-sky-200 px-4 py-3 text-sm font-bold text-sky-600 transition hover:bg-sky-50">
                    Kelola Profil Organizer
                </a>

            </div>

        </div>

    </div>


    {{-- Welcome Information --}}
    <div class="rounded-2xl bg-gradient-to-r from-sky-400 via-cyan-400 to-teal-300 p-6 text-white shadow-lg shadow-sky-100">

        <h2 class="text-lg font-bold">
            Bangun Peluang Bersama CareerBridge!
        </h2>

        <p class="mt-2 max-w-2xl text-sm leading-relaxed text-white/90">
            Publikasikan beasiswa, magang, dan kompetisi untuk membantu mahasiswa menemukan kesempatan terbaik dalam mengembangkan potensi mereka.
        </p>

    </div>

</div>

@endsection
