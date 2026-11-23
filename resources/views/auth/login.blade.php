@extends('layouts.app')

@section('title', 'Login - CareerBridge')

@section('body')
<div class="min-h-screen bg-white flex items-center justify-center px-4 py-12 relative overflow-hidden">

    {{-- Background Decorations --}}
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-sky-100 rounded-full blur-3xl opacity-70"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-cyan-100 rounded-full blur-3xl opacity-70"></div>

    <div class="relative z-10 w-full max-w-6xl grid lg:grid-cols-2 bg-white rounded-3xl shadow-xl shadow-sky-100/60 overflow-hidden border border-sky-50">

        {{-- LEFT SECTION --}}
        <div class="hidden lg:flex flex-col justify-between bg-gradient-to-br from-sky-400 via-cyan-400 to-teal-300 p-12 text-white relative overflow-hidden">

            {{-- Decorative Circles --}}
            <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full border-[40px] border-white/10"></div>
            <div class="absolute bottom-10 -left-16 w-56 h-56 rounded-full border-[30px] border-white/10"></div>

            <div class="relative z-10">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="text-3xl font-extrabold tracking-tight">
                    Career<span class="text-emerald-100">Bridge</span>
                </a>

                {{-- Hero Content --}}
                <div class="mt-24">

                    <span class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-medium backdrop-blur">
                        <span class="w-2 h-2 rounded-full bg-emerald-200"></span>
                        Your Career Journey Starts Here
                    </span>

                    <h1 class="mt-7 text-5xl font-bold leading-tight">
                        Connect Your Skills.
                        <br>
                        Build Your Future.
                    </h1>

                    <p class="mt-6 max-w-md text-lg leading-relaxed text-white/90">
                        Temukan peluang beasiswa, magang, dan kompetisi yang sesuai dengan potensi serta kemampuanmu.
                    </p>

                </div>
            </div>

            {{-- Bottom Content --}}
            <div class="relative z-10">
                <div class="flex items-center gap-3">

                    <div class="flex -space-x-3">
                        <div class="w-10 h-10 rounded-full bg-white/90 border-2 border-white flex items-center justify-center text-sky-500 font-bold">
                            C
                        </div>

                        <div class="w-10 h-10 rounded-full bg-emerald-100 border-2 border-white flex items-center justify-center text-emerald-600 font-bold">
                            B
                        </div>

                        <div class="w-10 h-10 rounded-full bg-cyan-100 border-2 border-white flex items-center justify-center text-cyan-600 font-bold">
                            +
                        </div>
                    </div>

                    <p class="text-sm text-white/90">
                        Discover opportunities. Grow together.
                    </p>

                </div>
            </div>

        </div>


        {{-- RIGHT SECTION: LOGIN FORM --}}
        <div class="flex items-center justify-center px-6 py-12 sm:px-12 lg:px-14">

            <div class="w-full max-w-md">

                {{-- Mobile Logo --}}
                <a href="{{ route('home') }}" class="lg:hidden block text-2xl font-extrabold text-sky-500 mb-10">
                    Career<span class="text-cyan-400">Bridge</span>
                </a>

                {{-- Heading --}}
                <div class="mb-8">

                    <p class="text-sm font-semibold uppercase tracking-widest text-sky-500">
                        Welcome Back
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-slate-800">
                        Login to Your Account
                    </h2>

                    <p class="mt-3 text-sm leading-relaxed text-slate-500">
                        Masuk kembali dan lanjutkan perjalanan kariermu bersama CareerBridge.
                    </p>

                </div>


                {{-- Success Message --}}
                @if (session('success'))
                    <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif


                {{-- Error Message --}}
                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                        {{ $errors->first() }}
                    </div>
                @endif


                {{-- LOGIN FORM --}}
                <form action="{{ route('login.store') }}" method="POST" class="space-y-5">

                    @csrf

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
                            autofocus
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100 @error('email') border-red-400 @enderror"
                        >

                        @error('email')
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
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >

                    </div>


                    {{-- Submit Button --}}
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-gradient-to-r from-sky-400 to-cyan-400 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-sky-200/60 transition hover:-translate-y-0.5 hover:from-sky-500 hover:to-cyan-500 hover:shadow-xl active:translate-y-0"
                    >
                        Login to CareerBridge
                    </button>

                </form>


                {{-- Register Link --}}
                <div class="mt-8 text-center">

                    <p class="text-sm text-slate-500">
                        Belum memiliki akun?

                        <a href="{{ route('register') }}" class="font-bold text-sky-500 hover:text-cyan-500 transition">
                            Daftar sekarang
                        </a>
                    </p>

                </div>


                {{-- Footer --}}
                <div class="mt-10 flex items-center justify-center gap-2 text-xs text-slate-400">

                    <span class="h-px w-10 bg-slate-200"></span>

                    CareerBridge &copy; {{ date('Y') }}

                    <span class="h-px w-10 bg-slate-200"></span>

                </div>

            </div>
        </div>

    </div>
</div>
@endsection
