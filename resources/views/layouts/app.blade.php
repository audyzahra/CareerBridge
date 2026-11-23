<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'CareerBridge')</title>
    <meta name="description" content="@yield('meta_description', 'CareerBridge - Hubungkan potensi dan keterampilanmu dengan berbagai peluang karier.')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="min-h-screen bg-white font-sans text-slate-800 antialiased">

    @yield('body')

    @stack('scripts')

</body>
</html>
