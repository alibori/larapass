<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\PasswordEncrypter;
use App\Contracts\PasswordRepositoryContract;
use App\Models\Password;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

final readonly class PasswordService
{
    public function __construct(
        private PasswordEncrypter $password_encrypter,
        private PasswordRepositoryContract $password_repository
    ) {
    }

    /**
     * Upsert a Password.
     *
     * @param array{id: ?int, title: string, origin: string, username: ?string, password: string, comments: ?string, group_id: ?int} $attributes
     * @return Password
     */
    public function upsert(array $attributes): Password
    {
        $attributes['user_id'] = Auth::id();

        $attributes['password'] = $this->password_encrypter->encrypt($attributes['password']);

        return $this->password_repository->upsert($attributes);
    }

    /**
     * List all Passwords.
     *
     * @return LengthAwarePaginator
     */
    public function listPasswords(): LengthAwarePaginator
    {
        return $this->password_repository->list(filters: ['user_id' => Auth::id()], with: ['group']);
    }

    /**
     * Delete a Password.
     *
     * @param Password $password
     * @return void
     */
    public function deletePassword(Password $password): void
    {
        $this->password_repository->delete(password: $password);
    }
}
