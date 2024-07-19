<?php

declare(strict_types=1);

use App\Encryption\PasswordEncrypter;

test('can encrypt a password', function (): void {
    $encrypter = mock(PasswordEncrypter::class);

    $encrypter->shouldReceive('encrypt')
        ->with('password')
        ->andReturn('encrypted-password');

    expect($encrypter->encrypt('password'))->toBe('encrypted-password');
});

test('can decrypt a password', function (): void {
    $encrypter = mock(PasswordEncrypter::class);

    $encrypter->shouldReceive('decrypt')
        ->with('encrypted-password')
        ->andReturn('password');

    expect($encrypter->decrypt('encrypted-password'))->toBe('password');
});
