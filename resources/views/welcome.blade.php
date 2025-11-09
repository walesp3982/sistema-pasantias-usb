<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Pasantías USB</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
    <x-landing.navbar>
    </x-landing.navbar>
    <x-landing.hero></x-landing.hero>
    <x-landing.beneficios></x-landing.beneficios>
    <x-landing.caracteristicas></x-landing.caracteristicas>
    <x-landing.citas></x-landing.citas>
    <x-landing.testimonios></x-landing.testimonios>
    <x-landing.contacto></x-landing.contacto>
    <x-landing.footer></x-landing.footer>
</body>

</html>