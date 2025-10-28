<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceCategories extends Model
{
    protected $fillable = [
        'id', 'category', 'catyegory_img', 'category_type',
    ];
}
