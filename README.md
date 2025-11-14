# 🚀 Sistema de Gestión de Pasantías Salesiana de Bolivia con Laravel 12

Este proyecto está desarrollado con **Laravel 12**, utilizando **Breeze** como sistema de autenticación, **Volt** como motor de componentes modernos, **Livewire** para la interactividad sin recargar la página y **Tailwind CSS** para los estilos.
////////////////El presente proyecto se encargara de gestionar las pasantias de los estudiante de la universidad salesiana de bolivia de la carrera de ingenieria de sistemas optimizando el tiempo de postulacion y t5ambien optimizando el uso de papeles //////////////
---

## 📋 Requisitos Previos

Asegúrate de tener instaladas las siguientes herramientas antes de iniciar:

- **PHP >= 8.2**
- **Composer** → [https://getcomposer.org/](https://getcomposer.org/)
- **Node.js >= 18.x** y **npm** (o Yarn)
- **MySQL / MariaDB**
- **Git**
- **Sugerencia: instalar xampp**

---

## ⚙️ Instalación del Proyecto

### 1️⃣ Clonar el Repositorio

```bash
git clone https://github.com/walesp3982/sistema-pasantias-usb.git
cd sistema-pasantias-usb
````

### 2️⃣ Instalar Dependencias de PHP

```bash
composer install
```

### 3️⃣ Instalar Dependencias de Frontend

```bash
npm install
```

### 4️⃣ Configurar el Archivo `.env`

Copia el archivo de entorno de ejemplo y configura tus credenciales:

```bash
cp .env.example .env
```

Edita `.env` con tu configuración local:

```env
APP_NAME="Mi Aplicación Laravel"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_bd
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🔑 Generar la Clave de la Aplicación

```bash
php artisan key:generate
```

---

## 🧱 Ejecutar Migraciones y Seeders

Crea las tablas de la base de datos y, si existen, los datos iniciales:

```bash
php artisan migrate --seed
```

---

## 🧩 Compilar los Assets Frontend

Para desarrollo:

```bash
npm run dev
```

Para producción:

```bash
npm run build
```
Nota usar esto solo para cuando el proyecto esté en 
producción
---

## 💻 Ejecutar el Servidor Local

Inicia el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

Tu aplicación estará disponible en:
👉 [http://localhost:8000](http://localhost:8000)

---

## ⚡ Comandos importantes

- php artisan migrate:fresh --seed

---
## ⚡ Características del Proyecto

✅ **Laravel 12** — Framework PHP moderno y robusto
✅ **Breeze** — Autenticación simple y lista para usar
✅ **Volt** — Motor de componentes reactivos de Laravel (basado en Livewire 3)
✅ **Livewire** — Interactividad sin JavaScript manual
✅ **Tailwind CSS** — Framework CSS utility-first
✅ **Vite** — Compilación rápida de assets

---

## 🧩 Estructura Principal del Proyecto

```
app/
 ├── Livewire/          → Componentes Livewire y Volt
 ├── Models/            → Modelos de Eloquent
 ├── Http/Controllers/  → Controladores de la aplicación
 |-- Repositories       → Repositorios 
 |-- Services           → Servicios de la aplicación
database/
 ├── migrations/        → Migraciones de base de datos
 ├── seeders/           → Datos iniciales
resources/
 ├── views/             → Vistas Blade
 ├── livewire/          → Componentes Livewire
 ├── js/                → Código JavaScript
 ├── css/               → Estilos 
routes/
 ├── web.php            → Rutas web
public/                 → Archivos públicos
```

---

## ⚙️ Comandos Útiles

| Acción                                      | Comando                                  |
| ------------------------------------------- | ---------------------------------------- |
| Limpiar cachés de la app                    | `php artisan optimize:clear`             |
| Compilar vistas, rutas y config             | `php artisan optimize`                   |
| Crear un nuevo componente Volt              | `php artisan make:volt NombreComponente` |

---

## 🧩 Autenticación con Breeze

El sistema de autenticación está manejado por **Laravel Breeze**, el cual incluye:

* Registro de usuarios
* Inicio y cierre de sesión
* Recuperación de contraseña
* Verificación de email (opcional)
* Diseño con **Tailwind CSS**

---

## 📦 Despliegue en Producción

Antes de subir el proyecto, asegúrate de ejecutar:

```bash
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

Configura el servidor web (Apache o Nginx) apuntando al directorio `public/`.

---
