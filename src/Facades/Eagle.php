<?php

namespace Siqwell\Eagle\Facades;

use Illuminate\Support\Facades\Facade;

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
