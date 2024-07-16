# LaraPass: Keep it secret

LaraPass is a self-hosted personal password manager built with security in mind. It is a fullstack web application built with Laravel, Livewire, Tailwind CSS and NativePHP.

**IMPORTANT**: This project is still in development and is not ready for production use.

## Features

- **Secure**: LaraPass is built with security in mind. It uses the latest security best practices to keep your passwords safe. These are encrypted using the **OpenSSL** encryption algorithm.

## Configuration

In your `.env` file, you **must** configure the following settings:

- `LARAPASS_ENCRYPTION_KEY`: The encryption key used to encrypt and decrypt your passwords. This should be a random string of 32 characters.
- `LARAPASS_ENCRYPTION_NONCE`: The nonce used to encrypt and decrypt your passwords. This should be a random string of 16 characters.

You can generate these values using some tool like [random key generator](https://acte.ltd/utils/randomkeygen).
