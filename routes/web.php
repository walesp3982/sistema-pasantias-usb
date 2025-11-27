<?php

use App\Enums\RolesEnum;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CareerController;
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
    Route::view('configuracion', 'config')->name('config');
    Route::get('students/{idStudent}', [CareerController::class, "showStudent"])->name('show.student');
});

Route::middleware(['auth', 'role:student'])->group(function () {
    
    Route::get('pasantias', [StudentController::class, "showInternship"])->name('search.internship');
    Route::get("student/postulations", [StudentController::class, "getPostulations"])->name("student.postulations");
    Route::post('student/postulate/{idInternship}', [StudentController::class, "submitInternship"])
        ->name('student.postulate');
    Route::get('postulation/edit/{idPostulation}', [StudentController::class, 'editPostulation'] )->name('postulation.edit');
    Route::post('postulation/upload-documents/{idPostulation}', [StudentController::class, 'uploadDocuments'])
        ->name('student.postulation.upload-documents');
    Route::post('submit/postulation/{postulationId}', [StudentController::class, "sendPostulation"])->name('submit.postulation');
    Route::delete("delete/docPostulation/{idDocument}", [StudentController::class, "deleteDocument"])->name("document.postulation.delete");
});


Route::middleware(['auth', 'role:'.RolesEnum::STUDENT->value.'|'.RolesEnum::CAREER->value])->group(function () {
    Route::get('documentPostulation/{idDocumentPostulation}', [DocumentController::class, "showDocumentPostulation"] )->name('document.postulation.show'); 
});
Route::middleware(['auth', 'role:' . RolesEnum::CAREER->value])
    ->group(function () {
        Route::get('internships', [CareerController::class, "internships"])->name('career.internship');
        Route::view('students', 'career-departament.students')->name('career.students');
        
        Route::delete('students/{idStudent}', [CareerController::class, "deleteStudent"])
            ->name('delete.student');
        Route::get('student/inactive',[CareerController::class, 'getStudentDelete'])->name('students.eliminate');
        Route::post('student/restore/{idStudent}', [CareerController::class, 'restoreStudent'])->name('student.restore');
    });

Route::middleware(['auth', 'role:' . RolesEnum::AGREEMENTS->value])
    ->group(function () {
        Route::view('company', 'agreement-deparment.companies')->name('agreements.company');
        Route::view('company/create', 'agreement-deparment.company-form')->name('create.company');
        // Formulario para crear pasantía para empresa
        Route::get("internship/create/{companyId}", [AgreementController::class, "createInternship"])
            ->name('create.internship');
        Route::get('company/show/{companyId}', [AgreementController::class,'showCompany'])->name('show.company');
        Route::get('showInternship/{idIntership}', [AgreementController::class, 'showInternship'])->name('internship.show');
    });

Route::get('pdf/internship/{internshipId}', [CareerController::class, 'invitationInternship'])
    ->name('pdf.internship');

// Route::get('test', function () {
//     return $asdf;
// });
// Creando rutas para pruebas
Route::view('prueba', 'prueba');
require __DIR__ . '/auth.php';



//PDF Generation
use App\Http\Controllers\pdfController;

Route::get('/pdf/Certificado/{postulationId}', [pdfController::class, 'Certificado'])
    ->name('student.certificado');
Route::get('/pdf/ListaDePostulantes/{internshipId}', [pdfController::class, 'ListaPostulantes'])
    ->name('pdf.postulations');

