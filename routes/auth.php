<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register/student', 'forms.student-form')
        ->name('register.student');

    Volt::route('register/company', 'forms.company-form')
        ->name('register.company');
    Volt::route('login', 'pages.auth.login')
        ->name('login');
    Volt::route('internship', 'forms.internship-form');
    Volt::route('postulation', "forms.postulation-form");
    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware(['auth', 'role:agreements-departament'])->group(
    function() {
        Volt::route('internship/create', 'forms.postulations-form')
            ->name("forms.postulations");
    }
);
Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
