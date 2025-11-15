<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="text-center p-4 border-t border-gray-200 bg-gray-50">
    <button class="no-underline text-gray-800 hover:text-blue-600 transition-colors"
    wire:click="logout">
        <i class="fa-solid fa-right-from-bracket mr-2"></i> Salir
    </button>
</div>
