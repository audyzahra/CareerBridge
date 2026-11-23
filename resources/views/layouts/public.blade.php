@extends('layouts.app')

@section('body')

    <div class="min-h-screen flex flex-col bg-white">

        @include('components.partials.navbar', ['variant' => 'public'])

        <main class="flex-1">
            @yield('content')
        </main>

        @include('components.partials.footer')

    </div>

@endsection
