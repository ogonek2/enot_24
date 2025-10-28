<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class loyalty extends Model
{
    protected $fillable = [
        'user_id',
        'bonus_number',
        'bonus',
    ];

    protected $table = 'loyalty';

    public static function generateUniqueBonusNumber()
    {
        do {
            // Генерация 12-значного номера
            $bonusNumber = mt_rand(100000000000, 999999999999);

            // Проверка уникальности
            $exists = DB::table('loyalty')->where('bonus_number', $bonusNumber)->exists();

        } while ($exists);

        return $bonusNumber;
    }
}
