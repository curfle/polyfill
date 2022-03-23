<?php

namespace Polyfill\Hash;

use Polyfill\Agreements\Hash\HashAlgorithm as HashAlgorithm;

class MD5 implements HashAlgorithm
{

    /**
     * Hashes a string with the MD5 algorithm.
     *
     * @param string $string
     * @param bool $binary
     * @return string
     */
    public static function hash(string $string, bool $binary = false): string
    {
        return md5($string, $binary);
    }
}