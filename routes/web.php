<?php

declare(strict_types=1);

use App\Livewire\Dashboard;
use App\Livewire\PasswordsList;
use App\Livewire\UpsertPassword;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::get('/', Dashboard::class)
        ->name('dashboard');

    Route::prefix('passwords')->name('passwords.')->group(function (): void {
        Route::get('/', PasswordsList::class)
            ->name('index');

        Route::get('/create', UpsertPassword::class)
            ->name('create');

        Route::get('/{password}', UpsertPassword::class)
            ->name('edit');
    });
});


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
