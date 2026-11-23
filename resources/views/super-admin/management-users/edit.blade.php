@extends('layouts.super-admin')

@section('title', 'Edit User | CareerBridge')

@section('content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- Page Header --}}
    <div>
        <a href="{{ route('super-admin.users.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-sky-600">

            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>

            Back to User Management
        </a>

        <p class="mt-5 text-sm font-semibold text-sky-500">
            User Management
        </p>

        <h1 class="mt-1 text-3xl font-extrabold text-slate-800">
            Edit User
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Update account information and access permissions.
        </p>
    </div>


    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="rounded-xl border border-rose-200 bg-rose-50 p-4">
            <p class="font-semibold text-rose-700">
                Please review the following errors:
            </p>

            <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-rose-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Edit User Form --}}
    <form action="{{ route('super-admin.users.update', $user) }}"
          method="POST"
          class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">

        @csrf
        @method('PUT')

        {{-- Form Header --}}
        <div class="border-b border-slate-100 px-6 py-5 sm:px-8">
            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-100 text-lg font-bold text-sky-600">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div>
                    <h2 class="font-bold text-slate-800">
                        Account Information
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        User ID: #{{ $user->id }}
                    </p>
                </div>

            </div>
        </div>


        {{-- Form Fields --}}
        <div class="space-y-6 p-6 sm:p-8">

            {{-- Full Name --}}
            <div>
                <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                    Full Name <span class="text-rose-500">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    placeholder="Enter full name"
                    required
                    maxlength="255"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:ring-2 focus:ring-sky-100 @error('name') border-rose-400 @enderror"
                >

                @error('name')
                    <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>


            {{-- Email Address --}}
            <div>
                <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                    Email Address <span class="text-rose-500">*</span>
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    placeholder="example@email.com"
                    required
                    maxlength="255"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:ring-2 focus:ring-sky-100 @error('email') border-rose-400 @enderror"
                >

                @error('email')
                    <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>


            {{-- Account Role --}}
            <div>
                <label for="role" class="mb-2 block text-sm font-semibold text-slate-700">
                    Account Role <span class="text-rose-500">*</span>
                </label>

                <select
                    id="role"
                    name="role"
                    required
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100 @error('role') border-rose-400 @enderror"
                >
                    <option value="">Select account role</option>

                    <option value="super_admin"
                        {{ old('role', $user->role) === 'super_admin' ? 'selected' : '' }}>
                        Super Admin
                    </option>

                    <option value="student"
                        {{ old('role', $user->role) === 'student' ? 'selected' : '' }}>
                        Student
                    </option>

                    <option value="organizer"
                        {{ old('role', $user->role) === 'organizer' ? 'selected' : '' }}>
                        Organizer
                    </option>
                </select>

                @error('role')
                    <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                @enderror

                <p class="mt-2 text-xs text-slate-400">
                    Changing the role will update the user's platform access.
                </p>
            </div>


            {{-- Password Section --}}
            <div class="border-t border-slate-100 pt-6">

                <h3 class="font-bold text-slate-800">
                    Change Password
                </h3>

                <p class="mt-1 text-xs text-slate-400">
                    Leave these fields empty to keep the current password.
                </p>

            </div>


            {{-- New Password --}}
            <div>
                <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                    New Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter new password"
                    minlength="8"
                    autocomplete="new-password"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:ring-2 focus:ring-sky-100 @error('password') border-rose-400 @enderror"
                >

                @error('password')
                    <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>


            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">
                    Confirm New Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Re-enter new password"
                    minlength="8"
                    autocomplete="new-password"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                >
            </div>


            {{-- Account Information --}}
            <div class="rounded-xl bg-slate-50 p-4">
                <div class="grid gap-3 sm:grid-cols-2">

                    <div>
                        <p class="text-xs font-medium text-slate-400">
                            Account Created
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $user->created_at?->format('d M Y, H:i') ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-slate-400">
                            Last Updated
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $user->updated_at?->format('d M Y, H:i') ?? '-' }}
                        </p>
                    </div>

                </div>
            </div>

        </div>


        {{-- Form Actions --}}
        <div class="flex flex-col-reverse justify-end gap-3 border-t border-slate-100 bg-slate-50/70 px-6 py-5 sm:flex-row sm:px-8">

            <a href="{{ route('super-admin.users.index') }}"
               class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                Cancel
            </a>

            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-6 py-3 text-sm font-bold text-white shadow-md shadow-sky-100 transition hover:bg-sky-600">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>

                Save Changes
            </button>

        </div>

    </form>

</div>

@endsection
