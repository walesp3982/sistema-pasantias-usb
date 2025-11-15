<x-app-layout>

    <form>
        <div class="bg-white shadow-md rounded-xl px-10 pt-8 pb-8 w-full max-w-5xl md:px-20">
            <h1 class="text-2xl font-semibold border-y-4 border-sky-500 text-center pb-3 mb-6">
                ACTUALIZACIÓN DE DATOS
            </h1>

            <!-- Avatar -->
            <div class="flex items-center space-x-6 mb-8 pl-2">

                <!-- La imagen ahora abre el selector -->
                <label for="avatarInput" class="cursor-pointer">
                    <img id="avatar" src="https://i.pinimg.com/736x/d9/7b/bb/d97bbb08017ac2309307f0822e63d082.jpg"
                        class="w-24 h-24 rounded-full object-cover border">
                </label>

                <div>
                    <label class="block text-sm font-medium text-blue-600 mb-1">
                        Toque la imagen para cambiar foto de perfil*
                    </label>

                    <input id="avatarInput" type="file" accept="image/*" class="hidden">
                </div>
            </div>


            <!-- Datos personales -->
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Datos Personales</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-600 text-sm">Apellido Paterno</label>
                    <p>(Apellido P)</p>
                </div>
                <div>
                    <label class="block text-gray-600 text-sm">Apellido Materno</label>
                    <p> (Apellido M) </p>
                </div>
                <div>
                    <label class="block text-gray-600 text-sm">Nombre(s)</label>
                    <p> (Nombres) </p>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm">Fecha de nacimiento</label>
                    <p> 00/00/00 </p>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm">Carrera</label>
                    <p> (Dato carrera)</p>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm">Semestre</label>
                    <p>(Dato semestre)</p>
                </div>

            </div>

            <!-- Contacto -->
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Contacto</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-600 text-sm">Teléfono de referencia</label>
                    <input type="text" id="telefonoFijo" class="w-full border rounded-lg px-3 py-2 mt-1"
                        value="00000000" required>
                </div>
                <div>
                    <label class="block text-gray-600 text-sm">Teléfono celular</label>
                    <input type="text" id="telefonoCel" class="w-full border rounded-lg px-3 py-2 mt-1"
                        value="000000000" required>
                </div>
            </div>



            <!-- direccion -->

            <h2 class="text-lg font-semibold text-gray-700 mb-3"> Dirección</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-600 text-sm">Calle/Puerta</label>
                    <input type="text" id="calle" class="w-full border rounded-lg px-3 py-2 mt-1" value="C/ lorem N°0"
                        required>
                </div>
                <div>
                    <label class="block text-gray-600 text-sm">Zona</label>
                    <input type="text" id="zona" class="w-full border rounded-lg px-3 py-2 mt-1" value="000000000"
                        required>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm">Ciudad / Municipio</label>
                    <select id="ciudad" class="w-full border rounded-lg px-3 py-2 mt-1">
                        <option>La paz</option>
                        <option>El alto</option>
                        <option>Viacha</option>
                        <option>Camiri</option>
                        <option>Yacuiba</option>
                        <option>Otra</option>
                    </select>
                </div>
            </div>

            <!--Email-->
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Email</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                <i class="bx  bx-eye-slash  absolute mt-8 pl-80 ml-20 cursor-pointer"></i>
                <div>
                    <label class="block text-gray-600 text-sm">Email Institucional</label>
                    <input type="email" id="Email" class="w-full border rounded-lg px-3 py-2 mt-1"
                        value="0@usalesiana.edu.bo" pattern="[a-zA-Z0-9.]+@usalesiana\.edu\.bo$"
                        placeholder="@usalesiana.edu.bo" required>
                </div>
                <!-- Icono ojo -->
                <div class="relative w-full">
                    <label class="block text-gray-600 text-sm mb-1">Contraseña</label>
                    <input type="password" id="contraseña" class="w-full border rounded-lg px-3 py-2 pr-10 mt-1"
                        required>
                    <i id="togglePassword"
                        class="bx bx-eye-slash absolute right-3 mt-6 transform -translate-y-1/2      cursor-pointer text-gray-400"></i>
                </div>

            </div>

            <!-- Botón -->
            <div class="text-center">
                <button id="guardarBtn"
                    class="mt-30 px-6 py-2 bg-blue-600 hover:scale-105 duration-300 text-white rounded-lg">
                    Actualizar Datos
                </button>
            </div>
        </div>

    </form>
</x-app-layout>
