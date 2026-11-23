@extends('layouts.app')

@section('body')

<div class="min-h-screen bg-[#F5FAFE] lg:flex">

    {{-- Sidebar --}}
    <aside class="hidden w-64 shrink-0 lg:block">
        <div class="sticky top-0 h-screen">
            @include('components.partials.sidebar.sidebar-super-admin')
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex min-w-0 flex-1 flex-col">

        {{-- Navbar --}}
        <div class="border-b border-slate-100 bg-white">
            @include('components.partials.navbar', ['variant' => 'dashboard'])
        </div>

        {{-- Page Content --}}
        <main class="w-full flex-1 px-5 py-7 sm:px-8 sm:py-9 lg:px-10">

            <div class="mx-auto max-w-[1440px]">
                @yield('content')
            </div>

        </main>

        {{-- Footer --}}
        <footer class="border-t border-slate-100 bg-white px-6 py-5">
            <p class="text-center text-xs text-slate-400">
                © {{ date('Y') }} CareerBridge. Administration Panel.
            </p>
        </footer>

    </div>

</div>

@endsection
