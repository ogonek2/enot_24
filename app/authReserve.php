<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class authReserve extends Model
{
    protected $fillable = [
        'reserve_phone',
        'reserve_bonus',
    ];
}
