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

    public $albums;
    public $is_processed;
    public $is_hd;
    public $screenshots;
    public $current_screenshot;
    public $current_screenshot_small;
    public $view_count;
    public $click_url;
    public $user_id;
    public $recorded_at;
    public $updated_at;
    public $created_at;
//
//    /** @var  array */
//    public $record_files;
}
