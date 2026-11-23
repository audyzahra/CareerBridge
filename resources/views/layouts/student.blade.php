@extends('layouts.app')

@section('body')

    <div class="min-h-screen flex flex-col bg-white">

        {{-- Navbar Student --}}
        @include('components.partials.navbar', ['variant' => 'public'])

        {{-- Konten Halaman --}}
        <main class="w-full flex-1">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('components.partials.footer')

    </div>

@endsection
