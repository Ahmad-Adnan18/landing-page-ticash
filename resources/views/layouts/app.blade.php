<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>ticash</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Tingkatkan efisiensi, transparansi, dan profitabilitas pesantren Anda dengan sistem transaksi digital ticash. Model wakaf, rendah biaya.">
    <meta name="keywords" content="ticash, pesantren, cashless, digital payment, wakaf, sistem keuangan pesantren">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicon dari folder images -->
    <link rel="shortcut icon" href="{{ asset('images/logo-ticash.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('images/logo-ticash.png') }}" type="image/png">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Heroicons via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/heroicons@2.0.18/outline/index.min.js"></script>
</head>
<body class="font-sans antialiased bg-white">
    <div class="min-h-screen">
        @yield('content')
    </div>
</body>
</html>
