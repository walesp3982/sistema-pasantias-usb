<?php

namespace App\Service;

use App\Repositories\Interfaces\InternshipRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class ReportsService
{
    public function __construct(
        private InternshipRepositoryInterface $internshipRepository
    ) {}

    public function repositoryData(int $internship_id)
    {
        $intership = $this->internshipRepository->getEagerLoading($internship_id);

        return $intership;
    }

    public function getDateActual()
    {
        return now()->translatedFormat('j \\d\\e F \\d\\e Y');
    }

    public function getDate( $date)
    {
        return $date->translatedFormat('j \\d\\e F \\d\\e Y');
    }
    public function generateConvocatoria(int $internship_id)
    {
        $internshipData = $this->repositoryData($internship_id);

        $duration = $internshipData->start_date->diffInMonths($internshipData->end_date);
        $datos = [
            'carrera' => $internshipData->career->name,
            'lugar_entrega' => 'Secretaría de Carrera',
            'fecha_cierre' => $this->getDate($internshipData->postulation_limit_date),
            'fecha_inicio' => $this->getDate($internshipData->start_date),
            'fecha_final' => $this->getDate($internshipData->end_date),
            'direccion_carrera' => "Dirección de " . $internshipData->career->name,
            'ciudad_fecha' => 'La Paz, ' . $this->getDateActual(),
            'duracion' => $duration,
            'empresa' => $internshipData->company->name,
            'ubicacion' => $internshipData->location->full_address,
            'requerimientos' => [
                'Currículum Vitae actualizado.',
                'Fotocopia de la cédula de identidad.',
                'Historial académico (solicitar en "Registro Único").',
                'Carta de presentación (emitida por Dirección de Carrera).',
            ],
        ];


        $pdf = Pdf::loadView('pdf.convocatoria', $datos);
        $pdf->setPaper('letter', 'portrait');

        $filename = 'Convocatoria_Pasantias_' . str_replace(' ', '_', $datos['carrera']) . '_' . date('Ymd') . '.pdf';

        return $pdf->stream($filename);
    }
}
