<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planer extends Model
{
    protected $fillable = [
        'title',
        'content',
        'day',
    ];
}
