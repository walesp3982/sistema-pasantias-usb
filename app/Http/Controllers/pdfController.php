<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\phpController;

class pdfController extends Controller
{
    
    public function Certificado() {
        $pdf = Pdf::loadView('pdf.Certificado');
        return $pdf->stream('Asistencia.pdf');
    }
    
    public function ListaPostulantes() {
        $pdf = Pdf::loadView('pdf.ListaPostulantes');
        return $pdf->stream('ListaDePostulantes.pdf');
    }

}
