<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planer;

class PlanerController extends Controller
{
    // Показать список всех модальных окон
    public function index()
    {
        $planers = Planer::all();
        return view('userAdmin.planer', compact('planers'));
    }

    // Показать форму для создания нового модального окна
    public function create()
    {
        return view('planer.create');
    }

    // Сохранить новое модальное окно в базу данных
    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|integer|min:1|max:7|unique:planers,day', // уникальное значение для дня
            'content' => 'required|string',
        ]);

        Planer::create($request->all());

        return redirect()->back()->with('success', 'Модальное окно добавлено');
    }

    // Обновить существующее модальное окно
    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|integer|min:1|max:7',
            'content' => 'required|string',
        ]);

        $planer = Planer::findOrFail($id);
        $planer->update($request->all());

        return redirect()->back()->with('success', 'Модальное окно обновлено');
    }
    // Удалить модальное окно
    public function destroy($id)
    {
        $planer = Planer::findOrFail($id);
        $planer->delete();

        return redirect()->back()->with('success', 'Модальное окно удалено');
    }
}
