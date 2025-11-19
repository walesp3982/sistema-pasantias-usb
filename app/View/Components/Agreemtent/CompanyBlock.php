<?php

namespace App\View\Components\Agreemtent;

use App\Models\Company;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CompanyBlock extends Component
{
    /**
     * Create a new component instance.
     */
    public Company $company;
    public function __construct(Company $company)
    {
        //
        $this->company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.agreemtent.company-block');
    }
}
