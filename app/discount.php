<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    protected $fillable = [
        'name', 'link_name', 'banner', 'locations', 'umowy', 'discount_action', 'telegram_name',
    ];
}
