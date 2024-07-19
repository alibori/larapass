<?php

declare(strict_types=1);

use App\Livewire\UpsertPassword;
use Database\Factories\PasswordFactory;
use Database\Factories\UserFactory;
use Livewire\Livewire;

test('component renders succesfully when creating a new password', function (): void {
    Livewire::test(UpsertPassword::class)
        ->assertStatus(200);
});

test('component renders succesfully when editing a password', function (): void {
    $user = UserFactory::new()->create();
    $password = PasswordFactory::new()->for($user)->create();

    Livewire::actingAs($user)->test(UpsertPassword::class, ['password' => $password])
        ->assertStatus(200);
});

test('can create a new password', function (): void {
    $user = UserFactory::new()->create();

    Livewire::actingAs($user)
        ->test(UpsertPassword::class)
        ->set('form.title', 'My new password')
        ->set('form.origin', 'https://example.com')
        ->set('form.password', 'password')
        ->call('save');

    $this->assertDatabaseHas('passwords', [
        'user_id' => $user->id,
        'title' => 'My new password',
        'origin' => 'https://example.com',
    ]);
});

test('can update a password', function (): void {
    $user = UserFactory::new()->create();
    $password = PasswordFactory::new()->for($user)->create();

    Livewire::actingAs($user)
        ->test(UpsertPassword::class, ['password' => $password])
        ->set('form.title', 'My updated password')
        ->set('form.origin', 'https://example.com')
        ->set('form.password', 'password')
        ->call('save');

    $this->assertDatabaseHas('passwords', [
        'id' => $password->id,
        'user_id' => $user->id,
        'title' => 'My updated password',
        'origin' => 'https://example.com',
    ]);
});

test('cannot create password if any requird field is missing', function (): void {
    $user = UserFactory::new()->create();

    Livewire::actingAs($user)
        ->test(UpsertPassword::class)
        ->set('form.title', 'My new password')
        ->set('form.origin', 'https://example.com')
        ->call('save')
        ->assertHasErrors(['form.password']);

    $this->assertDatabaseMissing('passwords', [
        'user_id' => $user->id,
        'title' => 'My new password',
        'origin' => 'https://example.com',
    ]);
});
