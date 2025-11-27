<x-app-layout>
    <div class="container mx-auto px-4 py-8" x-data="dashboard()">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard de Dirección de Carrera</h1>
            <p class="text-gray-600">Estadísticas y métricas de estudiantes y pasantías</p>
        </div>

        <!-- Tarjetas de Métricas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
            <!-- Pasantes Activos -->
            <div
                class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">45</div>
                        <div class="text-sm text-gray-500">Pasantes activos</div>
                    </div>
                </div>
            </div>

            <!-- Estudiantes Activos -->
            <div
                class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">320</div>
                        <div class="text-sm text-gray-500">Estudiantes activos</div>
                    </div>
                </div>
            </div>

            <!-- Pasantías Recibidas -->
            <div
                class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-briefcase text-purple-600 text-xl"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">28</div>
                        <div class="text-sm text-gray-500">Pasantías recibidas</div>
                    </div>
                </div>
            </div>

            <!-- Informes Creados -->
            <div
                class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-alt text-yellow-600 text-xl"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">156</div>
                        <div class="text-sm text-gray-500">Informes creados</div>
                    </div>
                </div>
            </div>

            <!-- Postulaciones Mandadas -->
            <div
                class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-paper-plane text-red-600 text-xl"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">89</div>
                        <div class="text-sm text-gray-500">Postulaciones mandadas</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficos -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Gráfico de Estudiantes por Turno -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 sm:mb-0">Distribución de Estudiantes por Turno
                    </h3>
                    <div class="flex space-x-2">
                        <button @click="cambiarTipoGrafico('estudiantes', 'barra')"
                            :class="tipoGraficoEstudiantes === 'barra' ? 
                                'bg-blue-600 text-white' : 
                                cambiandoGrafico ? 'bg-gray-300 btn-disabled' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center"
                            :disabled="cambiandoGrafico">
                            <i class="fas fa-chart-bar mr-2"></i>
                            Barras
                        </button>
                        <button @click="cambiarTipoGrafico('estudiantes', 'pastel')"
                            :class="tipoGraficoEstudiantes === 'pastel' ? 
                                'bg-blue-600 text-white' : 
                                cambiandoGrafico ? 'bg-gray-300 btn-disabled' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center"
                            :disabled="cambiandoGrafico">
                            <i class="fas fa-chart-pie mr-2"></i>
                            Pastel
                        </button>
                    </div>
                </div>
                <div class="chart-container fade-in">
                    <canvas id="graficoEstudiantes"></canvas>
                </div>
            </div>

            <!-- Gráfico de Pasantías por Mes -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 sm:mb-0">Pasantías por Mes</h3>
                    <div class="flex space-x-2">
                        <button @click="cambiarTipoGrafico('pasantias', 'barra')"
                            :class="tipoGraficoPasantias === 'barra' ? 
                                'bg-blue-600 text-white' : 
                                cambiandoGrafico ? 'bg-gray-300 btn-disabled' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center"
                            :disabled="cambiandoGrafico">
                            <i class="fas fa-chart-bar mr-2"></i>
                            Barras
                        </button>
                        <button @click="cambiarTipoGrafico('pasantias', 'pastel')"
                            :class="tipoGraficoPasantias === 'pastel' ? 
                                'bg-blue-600 text-white' : 
                                cambiandoGrafico ? 'bg-gray-300 btn-disabled' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center"
                            :disabled="cambiandoGrafico">
                            <i class="fas fa-chart-pie mr-2"></i>
                            Pastel
                        </button>
                    </div>
                </div>
                <div class="chart-container fade-in">
                    <canvas id="graficoPasantias"></canvas>
                </div>
            </div>

            <!-- Gráfico de Postulaciones por Estado -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 sm:mb-0">Estado de Postulaciones</h3>
                    <div class="flex space-x-2">
                        <button @click="cambiarTipoGrafico('postulaciones', 'barra')"
                            :class="tipoGraficoPostulaciones === 'barra' ? 
                                'bg-blue-600 text-white' : 
                                cambiandoGrafico ? 'bg-gray-300 btn-disabled' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center"
                            :disabled="cambiandoGrafico">
                            <i class="fas fa-chart-bar mr-2"></i>
                            Barras
                        </button>
                        <button @click="cambiarTipoGrafico('postulaciones', 'pastel')"
                            :class="tipoGraficoPostulaciones === 'pastel' ? 
                                'bg-blue-600 text-white' : 
                                cambiandoGrafico ? 'bg-gray-300 btn-disabled' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center"
                            :disabled="cambiandoGrafico">
                            <i class="fas fa-chart-pie mr-2"></i>
                            Pastel
                        </button>
                    </div>
                </div>
                <div class="chart-container fade-in">
                    <canvas id="graficoPostulaciones"></canvas>
                </div>
            </div>

            <!-- Gráfico de Informes por Tipo -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 sm:mb-0">Tipos de Informes Creados</h3>
                    <div class="flex space-x-2">
                        <button @click="cambiarTipoGrafico('informes', 'barra')"
                            :class="tipoGraficoInformes === 'barra' ? 
                                'bg-blue-600 text-white' : 
                                cambiandoGrafico ? 'bg-gray-300 btn-disabled' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center"
                            :disabled="cambiandoGrafico">
                            <i class="fas fa-chart-bar mr-2"></i>
                            Barras
                        </button>
                        <button @click="cambiarTipoGrafico('informes', 'pastel')"
                            :class="tipoGraficoInformes === 'pastel' ? 
                                'bg-blue-600 text-white' : 
                                cambiandoGrafico ? 'bg-gray-300 btn-disabled' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center"
                            :disabled="cambiandoGrafico">
                            <i class="fas fa-chart-pie mr-2"></i>
                            Pastel
                        </button>
                    </div>
                </div>
                <div class="chart-container fade-in">
                    <canvas id="graficoInformes"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboard', () => ({
                // Estado inicial
                tipoGraficoEstudiantes: 'barra',
                tipoGraficoPasantias: 'barra',
                tipoGraficoPostulaciones: 'barra',
                tipoGraficoInformes: 'barra',
                cambiandoGrafico: false,

                // Referencias a los gráficos
                graficoEstudiantes: null,
                graficoPasantias: null,
                graficoPostulaciones: null,
                graficoInformes: null,

                // Datos persistentes
                datosEstudiantes: {
                    labels: ['Mañana', 'Tarde', 'Noche'],
                    valores: [120, 150, 50],
                    colores: ['#3B82F6', '#10B981', '#8B5CF6'],
                    coloresBorde: ['#2563EB', '#059669', '#7C3AED']
                },
                datosPasantias: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                    valores: [8, 12, 15, 10, 18, 22],
                    colores: ['#3B82F6', '#60A5FA', '#93C5FD', '#BFDBFE', '#DBEAFE', '#EFF6FF'],
                    coloresBorde: ['#2563EB', '#3B82F6', '#60A5FA', '#93C5FD', '#BFDBFE', '#DBEAFE']
                },
                datosPostulaciones: {
                    labels: ['Aceptadas', 'Pendientes', 'Rechazadas'],
                    valores: [35, 42, 12],
                    colores: ['#10B981', '#F59E0B', '#EF4444'],
                    coloresBorde: ['#059669', '#D97706', '#DC2626']
                },
                datosInformes: {
                    labels: ['Académicos', 'Pasantías', 'Evaluaciones', 'General'],
                    valores: [65, 45, 30, 16],
                    colores: ['#8B5CF6', '#A78BFA', '#C4B5FD', '#DDD6FE'],
                    coloresBorde: ['#7C3AED', '#8B5CF6', '#A78BFA', '#C4B5FD']
                },

                // Inicialización
                init() {
                    this.$nextTick(() => {
                        setTimeout(() => {
                            this.inicializarGraficos();
                        }, 100);
                    });
                },

                // Inicializar todos los gráficos
                inicializarGraficos() {
                    this.crearGraficoEstudiantes();
                    this.crearGraficoPasantias();
                    this.crearGraficoPostulaciones();
                    this.crearGraficoInformes();
                },

                // Crear gráfico de estudiantes
                crearGraficoEstudiantes() {
                    const ctx = document.getElementById('graficoEstudiantes');
                    if (!ctx) return;

                    // Limpiar completamente el canvas antes de crear nuevo gráfico
                    this.limpiarCanvas(ctx);

                    // Destruir gráfico anterior si existe
                    if (this.graficoEstudiantes) {
                        this.graficoEstudiantes.destroy();
                        this.graficoEstudiantes = null;
                    }

                    const tipo = this.tipoGraficoEstudiantes === 'barra' ? 'bar' : 'pie';

                    this.graficoEstudiantes = new Chart(ctx, {
                        type: tipo,
                        data: this.obtenerDatosGrafico(tipo, this.datosEstudiantes),
                        options: this.obtenerOpcionesGrafico(tipo)
                    });
                },

                // Crear gráfico de pasantías
                crearGraficoPasantias() {
                    const ctx = document.getElementById('graficoPasantias');
                    if (!ctx) return;

                    this.limpiarCanvas(ctx);

                    if (this.graficoPasantias) {
                        this.graficoPasantias.destroy();
                        this.graficoPasantias = null;
                    }

                    const tipo = this.tipoGraficoPasantias === 'barra' ? 'bar' : 'pie';

                    this.graficoPasantias = new Chart(ctx, {
                        type: tipo,
                        data: this.obtenerDatosGrafico(tipo, this.datosPasantias),
                        options: this.obtenerOpcionesGrafico(tipo)
                    });
                },

                // Crear gráfico de postulaciones
                crearGraficoPostulaciones() {
                    const ctx = document.getElementById('graficoPostulaciones');
                    if (!ctx) return;

                    this.limpiarCanvas(ctx);

                    if (this.graficoPostulaciones) {
                        this.graficoPostulaciones.destroy();
                        this.graficoPostulaciones = null;
                    }

                    const tipo = this.tipoGraficoPostulaciones === 'barra' ? 'bar' : 'pie';

                    this.graficoPostulaciones = new Chart(ctx, {
                        type: tipo,
                        data: this.obtenerDatosGrafico(tipo, this.datosPostulaciones),
                        options: this.obtenerOpcionesGrafico(tipo)
                    });
                },

                // Crear gráfico de informes
                crearGraficoInformes() {
                    const ctx = document.getElementById('graficoInformes');
                    if (!ctx) return;

                    this.limpiarCanvas(ctx);

                    if (this.graficoInformes) {
                        this.graficoInformes.destroy();
                        this.graficoInformes = null;
                    }

                    const tipo = this.tipoGraficoInformes === 'barra' ? 'bar' : 'pie';

                    this.graficoInformes = new Chart(ctx, {
                        type: tipo,
                        data: this.obtenerDatosGrafico(tipo, this.datosInformes),
                        options: this.obtenerOpcionesGrafico(tipo)
                    });
                },

                // Obtener datos del gráfico según el tipo
                obtenerDatosGrafico(tipo, datos) {
                    if (tipo === 'bar') {
                        return {
                            labels: datos.labels,
                            datasets: [{
                                label: 'Cantidad',
                                data: datos.valores,
                                backgroundColor: datos.colores,
                                borderColor: datos.coloresBorde,
                                borderWidth: 2
                            }]
                        };
                    } else {
                        return {
                            labels: datos.labels,
                            datasets: [{
                                data: datos.valores,
                                backgroundColor: datos.colores,
                                borderColor: datos.coloresBorde,
                                borderWidth: 2
                            }]
                        };
                    }
                },

                // Obtener opciones del gráfico según el tipo
                obtenerOpcionesGrafico(tipo) {
                    const opcionesBase = {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            duration: 300,
                            easing: 'easeOutQuart'
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    };

                    if (tipo === 'bar') {
                        return {
                            ...opcionesBase,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.05)'
                                    }
                                },
                                x: {
                                    grid: {
                                        display: false
                                    }
                                }
                            }
                        };
                    }

                    return opcionesBase;
                },

                // Limpiar canvas completamente
                limpiarCanvas(canvas) {
                    const context = canvas.getContext('2d');
                    context.clearRect(0, 0, canvas.width, canvas.height);
                    canvas.width = canvas.width; // Reset canvas
                },

                // Cambiar tipo de gráfico con protección contra cambios rápidos
                cambiarTipoGrafico(grafico, tipo) {
                    if (this.cambiandoGrafico) return;

                    this.cambiandoGrafico = true;

                    // Actualizar el estado
                    this[`tipoGrafico${this.capitalizar(grafico)}`] = tipo;

                    // Usar requestAnimationFrame para mejor rendimiento
                    requestAnimationFrame(() => {
                        this[`crearGrafico${this.capitalizar(grafico)}`]();

                        // Permitir cambios nuevamente después de un breve delay
                        setTimeout(() => {
                            this.cambiandoGrafico = false;
                        }, 350);
                    });
                },

                // Capitalizar primera letra
                capitalizar(texto) {
                    return texto.charAt(0).toUpperCase() + texto.slice(1);
                }
            }));
        });
    </script>
</x-app-layout>