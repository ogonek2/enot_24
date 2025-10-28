<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notificationMessages extends Model
{
    protected $fillable = [
        'from_profile',
        'to_user_is',
        'message',
    ];
}
