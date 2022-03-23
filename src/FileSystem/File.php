<?php

namespace Polyfill\FileSystem;

class File
{

    /**
     * Extract the file extension from a file path.
     *
     * @param string $path
     * @return string
     */
    private static function extension(string $path): string
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    /**
     * Get the mime-type of a given file.
     *
     * @param string $path
     * @return string|false
     */
    private static function mimeType(string $path): bool|string
    {
        return finfo_file(finfo_open(FILEINFO_MIME_TYPE), $path);
    }

    /**
     * Get the content-type of a given file.
     *
     * @param string $path
     * @return string|false
     */
    public static function contentType(string $path): bool|string
    {
        return match (static::extension($path)) {
            "aac" => "audio/aac",
            "avi" => "video/x-msvideo",
            "bin" => "application/octet-stream",
            "bmp" => "image/bmp",
            "css" => "text/css",
            "csv" => "text/csv",
            "doc" => "application/msword",
            "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "gif" => "image/gif",
            "htm", "html" => "text/html",
            "ico" => "image/vnd.microsoft.icon",
            "ics" => "text/calendar",
            "jpeg", "jpg" => "image/jpeg",
            "js", "mjs" => "text/javascript",
            "mp3" => "audio/mpeg",
            "mp4" => "video/mp4",
            "mpeg" => "video/mpeg",
            "otf" => "font/otf",
            "png" => "image/png",
            "pdf" => "application/pdf",
            "php" => "application/x-httpd-php",
            "ppt" => "application/vnd.ms-powerpoint",
            "pptx" => "application/vnd.openxmlformats-officedocument.presentationml.presentation",
            "svg" => "image/svg+xml",
            "tif", "tiff" => "image/tiff",
            "ttf" => "font/ttf",
            "txt" => "text/plain",
            "weba" => "audio/webm",
            "webm" => "video/webm",
            "webp" => "image/webp",
            "woff" => "font/woff",
            "woff2" => "audio/wav",
            "xls" => "application/vnd.ms-excel2",
            "xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "xml" => "application/xml",
            "zip" => "application/zip",
            default => static::mimeType($path)
        };
    }
}