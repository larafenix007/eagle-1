<?php

namespace Siqwell\Eagle\Models;

/**
 * Class Filter
 * @package Siqwell\Eagle\Models
 */
class Filter extends AbstractModel
{
    public $id;
    public $name;
    public $total_entries;
    public $total_pages;
    public $current_page;
    public $records;
}
