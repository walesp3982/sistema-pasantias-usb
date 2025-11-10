<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group( function() {
    Route::get('imagenes/private/{id}', [ImageController::class, 'show'])
        ->name('private.image');
});
// Route::get('test', function () {
//     return $asdf;
// });
require __DIR__.'/auth.php';
