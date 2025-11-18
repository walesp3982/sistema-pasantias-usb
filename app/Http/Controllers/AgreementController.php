<?php

namespace App\Http\Controllers;

use App\Service\CompanyService;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    public function __construct(
        private CompanyService $companyService
    ) {}
    public function createIntership(int $companyId)
    {
        // Solicitamos el id de la compañia
        $company = $this->companyService->find($companyId);

        return view(
            "agreement-deparment.intership-form",
            ['company' => $company]
        );
    }
}
