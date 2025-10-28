<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

use App\services;
use App\serviceCategories;
use App\locations;
use App\discount;
use App\Planer;

class mainController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->dayOfWeekIso;
        $lastClosedDay = Session::get('modal_closed_day');

        // Проверяем, был ли день изменен с момента последнего закрытия
        if ($lastClosedDay != $today) {
            // Загрузите информацию за текущий день
            $planerData = Planer::where('day', $today)->first();
            if ($planerData) {
                $planerData = Planer::where('day', $today)->first();
            } else {
                $planerData = false;
            }
        } else {
            $planerData = false;
        }

        return view(
            'welcome',
            [
                'categories' => serviceCategories::all(),
                'services' => services::all(),
                'locations' => locations::all(),
                'stock' => discount::orderBy('created_at', 'desc')->get(),
                'planer' => $planerData,
            ]
        );
    }
    public function closeModal() {
        // Обновляем день закрытия в сессии
        Session::put('modal_closed_day', Carbon::now()->dayOfWeekIso);
        return response()->json(['status' => 'Modal closed']);
    }
    public function locations()
    {
        return view(
            'locations',
            [
                'locations' => locations::all(),
            ]
        );
    }
    
    public function thisDiscount($id, $name)
    {
        $discount = discount::find($id);
        return view(
            'discount',
            [
                'stock' => $discount,
            ]
        );
    }
    
    public function servicesPage()
    {
        return view(
            'services',
            [
                'categories' => serviceCategories::all(),
                'services' => services::all()
            ]
        );
    }
    public function servicesListPage()
    {
        return view(
            'service-categories',
            [
                'categories' => serviceCategories::all(),
                'services' => services::all()
            ]
        );
    }
    public function servicesCategoryPage($id)
    {
        $category = serviceCategories::find($id);
        $categoryService = services::where('category_id', $category->id)
            ->orderByRaw('LEFT(name, 1) ASC') // Сортировка по первой букве поля `name`
            ->get();

        return view(
            'category-page',
            [
                'thisCategory' => $category,
                'categories' => serviceCategories::all(),
                'services' => $categoryService,
            ]
        );
    }

    public function posluga($posluga)
    {
        $service = services::where('transform_url', $posluga)->first();
        if ($service) {
            $category = serviceCategories::find($service->category_id)->first();

            return view(
                'thisService',
                [
                    'categories' => $category,
                    'service' => $service,
                ]
            );
        } else {
            return abort(404);
        }
    }

    public function survey15(Request $req)
    {
        $apiToken = "6769093680:AAF3JfdRWXdaEusU-30CY4PJM4NCM7bC2wM";
        $chatId = "-1002202176424";

        // Собираем ответы опроса
        $questions = [
            'П1' => $req->input('question1'),
            'П2' => $req->input('question2'),
            'П3' => $req->input('question3'),
            'П4' => $req->input('question4'),
            'П4-Інше' => $req->input('question4-other'),
            'П5' => $req->input('question5'),
            'П5-Інше' => $req->input('question5-other'),
            'П6' => $req->input('question6'),
            'П6-Інше' => $req->input('question6-other'),
            'П7' => $req->input('question7'),
            'П7-Інше' => $req->input('question7-other'),
            'П8' => $req->input('question8'),
            'П8-Інше' => $req->input('question8-other'),
            'Телефон' => $req->input('question9'),
        ];

        // Форматируем сообщение для Telegram
        $message = "<b>Результати опитування:</b>\n\n";

        foreach ($questions as $key => $answer) {
            if ($answer) {
                // Если это обычный ответ
                if (strpos($key, '-other') === false) {
                    $message .= "<b>" . ucfirst(str_replace('-', ' ', $key)) . ":</b> " . $answer . "\n";
                } else {
                    // Если это ответ "Свій варіант"
                    $message .= "<b>" . ucfirst(str_replace('-other', '', str_replace('-', ' ', $key))) . " — Свій варіант:</b> " . $answer . "\n";
                }
            }
        }

        // Отправляем сообщение через Telegram API
        $url = "https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chatId&text=" . urlencode($message) . "&parse_mode=HTML";
        $response = file_get_contents($url);

        return redirect()->route('thanks');
    }

    public function indexDelivery()
    {
        $locations = locations::all();

        return view('delivery', ['locations' => $locations]);
    }
    public function indexLocation($seo_link)
    {
        $locations = locations::all();
        $find = locations::where('seo_link', $seo_link)->first();
        if ($find) {
            return view('adress', ['locations' => $locations, 'data' => $find]);
        }

        return abort(404);
    }
}
