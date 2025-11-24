<?php

namespace App\View\Components\auth;

use App\Models\User;
use App\Service\UserService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profile extends Component
{
    /**
     * Create a new component instance.
     */
    public User $user;

    public string $url;

    public string $roleName;

    public function imageUrl()
    {
        if (!$this->user->profile) {
            return asset("images/default/avatar_default.webp");
        }

        $idPicture = $this->user->profile->id;

        return route('private.image', $idPicture);
    }

    public function __construct(UserService $userService)
    {
        //
        $userId = Auth::id();
        $this->user = $userService->get($userId);
        if (!$this->user->profile) {
            $this->url = asset("images/default/avatar_default.webp");
        } else {
            $idPicture = $this->user->profile->id;

            $this->url = route('private.image', $idPicture);
        }

        $this->roleName = $this->user->role()->label();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.profile');
    }
}
