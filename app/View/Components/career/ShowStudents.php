<?php

namespace App\View\Components\Career;

use App\Service\UserService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ShowStudents extends Component
{
    /**
     * Create a new component instance.
     */
    public int $career_id;
    public function __construct(UserService $service)
    {
        //
        $this->career_id = $service->getCareer(Auth::id())->id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.career.show-students');
    }
}
