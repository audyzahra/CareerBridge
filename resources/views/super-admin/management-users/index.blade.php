@extends('layouts.super-admin')

@section('title', 'User Management | CareerBridge')

@section('content')

<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <p class="text-sm font-semibold text-sky-500">
                Administration
            </p>

            <h1 class="mt-1 text-3xl font-extrabold text-slate-800">
                User Management
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Manage and monitor all CareerBridge user accounts.
            </p>
        </div>

        <a href="{{ route('super-admin.users.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-5 py-3 text-sm font-bold text-white shadow-md shadow-sky-100 transition hover:bg-sky-600">

            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M12 5v14m-7-7h14"/>
            </svg>

            Add New User
        </a>
    </div>


    {{-- Notifications --}}
    @if(session('success'))
        <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>

            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="flex items-center gap-3 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>

            {{ session('error') }}
        </div>
    @endif


    {{-- User Statistics --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

        <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">All Users</p>

                <div class="rounded-xl bg-blue-50 p-2.5 text-blue-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.8" d="M17 20h5v-2a4 4 0 00-5.5-3.7M9 20H2v-2a4 4 0 017-2.6M16 7a4 4 0 11-8 0 4 4 0 018 0zm6 4a3 3 0 11-6 0 3 3 0 016 0zM2 11a3 3 0 106 0 3 3 0 00-6 0z"/>
                    </svg>
                </div>
            </div>

            <h2 class="mt-3 text-3xl font-extrabold text-slate-800">
                {{ number_format($users->total()) }}
            </h2>
        </div>

        <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">Students</p>

                <div class="rounded-xl bg-cyan-50 p-2.5 text-cyan-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.8" d="M12 3L2 8l10 5 10-5-10-5zm-7 8v5l7 4 7-4v-5"/>
                    </svg>
                </div>
            </div>

            <h2 class="mt-3 text-3xl font-extrabold text-slate-800">
                {{ number_format(\App\Models\User::where('role', 'student')->count()) }}
            </h2>
        </div>

        <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">Organizers</p>

                <div class="rounded-xl bg-emerald-50 p-2.5 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.8" d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/>
                    </svg>
                </div>
            </div>

            <h2 class="mt-3 text-3xl font-extrabold text-slate-800">
                {{ number_format(\App\Models\User::where('role', 'organizer')->count()) }}
            </h2>
        </div>

    </div>


    {{-- User Table --}}
    <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">

        {{-- Search and Filter --}}
        <div class="border-b border-slate-100 p-5">

            <form action="{{ route('super-admin.users.index') }}"
                  method="GET"
                  class="flex flex-col gap-3 lg:flex-row">

                {{-- Search --}}
                <div class="relative flex-1">

                    <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-width="2"
                            d="m16 16 4 4"/>
                    </svg>

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search by name or email..."
                           class="w-full rounded-xl border border-slate-200 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                </div>

                {{-- Role Filter --}}
                <div class="w-full lg:w-52">

                    <select name="role"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-600 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100">

                        <option value="">All Roles</option>

                        <option value="super_admin"
                            {{ request('role') === 'super_admin' ? 'selected' : '' }}>
                            Super Admin
                        </option>

                        <option value="student"
                            {{ request('role') === 'student' ? 'selected' : '' }}>
                            Student
                        </option>

                        <option value="organizer"
                            {{ request('role') === 'organizer' ? 'selected' : '' }}>
                            Organizer
                        </option>

                    </select>
                </div>

                <button type="submit"
                        class="rounded-xl bg-sky-500 px-6 py-3 text-sm font-bold text-white transition hover:bg-sky-600">
                    Apply Filters
                </button>

                @if(request()->hasAny(['search', 'role']))
                    <a href="{{ route('super-admin.users.index') }}"
                       class="rounded-xl border border-slate-200 px-5 py-3 text-center text-sm font-semibold text-slate-500 transition hover:bg-slate-50">
                        Reset
                    </a>
                @endif

            </form>
        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="whitespace-nowrap px-6 py-4">User</th>
                        <th class="whitespace-nowrap px-6 py-4">Email Address</th>
                        <th class="whitespace-nowrap px-6 py-4">Role</th>
                        <th class="whitespace-nowrap px-6 py-4">Joined Date</th>
                        <th class="whitespace-nowrap px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($users as $user)

                        <tr class="transition hover:bg-slate-50/70">

                            {{-- User --}}
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-sky-100 font-bold text-sky-600">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>

                                    <div>
                                        <p class="font-semibold text-slate-700">
                                            {{ $user->name }}
                                        </p>

                                        @if($user->id === auth()->id())
                                            <span class="text-xs text-sky-500">
                                                Current Account
                                            </span>
                                        @endif
                                    </div>

                                </div>
                            </td>

                            {{-- Email --}}
                            <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                {{ $user->email }}
                            </td>

                            {{-- Role --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                @php
                                    $roleStyles = [
                                        'super_admin' => 'bg-purple-50 text-purple-700',
                                        'student' => 'bg-sky-50 text-sky-700',
                                        'organizer' => 'bg-emerald-50 text-emerald-700',
                                    ];

                                    $roleStyle = $roleStyles[$user->role] ?? 'bg-slate-100 text-slate-600';
                                @endphp

                                <span class="rounded-full px-3 py-1.5 text-xs font-semibold {{ $roleStyle }}">
                                    {{ ucfirst(str_replace('_', ' ', $user->role)) }}
                                </span>

                            </td>

                            {{-- Joined Date --}}
                            <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                {{ $user->created_at?->format('d M Y') ?? '-' }}
                            </td>

                            {{-- Actions --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    <a href="{{ route('super-admin.users.edit', $user) }}"
                                       title="Edit User"
                                       class="rounded-lg bg-amber-50 p-2 text-amber-600 transition hover:bg-amber-100">

                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.12 2.12 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                        </svg>
                                    </a>

                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('super-admin.users.destroy', $user) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this user?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    title="Delete User"
                                                    class="rounded-lg bg-rose-50 p-2 text-rose-600 transition hover:bg-rose-100">

                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 7h12m-10 0V5a1 1 0 011-1h4a1 1 0 011 1v2m-7 0l1 13h6l1-13M10 11v5m4-5v5"/>
                                                </svg>

                                            </button>
                                        </form>
                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.8" d="M17 20h5v-2a4 4 0 00-5.5-3.7M9 20H2v-2a4 4 0 017-2.6M16 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>

                                <h3 class="mt-4 font-bold text-slate-700">
                                    No Users Found
                                </h3>

                                <p class="mt-1 text-sm text-slate-400">
                                    No user accounts match your search criteria.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($users->hasPages() || $users->total() > 0)

            <div class="flex flex-col justify-between gap-4 border-t border-slate-100 px-6 py-5 sm:flex-row sm:items-center">

                <p class="text-sm text-slate-500">
                    Showing
                    <span class="font-semibold text-slate-700">
                        {{ $users->firstItem() ?? 0 }}–{{ $users->lastItem() ?? 0 }}
                    </span>
                    of
                    <span class="font-semibold text-slate-700">
                        {{ number_format($users->total()) }}
                    </span>
                    users
                </p>

                <div>
                    {{ $users->links() }}
                </div>

            </div>

        @endif

    </div>

</div>

@endsection
