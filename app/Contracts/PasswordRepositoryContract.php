<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\Password;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PasswordRepositoryContract
{
    /**
     * Upsert a Password.
     *
     * @param array{id: ?int, origin: string, password: string, comments: ?string, user_id: int, group_id: ?int} $attributes
     * @return Password
     */
    public function upsert(array $attributes): Password;

    /**
     * List all Passwords paginated.
     *
     * @param array $filters
     * @param array $with
     * @return LengthAwarePaginator
     */
    public function list(array $filters = [], array $with = []): LengthAwarePaginator;

    /**
     * Delete a Password.
     *
     * @param Password $password
     * @return void
     */
    public function delete(Password $password): void;
}
