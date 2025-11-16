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
        <x-ui.notif.warning dismissible>
            Ha ocurrido un error inesperado.
        </x-ui.notif.warning>
        <x-ui.notif.error dismissible>
            Por favor, contacte al administrador del sistema para obtener ayuda.
        </x-ui.notif.error>
        <x-ui.notif.danger dismissible>
            Por favor, contacte al administrador del sistema para obtener ayuda.
        </x-ui.notif.danger>
        <x-ui.notif.success dismissible>
            Se completó el formulario
        </x-ui.notif.success>
        <x-ui.notif.info dismissible>
            Nueva actualización disponible
        </x-ui.notif.info>
    </div>

</body>

</html>