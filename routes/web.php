<?php

use App\Livewire\PasswordsList;
use App\Livewire\UpsertPassword;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/', 'dashboard')
        ->name('dashboard');

    Route::prefix('passwords')->name('passwords.')->group(function () {
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
