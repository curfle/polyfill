<?php

namespace Polyfill\Auth;

use Polyfill\Hash\Algorithm\HMAC;
use Polyfill\Support\Exceptions\Auth\IncorrectJWTFormatException;
use Polyfill\Support\Exceptions\Misc\SecretNotPresentException;
use Polyfill\Support\Str;
use Polyfill\Utilities\Base64;
use Polyfill\Utilities\JSON;

class JWT
{
    /**
     * Generates a new JWT. Lives for 30 days by default.
     *
     * @param array $payload
     * @param string $secret
     * @param int $lifetime
     * @param string $algorithm
     * @return string
     */
    public static function generate(array $payload, string $secret, int $lifetime = 60 * 60 * 24 * 30, string $algorithm = "HS256"): string
    {
        // fill header
        $header = [
            "typ" => "JWT",
            "alg" => $algorithm
        ];

        // fill payload
        $payload = array_merge(
            [
                "exp" => time() + $lifetime,                    // expiration time
                "nbf" => time(),                                // not before
                "iat" => time(),                                // issued at time
                "jti" => uniqid()                               // unique identifier for jwt
            ],
            $payload
        );

        // base-64-url encode header and payload
        $encodedHeader = Base64::urlEncode(JSON::from($header));
        $encodedPayload = Base64::urlEncode(JSON::from($payload));

        // create the signature
        $signature = HMAC::hash(
            "$encodedHeader.$encodedPayload",
            $secret,
            binary: true
        );
        $encodedSignature = Base64::urlEncode($signature);

        // create the jwt
        return "$encodedHeader.$encodedPayload.$encodedSignature";
    }

    /**
     * Returns if a token is valid against the environment secret (and timestamp if available and wanted).
     *
     * @param string $token
     * @param string $secret
     * @param bool $checkExpIfAvailable
     * @return bool
     */
    public static function valid(string $token, string $secret, bool $checkExpIfAvailable = true): bool
    {
        // split the token
        [$header, $payload, $signature] = Str::split($token, ".");

        $payloadParsed = JSON::parse(Base64::urlDecode($payload));

        // check for expiration timestamp if wanted and possible
        if ($checkExpIfAvailable && $payloadParsed !== null && array_key_exists("exp", $payloadParsed))
            if ($payloadParsed["exp"] < time())
                return false;

        // build new header and payload signatures
        $correctSignature = Base64::urlEncode(
            HMAC::hash(
                "$header.$payload",
                $secret,
                binary: true
            )
        );

        // validate signature against correct signature
        return $signature === $correctSignature;
    }

    /**
     * Returns the tokens' content.
     * Warning: this function does not validate the token.
     *
     * @param string $token
     * @return array|null
     * @throws IncorrectJWTFormatException
     */
    public static function decode(string $token): array|null
    {
        // split the token
        $parts = Str::split($token, ".");
        if (count($parts) !== 3)
            throw new IncorrectJWTFormatException("The JWT provided is not formatted correctly.");

        [$header, $payload, $signature] = $parts;

        return JSON::parse(Base64::urlDecode($payload));
    }

    /**
     * Returns the tokens' content.
     * Warning: this function does not validate the token.
     *
     * @param string $token
     * @return array|null
     * @throws IncorrectJWTFormatException
     */
    public static function decodeHeader(string $token): array|null
    {
        // split the token
        $parts = Str::split($token, ".");
        if (count($parts) !== 3)
            throw new IncorrectJWTFormatException("The JWT provided is not formatted correctly.");

        [$header, $payload, $signature] = $parts;

        return JSON::parse(Base64::urlDecode($header));
    }
}