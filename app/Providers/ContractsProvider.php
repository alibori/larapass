<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\PasswordEncrypter;
use App\Contracts\PasswordRepositoryContract;
use App\Encryption\PasswordEncrypter as EncryptionPasswordEncrypter;
use App\Repositories\PasswordRepository;
use Illuminate\Support\ServiceProvider;

final class ContractsProvider extends ServiceProvider
{
    public array $bindings = [
        PasswordEncrypter::class => EncryptionPasswordEncrypter::class,
        PasswordRepositoryContract::class => PasswordRepository::class,
    ];
}
