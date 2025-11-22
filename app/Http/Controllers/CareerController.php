<?php

namespace App\Http\Controllers;

use App\Service\CompanyService;
use App\Service\StudentService;
use Illuminate\Http\Request;
use Throwable;

class CareerController extends Controller
{
    public function __construct(
        private CompanyService $companyService,
        private StudentService $studentService)
    {
    }
    //
    public function internshipCareer(int $companyId) {
        // Solicitamos el id de la compañia
        $company = $this->companyService->find($companyId);

        return view("agreement-deparment.company-form",
            ['company' => $company]);

    }

    public function showStudent(int $idStudent) {
        try {
            $student = $this->studentService->find($idStudent);
        } catch(Throwable $err) {
            return redirect()->route('login');
        }

        return view("career-departament.info-student", 
        ["student" => $student]);        
    }

    public function deleteStudent(int $idStudent) {
        try {
            $this->studentService->delete($idStudent);
            return redirect()->route('career.students')
                ->with('success', 'Estudiante eliminado correctamente.');
        } catch (Throwable $err) {
            return redirect()->route('career.students')
                ->with('error', 'Error al eliminar el estudiante: ' . $err->getMessage());
        }
    }
}
