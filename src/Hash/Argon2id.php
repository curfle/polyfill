<?php

namespace Polyfill\Hash;

use Polyfill\Agreements\Hash\HashAlgorithm as HashAlgorithm;

class Argon2id extends PasswordHashAlgorithm implements HashAlgorithm
{

    /**
     * @inheritDoc
     */
    protected static function getHashAlgorithm(): string
    {
        return PASSWORD_ARGON2ID;
    }

    /**
     * @inheritDoc
     */
    protected static function getHashOptions(): array
    {
        return [
            "memory_cost" => 1024,
            "time_cost" => 2,
            "threads" => 2
        ];
    }
}