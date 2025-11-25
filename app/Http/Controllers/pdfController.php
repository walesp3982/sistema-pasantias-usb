<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\phpController;

class pdfController extends Controller
{
    
    public function Asistencia() {
        $pdf = Pdf::loadView('pdf.Asistencia');
        return $pdf->stream('Asistencia.pdf');
    }
    

    public function ListaPostulantes() {
        $pdf = Pdf::loadView('pdf.ListaPostulantes');
        return $pdf->stream('ListaPostulantes.pdf');
    }

}
