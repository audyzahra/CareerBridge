@extends('layouts.app')

@section('body')

    <div class="flex min-h-screen flex-col">

        @include('components.partials.navbar', ['variant' => 'public'])

        <main class="flex-1">
            @yield('content')
        </main>

        @include('components.partials.footer')

    </div>

@endsection
