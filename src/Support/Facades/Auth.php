<?php

namespace Polyfill\Support\Facades;

use Polyfill\Auth\Authenticatable;
use Polyfill\Auth\AuthenticationManager;
use Polyfill\Auth\Guardians\Guardian;

/**
 * @method static Guardian guardian(string $name)
 * @method static bool validate(\Polyfill\Http\Request $request)
 * @method static bool attempt(array $credentials)
 * @method static Authenticatable|null user(string $name = "default")
 * @method static AuthenticationManager login(Authenticatable $user, string $name = "default")
 *
 * @see \Polyfill\Auth\AuthenticationManager
 */
class Auth extends Facade
{

    /**
     * @inheritDoc
     */
    protected static function getFacadeAccessor(): string
    {
        return "auth";
    }
}