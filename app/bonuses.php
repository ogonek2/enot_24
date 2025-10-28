<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class bonuses extends Model
{
    protected $fillable = [
        'user_id',
        'bonus_number',
        'bonus',
        'bonus_code',
    ];

    protected $table = 'bonuses';

    public static function generateUniqueBonusNumber()
    {
        do {
            // Генерация 12-значного номера
            $bonusNumber = mt_rand(100000000000, 999999999999);

            // Проверка уникальности
            $exists = DB::table('bonuses')->where('bonus_number', $bonusNumber)->exists();

        } while ($exists);

        return $bonusNumber;
    }
}
