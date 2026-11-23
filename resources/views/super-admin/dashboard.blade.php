@extends('layouts.super-admin')

@section('title', 'Dashboard Super Admin - CareerBridge')

@section('content')

<div class="space-y-8">

    {{-- Page Heading --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-medium text-sky-500">Administration</p>
            <h1 class="mt-1 text-2xl font-extrabold text-slate-800">
                Dashboard
            </h1>
            <p class="mt-2 text-sm text-slate-500">
                Selamat datang di panel administrasi CareerBridge.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-500 shadow-sm">
            {{ now()->format('d F Y') }}
        </div>
    </div>


    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Total Users --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-100 text-xl text-sky-600">
                    ♙
                </div>
                <span class="text-xs font-semibold text-slate-400">Pengguna</span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Pengguna
            </p>
            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalUsers ?? 0) }}
            </h2>
        </div>


        {{-- Total Students --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-100 text-xl text-cyan-600">
                    ♧
                </div>
                <span class="text-xs font-semibold text-slate-400">Student</span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Student
            </p>
            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalStudents ?? 0) }}
            </h2>
        </div>


        {{-- Total Organizers --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-xl text-emerald-600">
                    ▣
                </div>
                <span class="text-xs font-semibold text-slate-400">Organizer</span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Organizer
            </p>
            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalOrganizers ?? 0) }}
            </h2>
        </div>


        {{-- Total Opportunities --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-xl text-orange-600">
                    ✦
                </div>
                <span class="text-xs font-semibold text-slate-400">Peluang</span>
            </div>

            <p class="mt-5 text-sm font-medium text-slate-500">
                Total Peluang
            </p>
            <h2 class="mt-1 text-3xl font-extrabold text-slate-800">
                {{ number_format($totalOpportunities ?? 0) }}
            </h2>
        </div>

    </div>


    {{-- Main Content --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- Recent Users --}}
        <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm xl:col-span-2">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">
                <div>
                    <h2 class="font-bold text-slate-800">
                        Pengguna Terbaru
                    </h2>
                    <p class="mt-1 text-xs text-slate-400">
                        Daftar pengguna yang baru bergabung.
                    </p>
                </div>

                <a href="{{ url('/super-admin/users') }}"
                    class="text-sm font-semibold text-sky-500 transition hover:text-sky-700">
                    Lihat Semua
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">

                    <thead class="bg-slate-50 text-xs uppercase text-slate-400">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Pengguna</th>
                            <th class="px-6 py-4 font-semibold">Role</th>
                            <th class="px-6 py-4 font-semibold">Tanggal Bergabung</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse(($recentUsers ?? []) as $user)
                            <tr class="transition hover:bg-slate-50">

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-100 font-bold text-sky-600">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-700">
                                                {{ $user->name }}
                                            </p>
                                            <p class="text-xs text-slate-400">
                                                {{ $user->email }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    @if($user->role === 'super_admin')
                                        <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-600">
                                            Super Admin
                                        </span>
                                    @elseif($user->role === 'organizer')
                                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-600">
                                            Organizer
                                        </span>
                                    @else
                                        <span class="rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-600">
                                            Student
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-slate-500">
                                    {{ $user->created_at?->format('d M Y') ?? '-' }}
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center">
                                    <p class="font-medium text-slate-500">
                                        Belum ada data pengguna.
                                    </p>
                                    <p class="mt-1 text-xs text-slate-400">
                                        Data pengguna akan muncul di sini.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>


        {{-- Platform Information --}}
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">

            <h2 class="font-bold text-slate-800">
                Informasi Platform
            </h2>

            <p class="mt-1 text-xs text-slate-400">
                Ringkasan pengelolaan CareerBridge.
            </p>

            <div class="mt-6 space-y-5">

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-100 text-sky-600">
                        ✓
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-700">
                            Sistem Pengguna
                        </p>
                        <p class="text-xs text-slate-400">
                            Pengelolaan akun platform
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                        ✓
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-700">
                            Organizer
                        </p>
                        <p class="text-xs text-slate-400">
                            Pengelolaan penyelenggara
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-100 text-cyan-600">
                        ✓
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-700">
                            Peluang Karier
                        </p>
                        <p class="text-xs text-slate-400">
                            Pengelolaan informasi peluang
                        </p>
                    </div>
                </div>

            </div>

            <div class="mt-7 rounded-xl bg-gradient-to-r from-sky-400 to-cyan-400 p-5 text-white">
                <p class="text-sm font-bold">
                    CareerBridge Administration
                </p>
                <p class="mt-2 text-xs leading-relaxed text-white/90">
                    Kelola platform dan pantau aktivitas pengguna melalui panel administrasi.
                </p>
            </div>

        </div>

    </div>

</div>

@endsection
