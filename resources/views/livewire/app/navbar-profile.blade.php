<?php

use Livewire\Volt\Component;
use App\Service\UserService;
use App\Models\User;

use function Livewire\Volt\{state, mount, computed};

state([
    'usuario',
    'userId',
]);

mount(function (UserService $userService) {
    $this->userId = auth()->id();
    $this->usuario = $userService->get($this->userId);
});

$imageUrl = computed(function() {
    if(!$this->usuario->profile) {
        return $this->avatarDefault();
    }

    $idPicture = $this->usuario->profile->id;
    return route('private.image', $idPicture);
});

$avatarDefault = function() {
    return asset("images/default/avatar_default.webp");
};
?>

<div>
    <div class="w-full h-full text-center">
        @if(is_null($usuario->profile))
            <img id="userPhoto"
            class="w-20 h-20 rounded-full cursor-pointer object-cover border-2 border-gray-300 hover:scale-105 transition-transform mx-auto"
            src="{{ $this->avatarDefault() }}" alt="User">
        @else
            <img id="userPhoto"
            class="w-20 h-20 rounded-full cursor-pointer object-cover border-2 border-gray-300 hover:scale-105 transition-transform mx-auto"
            src="{{ $this->imagenUrl }}" alt="User">
        @endif
    </div>
    <h2 class="text-bold text-md  text-gray-800 my-1">{{ $usuario->name }}</h2>
    <p class="text-sm text-gray-500">{{ $usuario->role()->label() }}</p>
</div>
