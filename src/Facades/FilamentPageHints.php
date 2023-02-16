<?php

namespace Discoverlance\FilamentPageHints\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Discoverlance\FilamentPageHints\FilamentPageHints
 */
class FilamentPageHints extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Discoverlance\FilamentPageHints\FilamentPageHints::class;
    }
}
