<?php

namespace Sawirricardo\LaravelTrixAttachment\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sawirricardo\LaravelTrixAttachment\LaravelTrixAttachment
 */
class LaravelTrixAttachment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sawirricardo\LaravelTrixAttachment\LaravelTrixAttachment::class;
    }
}
