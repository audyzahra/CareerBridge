@extends('layouts.organizer')

@section('title', 'Account Settings')

@section('content')

@php
    $organizerProfile = $user->organizerProfile;

    $organizationName = $organizerProfile?->organization_name ?? $user->name;

    $organizationLogo = $organizerProfile?->logo_path;

    $organizationLogoUrl = $organizationLogo
        ? \App\Helpers\NusafestStorage::publicUrl($organizationLogo)
        : null;
@endphp

<div class="mx-auto w-full max-w-5xl space-y-7">

    {{-- Page Header --}}
    <div>
        <p class="text-sm font-semibold text-sky-600">
            Account Management
        </p>

        <h1 class="mt-1 text-3xl font-bold text-[#304F6B]">
            Account Settings
        </h1>

        <p class="mt-2 text-sm text-[#7891A8]">
            Manage your account information and security preferences.
        </p>
    </div>

    {{-- Account Summary --}}
    <div class="flex flex-col gap-5 rounded-2xl border border-[#D6E8F5] bg-white p-6 sm:flex-row sm:items-center">

        {{-- Account Icon --}}
        <div class="flex h-24 w-24 shrink-0 items-center justify-center rounded-2xl border border-[#D6E8F5] bg-[#EAF4FA]">
            <svg
                class="h-11 w-11 text-[#5799CE]"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                stroke-width="1.7"
            >
                <circle cx="12" cy="8" r="4"/>
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M5 21a7 7 0 0114 0"
                />
            </svg>
        </div>

        {{-- Account Details --}}
        <div class="min-w-0 flex-1">
            <h2 class="break-words text-xl font-bold text-[#304F6B]">
                {{ $organizationName }}
            </h2>

            <p class="mt-1 break-all text-sm text-[#7891A8]">
                {{ $user->email }}
            </p>

            <span class="mt-3 inline-flex items-center gap-2 rounded-full bg-[#EAF4FA] px-3 py-1 text-xs font-semibold text-[#5799CE]">

                <svg
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                >
                    <rect x="5" y="10" width="14" height="11" rx="2"/>
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 10V7a4 4 0 018 0v3"
                    />
                </svg>

                Organizer Account
            </span>
        </div>

    </div>

    {{-- Personal Information --}}
    <div class="overflow-hidden rounded-2xl border border-[#D6E8F5] bg-white shadow-sm">

        <div class="flex items-center gap-3 border-b border-[#E6F0F7] px-6 py-5 sm:px-8">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EAF4FA]">
                <svg class="h-6 w-6" fill="none" stroke="#5799CE"
                     viewBox="0 0 24 24" stroke-width="1.8">
                    <circle cx="12" cy="8" r="4"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 21a7 7 0 0114 0"/>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-[#304F6B]">
                    Personal Information
                </h2>

                <p class="mt-1 text-xs text-[#91A5B7]">
                    Update your account name and email address.
                </p>
            </div>

        </div>

        <div class="p-6 sm:p-8">

            @if(session('profile_success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('profile_success') }}
                </div>
            @endif

            @if($errors->has('name') || $errors->has('email'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach($errors->get('name') as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                        @foreach($errors->get('email') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('organizer.settings.update-profile') }}"
                  method="POST"
                  class="space-y-6">

                @csrf
                @method('PUT')

                {{-- Full Name --}}
                <div>
                    <label for="name"
                           class="mb-2 block text-sm font-semibold text-[#405F79]">
                        Full Name <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required
                        maxlength="255"
                        placeholder="Enter your full name"
                        class="w-full rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100"
                    >
                </div>

                {{-- Email --}}
                <div>
                    <label for="email"
                           class="mb-2 block text-sm font-semibold text-[#405F79]">
                        Email Address <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        maxlength="255"
                        placeholder="Enter your email address"
                        class="w-full rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100"
                    >
                </div>

                <div class="flex justify-end border-t border-[#E6F0F7] pt-5">
                    <button
                        type="submit"
                        style="background:#5799CE;color:white;"
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-6 py-3 text-sm font-bold shadow-sm transition hover:opacity-90"
                    >
                        <svg class="h-5 w-5" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24"
                             stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 13l4 4L19 7"/>
                        </svg>

                        Save Changes
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- Password & Security --}}
    <div class="overflow-hidden rounded-2xl border border-[#D6E8F5] bg-white shadow-sm">

        <div class="flex items-center gap-3 border-b border-[#E6F0F7] px-6 py-5 sm:px-8">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EAF4FA]">
                <svg class="h-6 w-6" fill="none" stroke="#5799CE"
                     viewBox="0 0 24 24" stroke-width="1.8">
                    <rect x="4" y="10" width="16" height="11" rx="2"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 10V7a4 4 0 018 0v3"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 14v3"/>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-[#304F6B]">
                    Password & Security
                </h2>

                <p class="mt-1 text-xs text-[#91A5B7]">
                    Keep your account secure by using a strong password.
                </p>
            </div>

        </div>

        <div class="p-6 sm:p-8">

            @if(session('password_success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('password_success') }}
                </div>
            @endif

            @if($errors->has('current_password') || $errors->has('password'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach($errors->get('current_password') as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                        @foreach($errors->get('password') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('organizer.settings.update-password') }}"
                  method="POST"
                  class="space-y-6">

                @csrf
                @method('PUT')

                {{-- Current Password --}}
                <div>
                    <label for="current_password"
                           class="mb-2 block text-sm font-semibold text-[#405F79]">
                        Current Password <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your current password"
                        class="w-full rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100"
                    >
                </div>

                {{-- New Password --}}
                <div>
                    <label for="password"
                           class="mb-2 block text-sm font-semibold text-[#405F79]">
                        New Password <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Enter your new password"
                        class="w-full rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100"
                    >

                    <p class="mt-2 text-xs text-[#91A5B7]">
                        Your password must contain at least 8 characters.
                    </p>
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation"
                           class="mb-2 block text-sm font-semibold text-[#405F79]">
                        Confirm New Password <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm your new password"
                        class="w-full rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100"
                    >
                </div>

                <div class="flex justify-end border-t border-[#E6F0F7] pt-5">
                    <button
                        type="submit"
                        style="background:#5799CE;color:white;"
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-6 py-3 text-sm font-bold shadow-sm transition hover:opacity-90"
                    >
                        <svg class="h-5 w-5" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24"
                             stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7a2 2 0 002 2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 10V7a4 4 0 018 0v3"/>
                        </svg>

                        Update Password
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- Account Security Notice --}}
    <div class="flex gap-3 rounded-xl border border-[#D6E8F5] bg-[#F4F9FD] p-5">

        <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#5799CE]"
             fill="none" stroke="currentColor" viewBox="0 0 24 24"
             stroke-width="1.8">
            <circle cx="12" cy="12" r="10"/>
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 11v5m0-8h.01"/>
        </svg>

        <div>
            <h3 class="text-sm font-bold text-[#405F79]">
                Account Security
            </h3>

            <p class="mt-1 text-xs leading-6 text-[#7891A8]">
                Never share your password with anyone. Make sure your account
                information is always accurate and up to date.
            </p>
        </div>

    </div>

</div>

@endsection
