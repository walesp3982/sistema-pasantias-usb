<header class="py-4 sticky top-0 left-0 w-full bg-white  z-20 shadow-md">
    <nav x-data="{open: false}" class="w-full">
        <x-landing.ui.menu>
        </x-landing.ui.menu>
        <!-- Menú móvil -->
        <x-landing.ui.menu-mobile>
            <x-landing.ui.menu-option-mobile href="#inicio">
                Inicio
            </x-landing.ui.menu-option-mobile>
            <x-landing.ui.menu-option-mobile href="#beneficios">
                Beneficios
            </x-landing.ui.menu-option-mobile>
            <x-landing.ui.menu-option-mobile href="#caracteristicas">
                Caracteristicas
            </x-landing.ui.menu-option-mobile>
            <x-landing.ui.menu-option-mobile href="#testimonios">
                Testimonios
            </x-landing.ui.menu-option-mobile>
            {{-- <x-landing.ui.menu-option-mobile href="#contacto">
                Contacto
            </x-landing.ui.menu-option-mobile> --}}
            @auth
                <x-landing.ui.menu-option-important-mobile href="{{ route('dashboard') }}">
                    Ingresar
                </x-landing.ui.menu-option-important-mobile>
            @else
                <x-landing.ui.menu-option-important-mobile href="{{ route('login') }}">
                    Iniciar sesión
                </x-landing.ui.menu-option-important-mobile>
            @endauth

        </x-landing.ui.menu-mobile>
    </nav>

    {{-- <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const line1 = document.getElementById('line1');
        const line2 = document.getElementById('line2');
        const line3 = document.getElementById('line3');
        const menuLinks = mobileMenu.querySelectorAll('a');

        function toggleMenu() {
            const isOpen = mobileMenu.classList.contains('translate-y-0');

            if (isOpen) {
                mobileMenu.style.pointerEvents='none';
                closeMenu();
            } else {
                mobileMenu.style.pointerEvents='auto';
                openMenu();
            }
        }

        function openMenu() {
            mobileMenu.classList.remove('-translate-y-full', 'opacity-0');
            mobileMenu.classList.add('translate-y-0', 'opacity-100');

        }

        function closeMenu() {
            mobileMenu.classList.remove('translate-y-0', 'opacity-100');
            mobileMenu.classList.add('-translate-y-full', 'opacity-0');

            // Animación del botón X a hamburguesa
            line1.style.transform = '';
            line2.style.opacity = '1';
            line3.style.transform = '';
        }

        menuToggle.addEventListener('click', toggleMenu);

        // Cerrar menú al hacer clic en un enlace
        menuLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // Cerrar menú al hacer clic fuera
        document.addEventListener('click', (e) => {
            if (!menuToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                closeMenu();
            }
        });
    </script> --}}
</header>
