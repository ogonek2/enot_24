<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    protected $fillable = [
        'street', 'workinghourse', 'link_map', 'lat', 'lng', 'banner', 'value', 'seo_link',
    ];
}
