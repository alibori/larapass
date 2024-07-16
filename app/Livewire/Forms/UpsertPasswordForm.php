<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

final class UpsertPasswordForm extends Form
{
    #[Validate('nullable', 'int')]
    public ?int $id = null;

    #[Validate('required', 'string')]
    public ?string $title = null;

    #[Validate('required', 'string')]
    public ?string $origin = null;

    #[Validate('nullable', 'string')]
    public ?string $username = null;

    #[Validate('required', 'string')]
    public ?string $password = null;

    #[Validate('nullable', 'string')]
    public ?string $comments = null;
}
