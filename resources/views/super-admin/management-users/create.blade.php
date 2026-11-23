@extends('layouts.super-admin')

@section('title', 'Add New User | CareerBridge')

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
            Add New User
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Create a new account and assign its platform role.
        </p>
    </div>


    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="rounded-xl border border-rose-200 bg-rose-50 p-4">
            <div class="flex items-center gap-2 font-semibold text-rose-700">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M12 9v4m0 4h.01M10.3 3.9L1.8 18a2 2 0 001.7 3h17a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/>
                </svg>

                Please review the following errors:
            </div>

            <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-rose-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Create User Form --}}
    <form action="{{ route('super-admin.users.store') }}"
          method="POST"
          class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">

        @csrf

        {{-- Form Header --}}
        <div class="border-b border-slate-100 px-6 py-5 sm:px-8">
            <h2 class="font-bold text-slate-800">
                Account Information
            </h2>

            <p class="mt-1 text-xs text-slate-400">
                Enter the required information to create a user account.
            </p>
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
                    value="{{ old('name') }}"
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
                    value="{{ old('email') }}"
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

                    <option value="super_admin" {{ old('role') === 'super_admin' ? 'selected' : '' }}>
                        Super Admin
                    </option>

                    <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>
                        Student
                    </option>

                    <option value="organizer" {{ old('role') === 'organizer' ? 'selected' : '' }}>
                        Organizer
                    </option>
                </select>

                @error('role')
                    <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                @enderror

                <p class="mt-2 text-xs text-slate-400">
                    The selected role determines the user's access permissions.
                </p>
            </div>


            {{-- Password --}}
            <div>
                <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                    Password <span class="text-rose-500">*</span>
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password (minimum 8 characters)"
                    required
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
                    Confirm Password <span class="text-rose-500">*</span>
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Re-enter password"
                    required
                    minlength="8"
                    autocomplete="new-password"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                >
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
                        stroke-width="2" d="M12 5v14m-7-7h14"/>
                </svg>

                Create User
            </button>

        </div>

    </form>

</div>

@endsection
