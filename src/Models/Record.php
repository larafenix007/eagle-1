<?php

namespace Siqwell\Eagle\Models;

/**
 * Class Record
 * @package Siqwell\Eagle\Models
 */
class Record extends AbstractRecord
{
    public $screenshot;
    public $screenshot_small;
    public $subtitles;

    /** @var  array */
    public $record_files;
}
