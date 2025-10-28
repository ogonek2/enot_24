<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $fillable = [
        'assessment',
        'user_id',
    ];
}
