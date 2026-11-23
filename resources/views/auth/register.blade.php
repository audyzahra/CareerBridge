@extends('layouts.app')

@section('title', 'Register - CareerBridge')

@section('body')
<div class="min-h-screen bg-gradient-to-br from-[#EAF5FF] via-[#F2F8FD] to-white flex items-center justify-center px-4 py-10 sm:py-12 relative overflow-hidden">

    {{-- Background Decorations --}}
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-[#DCEEFF] rounded-full blur-3xl opacity-70"></div>
<div class="absolute -bottom-32 -left-32 w-96 h-96 bg-[#EAF5FF] rounded-full blur-3xl opacity-70"></div>

    <div class="relative z-10 w-full max-w-6xl grid lg:grid-cols-2 bg-white rounded-3xl shadow-xl shadow-slate-200/50 overflow-hidden border border-[#DCEAF5]">

        {{-- LEFT SECTION --}}
        <div class="hidden lg:flex flex-col justify-between bg-gradient-to-br from-[#65B5E8] via-[#65A9D8] to-[#5799CE] p-12 text-white relative overflow-hidden">

            {{-- Decorative Circles --}}
            <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full border-[40px] border-white/10"></div>
            <div class="absolute bottom-10 -left-16 w-56 h-56 rounded-full border-[30px] border-white/10"></div>

            <div class="relative z-10">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="text-3xl font-extrabold tracking-tight">
                    Career<span class="text-[#DCEEFF]">Bridge</span>
                </a>

                {{-- Hero Content --}}
                <div class="mt-24">

                    <span class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-medium backdrop-blur">
                        <span class="w-2 h-2 rounded-full bg-[#DCEEFF]"></span>
                        Start Your Journey
                    </span>

                    <h1 class="mt-7 text-5xl font-bold leading-tight">
                        Every Opportunity
                        <br>
                        Starts With You.
                    </h1>

                    <p class="mt-6 max-w-md text-lg leading-relaxed text-white/90">
                        Bangun koneksi, kembangkan kemampuan, dan temukan peluang terbaik untuk masa depanmu bersama CareerBridge.
                    </p>

                </div>
            </div>

            {{-- Bottom Content --}}
            <div class="relative z-10">

                <div class="rounded-2xl border border-white/20 bg-white/10 p-5 backdrop-blur-sm">

                    <p class="text-lg font-semibold">
                        Your potential deserves an opportunity.
                    </p>

                    <p class="mt-2 text-sm text-white/80">
                        Discover. Connect. Achieve.
                    </p>

                </div>

            </div>

        </div>


        {{-- RIGHT SECTION: REGISTER FORM --}}
        <div class="flex items-center justify-center px-6 py-12 sm:px-12 lg:px-14">

            <div class="w-full max-w-md">

                {{-- Mobile Logo --}}
                <a href="{{ route('home') }}" class="lg:hidden block text-2xl font-extrabold text-[#65A9D8] mb-8">
                    Career<span class="text-[#5799CE]">Bridge</span>
                </a>


                {{-- Heading --}}
                <div class="mb-7">

                    <p class="text-sm font-semibold uppercase tracking-widest text-sky-500">
                        Join CareerBridge
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-slate-800">
                        Create Your Account
                    </h2>

                    <p class="mt-3 text-sm leading-relaxed text-slate-500">
                        Daftar sekarang dan mulai temukan peluang yang sesuai dengan tujuanmu.
                    </p>

                </div>


                {{-- Success Message --}}
                @if (session('success'))
                    <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif


                {{-- Validation Errors --}}
                @if ($errors->any())

                    <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">

                        <p class="font-semibold mb-2">
                            Pendaftaran belum berhasil.
                        </p>

                        <ul class="list-disc pl-5 space-y-1">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- REGISTER FORM --}}
                <form action="{{ route('register.store') }}" method="POST" class="space-y-4">

                    @csrf

                    {{-- Full Name --}}
                    <div>

                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            autocomplete="name"
                            required
                            class="w-full rounded-xl border border-[#DCEAF5] bg-[#F2F8FD] px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#65A9D8] focus:bg-white focus:ring-4 focus:ring-[#EAF5FF] @error('name') border-red-400 @enderror"
                        >

                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- Email --}}
                    <div>

                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            autocomplete="email"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100 @error('email') border-red-400 @enderror"
                        >

                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- Account Type --}}
                    <div>

                        <label for="role" class="block text-sm font-semibold text-slate-700 mb-2">
                            Jenis Akun
                        </label>

                        <select
                            id="role"
                            name="role"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100 @error('role') border-red-400 @enderror"
                        >

                            <option value="" disabled {{ old('role') ? '' : 'selected' }}>
                                Pilih jenis akun
                            </option>

                            <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>
                                Student
                            </option>

                            <option value="organizer" {{ old('role') === 'organizer' ? 'selected' : '' }}>
                                Organizer
                            </option>

                        </select>

                        <p class="mt-2 text-xs text-slate-400">
                            Pilih jenis akun sesuai dengan kebutuhanmu.
                        </p>

                        @error('role')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- Password --}}
                    <div>

                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100 @error('password') border-red-400 @enderror"
                        >

                        <p class="mt-2 text-xs text-slate-400">
                            Minimal 8 karakter, terdiri dari huruf dan angka.
                        </p>

                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- Confirm Password --}}
                    <div>

                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2">
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Masukkan ulang password"
                            autocomplete="new-password"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >

                    </div>


                    {{-- Submit Button --}}
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-gradient-to-r from-[#65B5E8] to-[#5799CE] px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#DCEEFF] transition hover:-translate-y-0.5 hover:from-[#65A9D8] hover:to-[#5799CE] hover:shadow-xl active:translate-y-0"
                    >
                        Create Account
                    </button>

                </form>


                {{-- Login Link --}}
                <div class="mt-7 text-center">

                    <p class="text-sm text-slate-500">
                        Sudah memiliki akun?

                        <a
                            href="{{ route('login') }}"
                             class="font-bold text-[#5799CE] hover:text-[#478FC2] transition"
                        >
                            Login di sini
                        </a>

                    </p>

                </div>


                {{-- Footer --}}
                <div class="mt-9 flex items-center justify-center gap-2 text-xs text-slate-400">

                    <span class="h-px w-10 bg-[#DCEAF5]"></span>

                    CareerBridge &copy; {{ date('Y') }}

                    <span class="h-px w-10 bg-[#DCEAF5]"></span>

                </div>

            </div>
        </div>

    </div>
</div>
@endsection
