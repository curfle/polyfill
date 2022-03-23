<?php

namespace Polyfill\Hash;

use Polyfill\Agreements\Hash\HashAlgorithm as HashAlgorithm;

class BCrypt extends PasswordHashAlgorithm implements HashAlgorithm
{

    /**
     * @inheritDoc
     */
    protected static function getHashAlgorithm(): string
    {
        return PASSWORD_BCRYPT;
    }

    /**
     * @inheritDoc
     */
    protected static function getHashOptions(): array
    {
        return [
            "cost" => 10
        ];
    }
}