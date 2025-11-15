<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireScripts
    <title>Document</title>
</head>

<body>
    <div class="m-11">
        <x-ui.msg.advertencia title="Errorrrrr" message="Hola mundo" dismissible>
            Ha ocurrido un error inesperado.
        </x-ui.msg.advertencia>
    </div>

</body>

</html>