<?php

declare(strict_types=1);

namespace App\Contracts;

interface PasswordEncrypter
{
    /**
     * Encrypt the given password.
     *
     * @param string $password
     * @return string
     */
    public function encrypt(string $password): string;

    /**
     * Decrypt the given encrypted password.
     *
     * @param string $encrypted_password
     * @return string
     */
    public function decrypt(string $encrypted_password): string;
}
