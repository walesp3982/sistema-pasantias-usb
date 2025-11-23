<?php

namespace App\View\Components\Career;

use App\Service\UserService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CareerInfo extends Component
{
    public $career;
    /**
     * Create a new component instance.
     */
    public function __construct(UserService $service)
    {
        //
        $this->career = $service->getCareer(Auth::id());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.career.career-info');
    }
}
