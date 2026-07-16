<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'PT Tricipta Niaga Sukses - Triscent')</title>
    <meta name="description" content="Mitra terpercaya untuk pengadaan, rental, maintenance, dan distribusi kebutuhan industri.">
    <meta name="keywords" content="Triscent, PT Tricipta Niaga Sukses, perfume dispenser, hygiene sanitary, solusi kemasan">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <style>
        :root {
            --font-brand: 'Plus Jakarta Sans', sans-serif;
        }
        html { font-family: var(--font-brand); }
    </style>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-background text-foreground antialiased bg-[var(--color-surface)]">
    <div class="flex min-h-full flex-col">
        <!-- Site Header -->
        @include('partials.header')

        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>

        <!-- Site Footer -->
        @include('partials.footer')

        <!-- WhatsApp Floating Button -->
        @include('partials.whatsapp-float')
    </div>

    <!-- Global Layout Scripts -->
    <script>
        // Alpine.js atau Vanilla JS global setup bisa dilampirkan di sini juga.
    </script>
</body>
</html>
