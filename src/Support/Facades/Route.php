<?php

namespace Polyfill\Support\Facades;

use Polyfill\Routing\Router;

/**
 * @method static \Polyfill\Routing\Route any(string $uri, array|string|callable|null $action = null)
 * @method static \Polyfill\Routing\Route fallback(array|string|callable|null $action = null)
 * @method static \Polyfill\Routing\Route get(string $uri, array|string|callable|null $action = null)
 * @method static \Polyfill\Routing\Route options(string $uri, array|string|callable|null $action = null)
 * @method static \Polyfill\Routing\Route patch(string $uri, array|string|callable|null $action = null)
 * @method static \Polyfill\Routing\Route post(string $uri, array|string|callable|null $action = null)
 * @method static \Polyfill\Routing\Route put(string $uri, array|string|callable|null $action = null)
 * @method static \Polyfill\Routing\Route methods(array $methods, string $uri, callable|array|string $action = null)
 * @method static \Polyfill\Routing\Route redirect(string $uri, string $target, int $code = 302)
 * @method static Router prefix(string $prefix)
 * @method static Router middleware(string $middleware)
 * @method static Router group(mixed $routes)
 * @method static Router registerRouteFile(string $filename)
 *
 * @see \Polyfill\Routing\Router
 */
class Route extends Facade
{
    /**
     * Basic HTTP methods.
     */
    const GET = "GET";
    const HEAD = "HEAD";
    const POST = "POST";
    const PUT = "PUT";
    const PATCH = "PATCH";
    const DELETE = "DELETE";
    const OPTIONS = "OPTIONS";

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'router';
    }
}