<?php

namespace Polyfill\Utilities;

use Polyfill\Support\Exceptions\Utilities\JSONException;

class JSON
{
    /**
     * Parses a JSON string into an array or object.
     *
     * @param string $json
     * @param bool $toArray
     * @return array|object
     * @throws JSONException
     */
    public static function parse(string $json, bool $toArray = true): array|object
    {
        // decode json
        $result = json_decode($json, $toArray);

        // handle error
        if($result === null){
            $errorCode = json_last_error();
            match ($errorCode) {
                JSON_ERROR_DEPTH => throw new JSONException("The maximum stack depth has been exceeded"),
                JSON_ERROR_STATE_MISMATCH => throw new JSONException("Invalid or malformed JSON"),
                JSON_ERROR_CTRL_CHAR => throw new JSONException("Control character error, possibly incorrectly encoded"),
                JSON_ERROR_SYNTAX => throw new JSONException("Syntax error"),
                JSON_ERROR_UTF8 => throw new JSONException("Malformed UTF-8 characters, possibly incorrectly encoded"),
                JSON_ERROR_RECURSION => throw new JSONException("One or more recursive references in the value to be encoded"),
                JSON_ERROR_INF_OR_NAN => throw new JSONException("One or more NAN or INF values in the value to be encoded"),
                JSON_ERROR_UNSUPPORTED_TYPE => throw new JSONException("A value of a type that cannot be encoded was given"),
                JSON_ERROR_INVALID_PROPERTY_NAME => throw new JSONException("A property name that cannot be encoded was given"),
                JSON_ERROR_UTF16 => throw new JSONException("Malformed UTF-16 characters, possibly incorrectly encoded"),
                default => throw new JSONException("An unkown error occured during JSON parsing")
            };
        }

        // return result
        return $result;
    }

    /**
     * Generates a JSON string from an array or object.
     *
     * @param array|object $data
     * @return string
     */
    public static function from(array|object $data): string
    {
        return json_encode($data);
    }
}