<?php

namespace LaraFenix007\Eagle\Models;

class Translation extends AbstractModel
{
    public $id;
    public $name;
    public $status;
    public $description;
    public $stream_name;
    public $url;
    public $announce;
    public $created_at;
    public $updated_at;
    public $starts_at;
    public $ad_template_id;
    public $billing_package;
    public $billing_price;
    public $billing_product;
    public $age_restrictions_type;
    public $country_access_template_id;
    public $player_template_id;
    public $site_access_template_id;
    public $account;
    public $user;
}
