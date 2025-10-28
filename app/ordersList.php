<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordersList extends Model
{
    protected $fillable = [
        'service_id',
        'user_phone',
        'service_price',
        'status',
    ];
}
