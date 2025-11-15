<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalización de Formulario</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 min-h-screen py-12 px-4">

<div x-data="{ alertType: 'info', showAlert: true }" class="max-w-4xl mx-auto">

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h1 class="text-3xl font-bold text-blue-600 mb-2">Finalización del Formulario</h1>
        <p class="text-gray-600">Notificaciones de diferentes tipos de formularios</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-4 mb-6">
        @include('alerts.info', ['title' => 'Información con un ícono'])
        @include('alerts.success', ['title' => 'Éxito con un ícono'])
        @include('alerts.warning', ['title' => 'Alerta de advertencia con un ícono'])
        @include('alerts.danger', ['title' => 'Peligro con un icono'])
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-blue-600 mb-4">Notificaciones</h2>
        
        <div x-show="showAlert" x-transition class="mb-4">
            <div x-show="alertType === 'success'">
                @include('alerts.success', [
                    'title' => '¡Formulario enviado correctamente!',
                    'message' => 'Tu información ha sido procesada exitosamente.'
                ])
            </div>

            <div x-show="alertType === 'error'">
                @include('alerts.error', [
                    'title' => 'Error al enviar el formulario',
                    'message' => 'Verifica los datos e intenta nuevamente.'
                ])
            </div>

            <div x-show="alertType === 'warning'">
                @include('alerts.warning', [
                    'title' => 'Atención requerida',
                    'message' => 'Algunos campos necesitan ser revisados.'
                ])
            </div>

            <div x-show="alertType === 'info'">
                @include('alerts.info', [
                    'title' => 'Información importante',
                    'message' => 'Recuerda guardar tus cambios antes de salir.'
                ])
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <button @click="alertType = 'success'; showAlert = true"
                class="bg-green-600 text-white px-5 py-2.5 rounded-lg shadow-md hover:bg-green-700 transition font-medium">
                <i class="fas fa-check mr-2"></i>Mostrar Éxito
            </button>

            <button @click="alertType = 'error'; showAlert = true"
                class="bg-red-600 text-white px-5 py-2.5 rounded-lg shadow-md hover:bg-red-700 transition font-medium">
                <i class="fas fa-times mr-2"></i>Mostrar Error
            </button>

            <button @click="alertType = 'warning'; showAlert = true"
                class="bg-yellow-500 text-white px-5 py-2.5 rounded-lg shadow-md hover:bg-yellow-600 transition font-medium">
                <i class="fas fa-exclamation-triangle mr-2"></i>Mostrar Advertencia
            </button>

            <button @click="alertType = 'info'; showAlert = true"
                class="bg-blue-600 text-white px-5 py-2.5 rounded-lg shadow-md hover:bg-blue-700 transition font-medium">
                <i class="fas fa-info mr-2"></i>Mostrar Info
            </button>
        </div>
    </div>

    <div class="text-center mt-8 text-gray-600">
        <p class="text-sm">Sistema de Notificaciones - Formulario</p>
    </div>

</div>

</body>
</html>