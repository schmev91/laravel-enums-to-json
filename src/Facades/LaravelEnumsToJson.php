<?php

namespace SassLaravel\LaravelEnumsToJson\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SassLaravel\LaravelEnumsToJson\LaravelEnumsToJson
 */
class LaravelEnumsToJson extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SassLaravel\LaravelEnumsToJson\LaravelEnumsToJson::class;
    }
}
