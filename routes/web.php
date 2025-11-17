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

Route::middleware(middleware: ['auth','role:student'])->group(callback: function (): void {
    Route::view(uri: 'configuracion', view: 'config')->name('config');
    Route::view(uri: 'postulation', view: 'config')->name('posttulation');
    Route::view(uri: 'gestion-solicitudes', view: 'config')->name('gestion.solicitudes');
    Route::view(uri: 'informes', view: 'config')->name('informes');    
    Route::view(uri: 'pasantias', view: 'estudiante.pasantias')->name('search.intership');
});
Route::middleware(middleware: ['auth','role:carrer-departmen'])->group(callback: function (): void {
    Route::view(uri: 'departamentos', view: 'config')->name('departament');
    Route::view(uri: 'information', view: 'config')->name('information');
    Route::view(uri: 'pasantias', view: 'estudiante.pasantias')->name('search.intership');
});
Route::middleware(middleware: ['auth','role:agreements-departament'])->group(callback: function (): void {
    Route::view(uri: 'convenios', view: 'config')->name('convenios');
    Route::view(uri: 'pasantias', view: 'estudiante.pasantias')->name('search.intership');
});
Route::post('register/send', [StudentController::class, "create"])
    ->name('register.student.send');
// Route::get('test', function () {
//     return $asdf;
// });
require __DIR__ . '/auth.php';
