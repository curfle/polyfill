<?php

namespace Polyfill\Support\Facades;

/**
 * @method static \Polyfill\Http\Response setContent(string|array $content)
 * @method static \Polyfill\Http\Response setStatusCode(int $status)
 * @method static \Polyfill\Http\Response setProtocolVersion(int|float $version)
 * @method static \Polyfill\Http\Response setHeader(string $name, string $value)
 * @method static \Polyfill\Http\Response setCookie(string $name, string $value)
 * @method static \Polyfill\Http\Response send()
 * @method static \Polyfill\Http\Response sendHeaders()
 * @method static \Polyfill\Http\Response sendContent()
 *
 * @see \Polyfill\Http\Response
 */
class Response extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'response';
    }
}