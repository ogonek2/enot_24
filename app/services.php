<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $fillable = [
        'id',
        'name',
        'name_page',
        'seo_description',
        'seo_keywords',
        'description',
        'type_page',
        'article',
        'transform_url',
        'stream_price',
        'marker',
        'promotion',
        'individual_price',
        'category_id',
    ];
}
