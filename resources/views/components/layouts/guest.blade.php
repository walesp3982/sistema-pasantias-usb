<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">

    <x-navigation.navbar.guest></x-navigation.navbar.guest>

    <section class="flex items-center justify-center bg-gray-100 min-h-screen">
        <div class="flex flex-col lg:flex-row w-full max-w-5xl bg-white rounded-3xl shadow-lg">
            <div class="flex justify-center items-center w-full lg:w-1/2 p-8 md:p-12">
                <div class="w-full max-w-md">
                    {{ $slot }}
                </div>
            </div>


            <!-- Panel Derecho: Misión y Visión -->
            <div
                class="hidden lg:flex items-center justify-center w-1/2 bg-gradient-to-br from-blue-600 to-blue-800 text-white p-10">
                <div>
                    <h4 class="text-2xl font-semibold mb-4">Misión</h4>
                    <p class="text-sm mb-6">
                        Formar profesionales competentes, buenos cristianos y honrados ciudadanos,
                        contribuyendo al desarrollo social y cultural del país.
                    </p>
                    <h4 class="text-2xl font-semibold mb-4">Visión</h4>
                    <p class="text-sm">
                        Ser reconocida como una institución educativa de excelencia y formación humana,
                        un centro de referencia académica, espiritual y cultural.
                    </p>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
