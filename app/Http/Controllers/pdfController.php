<?php

namespace App\Http\Controllers;

use App\Service\InternshipService;
use App\Service\PostulationService;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\phpController;
use App\Service\StudentService;

class pdfController extends Controller
{
    public function __construct(
        private StudentService $studentService,
        private InternshipService $internshipService,
    ) {}
    public function Certificado(int $postulationId) {
        $postulation = $this->studentService->getPostulation($postulationId);


        $pdf = Pdf::loadView('pdf.Certificado', [
            'postulation' => $postulation
        ]);
        return $pdf->stream('Asistencia.pdf');
    }

    public function ListaPostulantes(int $internshipId) {
        $postulationAccept = $this->internshipService->getPostulationAccept($internshipId);
        $pdf = Pdf::loadView('pdf.ListaPostulantes', ['postulations' => $postulationAccept]);
        return $pdf->stream('ListaDePostulantes.pdf');
    }

}
