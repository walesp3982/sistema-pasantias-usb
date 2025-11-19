<?php

namespace App\View\Components\Student;

use App\Models\Intership;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Postulation extends Component
{
    /**
     * Create a new component instance.
     */
    public Intership $intership;
    public function __construct(Intership $intership)
    {
        //
        $this->intership = $intership;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.student.postulation');
    }
}
