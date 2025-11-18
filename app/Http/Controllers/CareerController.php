<?php

namespace App\Http\Controllers;

use App\Service\CompanyService;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function __construct(
        private CompanyService $companyService)
    {
    }
    //
    public function intershipCareer(int $companyId) {
        // Solicitamos el id de la compañia
        $company = $this->companyService->find($companyId);

        return view("agreement-deparment.company-form",
            ['company' => $company]);

    }
}
