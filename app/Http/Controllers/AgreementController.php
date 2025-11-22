<?php

namespace App\Http\Controllers;

use App\Service\CompanyService;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    public function __construct(
        private CompanyService $companyService
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
}
