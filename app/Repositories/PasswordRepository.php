<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\PasswordRepositoryContract;
use App\Models\Password;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class PasswordRepository implements PasswordRepositoryContract
{
    public function upsert(array $attributes): Password
    {
        $attributes_filtered = array_filter($attributes, fn($key) => in_array($key, ['title', 'origin', 'username', 'password', 'comments', 'user_id', 'group_id']), ARRAY_FILTER_USE_KEY);

        return Password::query()->updateOrCreate(
            ['id' => $attributes['id'] ?? null],
            $attributes_filtered
        );
    }

    public function list(array $filters = [], array $with = []): LengthAwarePaginator
    {
        $query = Password::query();

        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                $query->where($key, $value);
            }
        }

        if (!empty($with)) {
            $query->with($with);
        }

        return $query->paginate();
    }

    public function delete(Password $password): void
    {
        $password->delete();
    }
}
