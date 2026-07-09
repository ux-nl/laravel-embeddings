<?php

namespace UX\Embedding\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \UX\Embedding\LaravelEmbed
 */
class LaravelEmbed extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \UX\Embedding\LaravelEmbed::class;
    }
}
