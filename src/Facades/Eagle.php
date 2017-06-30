<?php

namespace LaraFenix007\Eagle\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Eagle
 * @package LaraFenix007\Eagle\Facades
 *
 * @method static \LaraFenix007\Eagle\Api\AlbumApi Album()
 * @method static \LaraFenix007\Eagle\Api\FilterApi Filter()
 * @method static \LaraFenix007\Eagle\Api\RecordApi Record()
 * @method static \LaraFenix007\Eagle\Api\TranslationApi Translation()
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
        return \LaraFenix007\Eagle\Client::class;
    }
}
