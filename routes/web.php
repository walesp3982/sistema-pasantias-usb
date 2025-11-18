<?php

use App\Enums\RolesEnum;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('imagenes/private/{id}', [ImageController::class, 'show'])
        ->name('private.image');
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::view('configuracion', 'config')->name('config');
    Route::view('pasantias', 'estudiante.pasantias')->name('search.intership');
});

Route::middleware(['auth', 'role:' . RolesEnum::CAREER->value])
    ->group(function () {
        Route::view('interships', 'career-departament.intership')->name('career.intership');
        Route::view('students', 'career-departament.students')->name('career.students');
    });

Route::post('register/send', [StudentController::class, "create"])
    ->name('register.student.send');
// Route::get('test', function () {
//     return $asdf;
// });
// Creando rutas para pruebas
Route::view('prueba', 'prueba');
require __DIR__ . '/auth.php';
