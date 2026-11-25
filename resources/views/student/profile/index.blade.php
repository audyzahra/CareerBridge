@extends('layouts.student')

@section('title', 'My Profile | CareerBridge')

@section('content')

@php
    $user = auth()->user();

    $profile = \App\Models\StudentProfile::where('user_id', $user->id)->first();

    $initial = strtoupper(substr($user->name ?? 'S', 0, 1));
@endphp

<div
    class="min-h-screen bg-slate-50/70"
    x-data="{ editing: false }"
>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- Page Heading --}}
        <div class="mb-8">
            <div class="mb-3 flex items-center gap-2 text-sm font-semibold text-blue-600">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 21a8 8 0 0 1 16 0"/>
                </svg>
                STUDENT ACCOUNT
            </div>

            <h1 class="text-3xl font-extrabold tracking-tight text-slate-800 sm:text-4xl">
                My Profile
            </h1>

            <p class="mt-2 text-sm text-slate-500 sm:text-base">
                Manage your personal information and academic profile.
            </p>
        </div>

        {{-- Profile Header --}}
        <section class="relative mb-7 overflow-hidden rounded-3xl border border-blue-100 bg-gradient-to-r from-blue-50 via-sky-50 to-cyan-50 p-6 sm:p-8">

            <div class="pointer-events-none absolute -right-10 -top-20 h-64 w-64 rounded-full bg-white/40"></div>
            <div class="pointer-events-none absolute -bottom-24 right-48 h-48 w-48 rounded-full bg-blue-100/40"></div>

            <div class="relative flex flex-col justify-between gap-6 sm:flex-row sm:items-center">

                <div class="flex items-center gap-5">

                    {{-- Avatar --}}
                    <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-sky-400 text-3xl font-extrabold text-white shadow-lg shadow-blue-200 sm:h-24 sm:w-24">
                        {{ $initial }}
                    </div>

                    <div class="min-w-0">
                        <div class="mb-2 inline-flex items-center gap-1.5 rounded-full border border-blue-100 bg-white/80 px-3 py-1 text-xs font-bold text-blue-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            Student Account
                        </div>

                        <h2 class="truncate text-2xl font-extrabold text-slate-800 sm:text-3xl">
                            {{ $user->name }}
                        </h2>

                        <p class="mt-1 truncate text-sm text-slate-500">
                            {{ $user->email }}
                        </p>

                        <p class="mt-2 text-xs font-medium text-slate-400">
                            {{ $profile?->university ?? 'University not added yet' }}
                        </p>
                    </div>

                </div>

                <button
                    type="button"
                    @click="editing = !editing"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-blue-700"
                >
                    <svg x-show="!editing" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="m14 5 5 5M4 20l4.5-1 11-11a2.1 2.1 0 0 0-3-3l-11 11L4 20Z"/>
                    </svg>

                    <svg x-show="editing" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="m6 6 12 12M18 6 6 18"/>
                    </svg>

                    <span x-text="editing ? 'Cancel Editing' : 'Edit Profile'"></span>
                </button>

            </div>
        </section>

        {{-- Profile Information --}}
        <div x-show="!editing" x-transition.opacity>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                {{-- Personal Information --}}
                <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm lg:col-span-1">

                    <div class="border-b border-slate-100 px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <circle cx="12" cy="8" r="4"/>
                                    <path d="M4 21a8 8 0 0 1 16 0"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="font-bold text-slate-800">Personal Information</h3>
                                <p class="mt-0.5 text-xs text-slate-400">Your basic account details</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5 p-6">

                        <div>
                            <p class="text-xs font-medium text-slate-400">Full Name</p>
                            <p class="mt-1.5 text-sm font-semibold text-slate-700">
                                {{ $user->name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-slate-400">Email Address</p>
                            <p class="mt-1.5 break-all text-sm font-semibold text-slate-700">
                                {{ $user->email }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-slate-400">Student ID</p>
                            <p class="mt-1.5 text-sm font-semibold text-slate-700">
                                {{ $profile?->student_id ?? 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-slate-400">About Me</p>
                            <p class="mt-1.5 text-sm leading-6 text-slate-600">
                                {{ $profile?->bio ?? 'Tell us a little about yourself.' }}
                            </p>
                        </div>

                    </div>
                </section>

                {{-- Academic Information --}}
                <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm lg:col-span-2">

                    <div class="border-b border-slate-100 px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 text-cyan-600">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M3 9.5 12 4l9 5.5-9 5.5-9-5.5Z"/>
                                    <path d="M7 12v5c3.3 2.5 6.7 2.5 10 0v-5M21 10v7"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="font-bold text-slate-800">Academic Information</h3>
                                <p class="mt-0.5 text-xs text-slate-400">Your educational background</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2">

                        <div class="sm:col-span-2">
                            <p class="text-xs font-medium text-slate-400">University</p>
                            <p class="mt-1.5 text-sm font-semibold text-slate-700">
                                {{ $profile?->university ?? 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-slate-400">Faculty</p>
                            <p class="mt-1.5 text-sm font-semibold text-slate-700">
                                {{ $profile?->faculty ?? 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-slate-400">Major / Study Program</p>
                            <p class="mt-1.5 text-sm font-semibold text-slate-700">
                                {{ $profile?->major ?? 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-slate-400">Current Semester</p>
                            <p class="mt-1.5 text-sm font-semibold text-slate-700">
                                {{ $profile?->semester ? 'Semester ' . $profile->semester : 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-slate-400">Expected Graduation Year</p>
                            <p class="mt-1.5 text-sm font-semibold text-slate-700">
                                {{ $profile?->graduation_year ?? 'Not provided' }}
                            </p>
                        </div>

                    </div>
                </section>

                {{-- Professional Information --}}
                <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm lg:col-span-3">

                    <div class="border-b border-slate-100 px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <rect x="3" y="3" width="18" height="18" rx="3"/>
                                    <path d="M8 12h8M8 16h5M8 8h8"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="font-bold text-slate-800">Professional Information</h3>
                                <p class="mt-0.5 text-xs text-slate-400">Your portfolio and professional presence</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2">

                        <div>
                            <p class="text-xs font-medium text-slate-400">Portfolio Website</p>

                            @if ($profile?->portfolio_url)
                                <a href="{{ $profile->portfolio_url }}" target="_blank" rel="noopener noreferrer"
                                    class="mt-1.5 inline-flex items-center gap-2 break-all text-sm font-semibold text-blue-600 hover:text-blue-700">
                                    {{ $profile->portfolio_url }}
                                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M14 4h6v6m-10 4L20 4"/>
                                        <path d="M18 13v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h6"/>
                                    </svg>
                                </a>
                            @else
                                <p class="mt-1.5 text-sm text-slate-400">Not provided</p>
                            @endif
                        </div>

                        <div>
                            <p class="text-xs font-medium text-slate-400">LinkedIn Profile</p>

                            @if ($profile?->linkedin_url)
                                <a href="{{ $profile->linkedin_url }}" target="_blank" rel="noopener noreferrer"
                                    class="mt-1.5 inline-flex items-center gap-2 break-all text-sm font-semibold text-blue-600 hover:text-blue-700">
                                    {{ $profile->linkedin_url }}
                                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M14 4h6v6m-10 4L20 4"/>
                                        <path d="M18 13v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h6"/>
                                    </svg>
                                </a>
                            @else
                                <p class="mt-1.5 text-sm text-slate-400">Not provided</p>
                            @endif
                        </div>

                    </div>
                </section>

            </div>
        </div>

        {{-- Edit Profile Form --}}
        <section
            x-cloak
            x-show="editing"
            x-transition.opacity
            class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm"
        >

            <div class="border-b border-slate-100 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-800">Edit Your Profile</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Update your personal, academic, and professional information.
                </p>
            </div>

            <form class="space-y-8 p-6" @submit.prevent>

                {{-- Personal Information --}}
                <div>
                    <h3 class="mb-5 flex items-center gap-2 font-bold text-slate-800">
                        <svg class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M4 21a8 8 0 0 1 16 0"/>
                        </svg>
                        Personal Information
                    </h3>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-600">Full Name</label>
                            <input type="text" value="{{ $user->name }}"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-600">Email Address</label>
                            <input type="email" value="{{ $user->email }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-500 outline-none"
                                disabled>
                            <p class="mt-1.5 text-xs text-slate-400">Email address cannot be changed here.</p>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-semibold text-slate-600">Student ID</label>
                            <input type="text" value="{{ $profile?->student_id }}"
                                placeholder="Enter your student ID"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-semibold text-slate-600">About Me</label>
                            <textarea rows="4" placeholder="Write a short introduction about yourself..."
                                class="w-full resize-y rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">{{ $profile?->bio }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="border-t border-slate-100"></div>

                {{-- Academic Information --}}
                <div>
                    <h3 class="mb-5 flex items-center gap-2 font-bold text-slate-800">
                        <svg class="h-5 w-5 text-cyan-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M3 9.5 12 4l9 5.5-9 5.5-9-5.5Z"/>
                            <path d="M7 12v5c3.3 2.5 6.7 2.5 10 0v-5M21 10v7"/>
                        </svg>
                        Academic Information
                    </h3>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-semibold text-slate-600">University</label>
                            <input type="text" value="{{ $profile?->university }}"
                                placeholder="Enter your university"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-600">Faculty</label>
                            <input type="text" value="{{ $profile?->faculty }}"
                                placeholder="Enter your faculty"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-600">Major / Study Program</label>
                            <input type="text" value="{{ $profile?->major }}"
                                placeholder="Enter your major"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-600">Current Semester</label>
                            <input type="number" min="1" max="14" value="{{ $profile?->semester }}"
                                placeholder="e.g. 5"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-600">Expected Graduation Year</label>
                            <input type="number" min="2020" max="2100" value="{{ $profile?->graduation_year }}"
                                placeholder="e.g. 2027"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">
                        </div>

                    </div>
                </div>

                <div class="border-t border-slate-100"></div>

                {{-- Professional Information --}}
                <div>
                    <h3 class="mb-5 flex items-center gap-2 font-bold text-slate-800">
                        <svg class="h-5 w-5 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="3" width="18" height="18" rx="3"/>
                            <path d="M8 12h8M8 16h5M8 8h8"/>
                        </svg>
                        Professional Information
                    </h3>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-600">Portfolio URL</label>
                            <input type="url" value="{{ $profile?->portfolio_url }}"
                                placeholder="https://yourportfolio.com"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-600">LinkedIn URL</label>
                            <input type="url" value="{{ $profile?->linkedin_url }}"
                                placeholder="https://linkedin.com/in/yourname"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50">
                        </div>

                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="flex flex-col-reverse justify-end gap-3 border-t border-slate-100 pt-6 sm:flex-row">

                    <button
                        type="button"
                        @click="editing = false"
                        class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    >
                        Cancel
                    </button>

                    <button
                        type="button"
                        disabled
                        title="Profile update functionality will be implemented later"
                        class="inline-flex cursor-not-allowed items-center justify-center gap-2 rounded-xl bg-blue-300 px-5 py-3 text-sm font-bold text-white"
                    >
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="m5 12 4 4L19 6"/>
                        </svg>
                        Save Changes
                    </button>

                </div>

                <p class="text-right text-xs text-slate-400">
                    Profile editing is currently a UI preview. Save functionality will be connected later.
                </p>

            </form>
        </section>

    </div>
</div>

@endsection
