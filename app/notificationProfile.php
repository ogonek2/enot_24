<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notificationProfile extends Model
{
    protected $fillable = [
        'icon',
        'name',
        'title',
        'message_permisson',
    ];
}
