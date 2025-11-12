<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
  public LoginForm $form;

  /**
   * Handle an incoming authentication request.
   */
  public function login(): void
  {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
  }
}; ?>

{{-- <div>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form wire:submit="login">
    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required
        autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />

      <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password" name="password"
        required autocomplete="current-password" />

      <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember" class="inline-flex items-center">
        <input wire:model="form.remember" id="remember" type="checkbox"
          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
      </label>
    </div>

    <div class="flex items-center justify-end mt-4">
      @if (Route::has('password.request'))
      <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        href="{{ route('password.request') }}" wire:navigate>
        {{ __('Forgot your password?') }}
      </a>
      @endif

      <x-primary-button class="ms-3">
        {{ __('Log in') }}
      </x-primary-button>
    </div>
  </form>
</div> --}}

<div>
  <h1 class="text-3xl font-bold text-gray-800 mb-6">Login</h1>

  <form wire:submit="login">
    @csrf
    <!-- Dirección de correo-->
    @error('form.email')
      <x-ui.msg.warning>
        {{ $message }}
      </x-ui.msg.warning>
    @enderror
    <div class="mb-4">
      <label for="email" class="block text-gray-600 mb-2">Correo electrónico</label>
      <input wire:model="form.email" type="email" id="email"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
    </div>
    <!-- Contraseña-->
    @error('form.password')
      <x-ui.msg.warning>
        {{ $message }}
      </x-ui.msg.warning>
    @enderror
    <div class="mb-4">
      <label for="password" class="block text-gray-600 mb-2">Contraseña</label>
      <input wire:model="form.password" type="password" id="password"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
    </div>
    {{-- recuerdame --}}
    <div class="block mt-4">
      <label for="remember" class="inline-flex items-center">
        <input wire:model="form.remember" id="remember" type="checkbox"
          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
      </label>
    </div>

    <div class="text-center mt-6">
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
        Iniciar sesión
      </button>
      <a href="{{ route('password.request') }}" class="block mt-3 text-blue-600 hover:underline text-sm">¿Olvidaste
        tu contraseña?</a>
    </div>
  </form>
</div>
