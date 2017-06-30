<?php

namespace Siqwell\Eagle\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Eagle
 * @package Siqwell\Eagle\Facades
 *
 * @method static \Siqwell\Eagle\Api\AlbumApi Album()
 * @method static \Siqwell\Eagle\Api\FilterApi Filter()
 * @method static \Siqwell\Eagle\Api\RecordApi Record()
 * @method static \Siqwell\Eagle\Api\TranslationApi Translation()
 */
class Eagle extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Siqwell\Eagle\Client::class;
    }
}
