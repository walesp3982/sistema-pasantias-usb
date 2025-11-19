<?php

namespace App\View\Components\Career;

use App\Models\Student;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StudentBlock extends Component
{
    /**
     * Create a new component instance.
     */
    public Student $student;
    public function __construct(Student $student)
    {
        //
        $this->student = $student;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.career.student-block');
    }
}
