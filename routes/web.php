<?php

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

Route::middleware('role:student')->group(function () {
    Route::view('configuracion', 'config')->name('config');
    Route::view('pasantias', 'estudiante.pasantias')->name('search.intership');
});

Route::post('register/send', [StudentController::class, "create"])
    ->name('register.student.send');
// Route::get('test', function () {
//     return $asdf;
// });
require __DIR__ . '/auth.php';
