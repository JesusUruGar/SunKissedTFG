<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi E-commerce')</title>
    @vite('resources/css/app.css') {{-- si usas vite --}}
</head>
<body class="bg-gray-50 text-gray-900">

    {{-- Navbar global --}}
    @include('partials.navbar')

    {{-- Contenido dinámico --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer global --}}
    @include('partials.footer')

    @vite('resources/js/app.js')
</body>
</html>
