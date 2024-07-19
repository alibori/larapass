<?php

declare(strict_types=1);

use App\Livewire\PasswordsList;
use Database\Factories\PasswordFactory;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Livewire;

test('component renders successfully', function (): void {
    Livewire::test(PasswordsList::class)
        ->assertStatus(200);
});

test('no results are displayed when no passwords are found', function (): void {
    Livewire::test(PasswordsList::class)
        ->assertSee('No passwords found');
});

test('passwords are displayed when found', function (): void {
    $user = UserFactory::new()->create();

    PasswordFactory::new()->count(2)->for($user)->create();

    Livewire::actingAs($user)
        ->test(PasswordsList::class)
        ->assertViewHas('passwords', fn (LengthAwarePaginator $passwords) => 2 === $passwords->total());
});

test('user only sees their own passwords', function (): void {
    $user = UserFactory::new()->create();

    PasswordFactory::new()->count(2)->for(UserFactory::new()->create())->create();
    PasswordFactory::new()->count(2)->for($user)->create();

    Livewire::actingAs($user)
        ->test(PasswordsList::class)
        ->assertViewHas('passwords', fn (LengthAwarePaginator $passwords) => 2 === $passwords->total());
});
