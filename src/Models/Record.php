<?php

namespace Siqwell\Eagle\Models;

class Record extends AbstractModel
{
    public $id;
    public $name;
    public $description;
    /** @var  array */
    public $tags;
    /** @var  int */
    public $duration;
    public $origin;
    public $origin_size;
    /** @var  array */
    public $record_files;
}
