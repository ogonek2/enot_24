<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\bonuses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use App\authReserve;

use App\notificationMessages;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string',  'unique:users'], // Проверка на уникальность и формат украинского номера
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|string', // Валидация украинского номера телефона
            'password' => 'required|string',
        ]);
    }
    protected function credentials(Request $request)
    {
        return ['phone' => $request->get('phone'), 'password' => $request->get('password')];
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    
    protected function create(array $data)
    {
        $userCreate = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        $bonusNumber = bonuses::generateUniqueBonusNumber();
        $barcode = DNS1D::getBarcodePNG($bonusNumber, 'C39');
        $bonusCard = bonuses::create([
            'user_id' => $userCreate->id,
            'bonus_number' => $bonusNumber,
            'bonus_code' => $barcode,
        ]);
        User::find($userCreate->id)->update([
            'bonus_card_id' => $bonusCard->id,
        ]);

        $authReserve = authReserve::where('reserve_phone', $data['phone'])->first();
        if ($authReserve) {
            $bonusCard->update(['bonus' => $authReserve->reserve_bonus]);
            $authReserve->delete();
            notificationMessages::create([
                'from_profile' => 1,
                'to_user_is' => $userCreate->id,
                'message' => 'Привіт! За вашим номером було зарезервовано бонуси. Ми успішно перенесли їх на ваш рахунок!',
            ]);
        }

        $messageSystem = '<b>Вітаємо зі створенням облікового запису!</b><br>Тут ви будете отримувати службові сповіщення';
        notificationMessages::create([
            'from_profile' => 2,
            'to_user_is' => $userCreate->id,
            'message' => $messageSystem,
        ]);
        notificationMessages::create([
            'from_profile' => 1,
            'to_user_is' => $userCreate->id,
            'message' => $messageSystem,
        ]);
        
        return $userCreate;
    }
}
