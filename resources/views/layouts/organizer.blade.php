@extends('layouts.app')

@section('body')

    <div class="min-h-screen bg-sky-50/60 lg:flex">

        {{-- Sidebar --}}
        <aside class="hidden w-64 shrink-0 lg:block">
            <div class="sticky top-0 h-screen">
                @include('components.partials.sidebar.sidebar-organizer')
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex min-w-0 flex-1 flex-col">

            @include('components.partials.navbar', ['variant' => 'dashboard'])

            <main class="w-full flex-1 p-5 sm:p-8 lg:p-10">

                <div class="mx-auto max-w-[1440px]">
                    @yield('content')
                </div>

            </main>

            <footer class="border-t border-sky-100 bg-white px-6 py-4">
                <p class="text-center text-xs text-slate-400">
                    © {{ date('Y') }} CareerBridge. Organizer Portal.
                </p>
            </footer>

        </div>

    </div>

@endsection
