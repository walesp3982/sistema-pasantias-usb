<x-app-layout>
    <section class="bg-white rounded-xl p-10 shadow-lg text-center md:p-20">

        <h2 class="text-blue-600 text-2xl font-semibold mb-4">Bienvenido al Sistema Web de Control de Pasantías
        </h2>
        <p class="text-gray-500 mt-2.5 text-base">
            Este sistema permite gestionar el proceso de pasantías universitarias,
            facilitando el registro de estudiantes, la asignación de tutores, la revisión de informes
            y la generación de reportes institucionales.
        </p>

        <div class="grid grid-cols-[repeat(auto-fit,minmax(220px,1fr))] gap-5 mt-8">
            <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                <i class="fa-solid fa-user-graduate text-4xl text-blue-600 mb-2.5"></i>
                <h3 class="text-gray-800 mb-2.5 font-semibold">Estudiantes</h3>
                <p class="text-gray-500 text-sm">Registro y seguimiento académico de pasantes.</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                <i class="fa-solid fa-chalkboard-user text-4xl text-blue-600 mb-2.5"></i>
                <h3 class="text-gray-800 mb-2.5 font-semibold">Tutores</h3>
                <p class="text-gray-500 text-sm">Asignación y control de tutores supervisores.</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                <i class="fa-solid fa-file-lines text-4xl text-blue-600 mb-2.5"></i>
                <h3 class="text-gray-800 mb-2.5 font-semibold">Informes</h3>
                <p class="text-gray-500 text-sm">Revisión, validación y control documental.</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                <i class="fa-solid fa-list-check text-4xl text-blue-600 mb-2.5"></i>
                <h3 class="text-gray-800 mb-2.5 font-semibold">Seguimiento</h3>
                <p class="text-gray-500 text-sm">Monitoreo del progreso de cada pasante.</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                <i class="fa-solid fa-chart-line text-4xl text-blue-600 mb-2.5"></i>
                <h3 class="text-gray-800 mb-2.5 font-semibold">Reportes</h3>
                <p class="text-gray-500 text-sm">Generación de reportes y estadísticas del sistema.</p>
            </div>
        </div>
    </section>

</x-app-layout>