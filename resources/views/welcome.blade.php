<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Pasantías USB</title>

    <!-- Fonts -->
    <!-- Styles -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased scroll-smooth">
    <x-landing.navbar>
    </x-landing.navbar>
    <x-landing.hero></x-landing.hero>
    <x-landing.beneficios></x-landing.beneficios>
    <x-landing.caracteristicas></x-landing.caracteristicas>
    <x-landing.citas></x-landing.citas>
    <x-landing.testimonios></x-landing.testimonios>
    {{-- <x-landing.contacto></x-landing.contacto> --}}
    <x-landing.footer></x-landing.footer>
</body>

</html>