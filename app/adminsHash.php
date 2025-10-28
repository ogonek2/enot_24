<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adminsHash extends Model
{
    protected $fillable = [
        'admin_id',
        'admin_hash_key',
    ];
}
