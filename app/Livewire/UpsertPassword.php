<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Contracts\PasswordEncrypter;
use App\Livewire\Forms\UpsertPasswordForm;
use App\Models\Password;
use App\Services\PasswordService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Native\Laravel\Facades\Clipboard;
use Random\RandomException;
use Throwable;

final class UpsertPassword extends Component
{
    public UpsertPasswordForm $form;
    public ?Password $password = null;
    private PasswordService $password_service;
    private PasswordEncrypter $password_encrypter;

    public function mount(): void
    {
        if ($this->password) {
            $this->form->fill([
                'id' => $this->password->id,
                'title' => $this->password->title,
                'origin' => $this->password->origin,
                'username' => $this->password->username,
                'password' => $this->password->password,
                'comments' => $this->password->comments,
            ]);
        }
    }

    public function boot(
        PasswordService $password_service,
        PasswordEncrypter $password_encrypter
    ): void
    {
        $this->password_service = $password_service;
        $this->password_encrypter = $password_encrypter;
    }

    /**
     * Generate a random Password of 16 characters.
     *
     * @throws RandomException
     */
    public function generate(): void
    {
        $this->form->password = bin2hex(random_bytes(16));
    }

    public function copy(string $password): void
    {
        $password_decrypted = $this->password_encrypter->decrypt($password);

        Clipboard::text($password_decrypted);
    }

    /**
     * Save the Password.
     *
     * @return void
     * @throws ValidationException
     */
    public function save(): void
    {
        $this->form->validate();

        try {
            $this->password_service->upsert(attributes: $this->form->toArray());

            session()->flash('success', __('Password saved successfully.'));

            $this->redirect(url: PasswordsList::class, navigate: true);
        } catch (Exception|Throwable $e) {
            // Do something with the Exception or Throwable.
        }
    }

    #[Layout('layouts.larapass')]
    public function render(): View|Factory|Application
    {
        return view('livewire.upsert-password');
    }
}
