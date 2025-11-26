<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\phpController;
use App\Service\StudentService;

class pdfController extends Controller
{
    public function __construct(
        private StudentService $studentService
    ) {}
    public function Certificado(int $postulationId) {
        $postulation = $this->studentService->getPostulation($postulationId);


        $pdf = Pdf::loadView('pdf.Certificado', [
            'postulation' => $postulation
        ]);
        return $pdf->stream('Asistencia.pdf');
    }

    public function ListaPostulantes() {
        $pdf = Pdf::loadView('pdf.ListaPostulantes');
        return $pdf->stream('ListaDePostulantes.pdf');
    }

}
