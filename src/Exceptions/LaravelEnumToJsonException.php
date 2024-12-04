<?php
namespace SassLaravel\LaravelEnumsToJson\Exceptions;

use Exception;

class LaravelEnumToJsonException extends Exception
{
    public static function nameCollison(string $name)
    {
        return new self('There was a collision of names: '. $name);
    }
}