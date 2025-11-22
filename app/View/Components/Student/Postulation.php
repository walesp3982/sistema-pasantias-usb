<?php

namespace App\View\Components\Student;

use App\Models\Internship;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Postulation extends Component
{
    /**
     * Create a new component instance.
     */
    public Internship $internship;
    public function __construct(Internship $internship)
    {
        //
        $this->internship = $internship;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.student.postulation');
    }
}
