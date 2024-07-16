<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
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

<div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="p-4 sm:p-7">
        <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">{{__('Sign in')}}</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                {{__('Don\'t have an account yet?')}}
                <a class="text-blue-600 decoration-2 hover:underline font-medium dark:text-blue-500" href="{{ route('register') }}" wire:navigate>
                    {{__('Sign up here')}}
                </a>
            </p>
        </div>

        <div class="mt-5">
            <!-- Form -->
            <form wire:submit="login">
                <div class="grid gap-y-4">
                    <!-- Form Group -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                    </div>
                    <!-- End Form Group -->

                    <!-- Checkbox -->
                    <div class="flex items-center">
                        <div class="flex">
                            <input wire:model="form.remember" id="remember" name="remember" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                        </div>
                        <div class="ms-3">
                            <label for="remember-me" class="text-sm dark:text-white">{{__('Remember me')}}</label>
                        </div>
                    </div>
                    <!-- End Checkbox -->

                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        {{__('Sign in')}}</button>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
