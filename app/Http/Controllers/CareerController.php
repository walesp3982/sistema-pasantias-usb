<?php

namespace App\Http\Controllers;

use App\Service\CompanyService;
use App\Service\InternshipService;
use App\Service\ReportsService;
use App\Service\StudentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CareerController extends Controller
{
    public function __construct(
        private CompanyService $companyService,
        private StudentService $studentService,
        private ReportsService $reportsService,
        private InternshipService $internshipService
    ) {
    }
    //
    public function internshipCareer(int $companyId)
    {
        // Solicitamos el id de la compañia
        $company = $this->companyService->find($companyId);

        return view(
            "agreement-deparment.company-form",
            ['company' => $company]
        );

    }

    public function invitationInternship(int $internshipId)
    {
        // Solicitamos el id de la compañia
        return $this->reportsService->generateConvocatoria($internshipId);

    }

    public function showStudent(int $idStudent)
    {
        try {
            $student = $this->studentService->find($idStudent);
            $currentInternship = $this->studentService->currentInternship($idStudent);
            $waitInternship = $this->studentService->waitInternship($idStudent);
            $finishedInternship = $this->studentService->finishedInternship($idStudent);
        } catch (Throwable $err) {
            return redirect()->route('login');
        }

        return view(
            "career-departament.info-student",
            [
                "student" => $student,
                "currentInternship" => $currentInternship,
                "waitInternship" => $waitInternship,
                "finishedInternship" => $finishedInternship,
            ]
        );
    }

    public function deleteStudent(int $idStudent)
    {
        try {
            $this->studentService->delete($idStudent);
            return redirect()->route('career.students')
                ->with('success', 'Estudiante eliminado correctamente.');
        } catch (Throwable $err) {
            return redirect()->route('career.students')
                ->with('error', 'Error al eliminar el estudiante: ' . $err->getMessage());
        }
    }

    public function getStudentDelete()
    {
        $user = Auth::user();
        try {
            if ($user->careerDepartament() == null) {
                throw new \Exception('No tiene este rol');
            }
            $career_id = $user->careerDepartament->career_id;

            $studentDelete = $this->studentService->getStudentsDelete($career_id);

            return view(
                'career-departament.students-inactive',
                ['students' => $studentDelete]
            );
        } catch (Throwable $err) {
            redirect()->route('welcome');
        }

    }

    public function restoreStudent(int $idStudent)
    {
        $this->studentService->restoreStudent($idStudent);
        return redirect()->route('career.students');

    }

    public function internships()
    {
        $user = Auth::user();
        $career_id = $user->careerDepartament->career_id;

        $internships = $this->internshipService->getCareerDetailWait($career_id);
        $internshipCurrents = $this->internshipService->getCareerDetailCurrent($career_id);
        $internshipFinished = $this->internshipService->getCareerDetailFinished($career_id);

        return view(
            'career-departament.internship',
            [
                'internships' => $internships,
                'internshipFinished' => $internshipFinished,
                'internshipCurrents' => $internshipCurrents
            ]
        );
    }
}
