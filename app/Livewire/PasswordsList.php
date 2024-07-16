<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Contracts\PasswordEncrypter;
use App\Models\Password;
use App\Services\PasswordService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Native\Laravel\Facades\Clipboard;
use function Laravel\Prompts\alert;

final class PasswordsList extends Component
{
    private PasswordEncrypter $password_encrypter;
    private PasswordService $password_service;

    public function boot(
        PasswordEncrypter $password_encrypter,
        PasswordService $password_service
    ): void
    {
        $this->password_encrypter = $password_encrypter;
        $this->password_service = $password_service;
    }
    public function copyPassword(string $password): void
    {
        $password_decrypted = $this->password_encrypter->decrypt($password);

        Clipboard::text($password_decrypted);
    }

    public function details(Password $password): void
    {
        $this->redirectRoute('passwords.edit', ['password' => $password]);
    }

    public function delete(Password $password): void
    {
        $this->password_service->deletePassword($password);
    }

    #[Layout('layouts.larapass')]
    public function render(): View|Factory|Application
    {
        $passwords = $this->password_service->listPasswords();

        return view('livewire.passwords-list', [
            'passwords' => $passwords,
        ]);
    }
}
