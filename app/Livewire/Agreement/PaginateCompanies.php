<?php

namespace App\Livewire\Agreement;

use App\Models\Company;
use Livewire\Component;

class PaginateCompanies extends Component
{
    public function render()
    {
        $companies = Company::paginate(9);
        return view('livewire.agreement.paginate-companies',
    ['companies' => $companies]);
    }
}
