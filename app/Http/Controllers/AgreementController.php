<?php

namespace App\Http\Controllers;

use App\Service\CompanyService;
use App\Service\InternshipService;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    public function __construct(
        private CompanyService $companyService,
        private InternshipService $internshipService,
    ) {}
    public function createInternship(int $companyId)
    {
        // Solicitamos el id de la compañia
        $company = $this->companyService->find($companyId);

        return view(
            "agreement-deparment.internship-form",
            ['company_id' => $company->id]
        );
    }

    public function showCompany(int $companyId) {
        $company = $this->companyService->find($companyId);

        $internshipCurrent = $this->companyService
            ->getInternshipCurrent($company->id);

        $internshipWait = $this->companyService
        ->getInternshipWait($company->id);

        $internshipFinished = $this->companyService
        ->getInternshipFinished($company->id);

        return view('agreement-deparment.info-companies', [
            'company' => $company,
            'internshipCurrent' => $internshipCurrent,
            'internshipWait' => $internshipWait,
            'internshipFinished' => $internshipFinished,
        ]);
    }

    public function showInternship(int $idInternship) {
        $internship = $this->internshipService->find($idInternship);

        $sentApplications = $this->internshipService->getPostulationAccept($idInternship);
        $acceptedApplications = $this->internshipService->getPostulationSend($idInternship);
        return view('agreement-deparment.info-internship',[
            'internship' => $internship,
            'acceptedApplications' => $acceptedApplications,
            'sentApplications' => $sentApplications,
        ]);
    }
}
