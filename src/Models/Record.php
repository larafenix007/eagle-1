<?php

namespace Siqwell\Eagle\Models;

class Record extends AbstractModel
{
    public $adult;
    public $genres;

    public static $properties = [
        'adult',
        'genres'
    ];
}