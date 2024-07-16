<?php

declare(strict_types=1);

namespace App\Encryption;

use Exception;

final class PasswordEncrypter implements \App\Contracts\PasswordEncrypter
{
    public string $key;
    public string $nonce;
    public string $ciphering = 'aes-128-ctr';

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->key = config('larapass.encryption_key');

        if (empty($this->key)) {
            throw new Exception('Encryption key is missing');
        }

        $this->nonce = config('larapass.encryption_nonce');

        if (empty($this->nonce)) {
            throw new Exception('Encryption nonce is missing');
        }
    }

    /**
     * @inheritDoc
     */
    public function encrypt(string $password): string
    {
        return openssl_encrypt($password, $this->ciphering, $this->key, 0, $this->nonce);
    }

    /**
     * @inheritDoc
     */
    public function decrypt(string $encrypted_password): string
    {
        return openssl_decrypt($encrypted_password, $this->ciphering, $this->key, 0, $this->nonce);
    }
}
