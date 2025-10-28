<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use App\services;
use App\serviceCategories;
use App\locations;
use App\discount;
use Redirect;

class adminController extends Controller
{

    // Locations
    public function indexLocations()
    {
        return view(
            'admin.locations',
            [
                'locations' => locations::all()
            ]
        );
    }
    public function deleteLocation($id)
    {
        locations::find($id)->delete();
        return redirect()->back()->with('success', 'Успішно видалено');
    }
    public function storeLocation(Request $request)
    {
        // Проверяем входные данные на валидность
        $validatedData = $request->validate([
            'street' => 'required|min:1|max:255',
            'workinghourse' => 'required|min:1|max:255',
            'link_map' => 'required|min:1|max:255',
        ]);

        // Создаем новую локацию
        $locations = locations::create([
            'street' => $request->input('street'),
            'workinghourse' => $request->input('workinghourse'),
            'link_map' => $request->input('link_map'),
        ]);

        $nameLocation = $request->input('street');

        // Редирект обратно на страницу с формой добавления локации
        return redirect()->back()->with('success', 'Локація ' . $nameLocation . ' - успішно створено!');
    }
    public function editLocation(Request $request, $id)
    {
        $locations = locations::findOrFail($id); // Найти локацию по идентификатору

        // Обновить данные локации
        $locations->update([
            'street' => $request->input('street'),
            'workinghourse' => $request->input('workinghourse'),
            'link_map' => $request->input('link_map'),
            'lat' => $request->lat,
            'lng' => $request->lng,
            'value' => $request->value ?? null,
            'seo_link' => $request->seo_link,
        ]);

        $nameLocation = $request->input('street');

        // Редирект обратно на страницу, где отображается список локаций
        return redirect()->back()->with('success', 'Локація ' . $nameLocation . ' - Успішно оновлена!');
    }
    
    public function editLocationImage(Request $req, $id)
    {
        // Находим категорию по ID
        $stock = locations::find($id);
        if (!$stock) {
            return redirect()->back()->with('success', 'Категория не найдена');
        }

        // Сохраняем старое изображение
        $oldIcon = $stock->banner;
        $fileToDelete = public_path('storage/' . $oldIcon);

        // Проверяем, существует ли файл и можно ли его удалить
        if ($oldIcon && file_exists($fileToDelete)) {
            if (!unlink($fileToDelete)) {
                return redirect()->back()->with('success', 'Не вдалось видалити старе зображення');
            }
        }

        // Загружаем и сохраняем новое изображение
        if ($req->hasFile('banner')) {
            $newIcon = $req->file('banner')->store('src/locations_image', 'public');
            $stock->banner = $newIcon;
            $stock->save();
            return redirect()->back()->with('success', 'Зображення локації оновлено');
        } else {
            return redirect()->back()->with('success', 'Нове зображення не звантажено');
        }
    }

    // Services
    public function indexServices()
    {
        return view(
            'admin.services',
            [
                'categories' => serviceCategories::all(),
                'services' => services::all()
            ]
        );
    }

    public function storeCategory(Request $req)
    {
        // Проверяем входные данные на валидность
        $validatedData = $req->validate([
            'category' => 'required|min:1|max:255',
        ]);

        $category_img = $req->file('category_img')->store('src/categories_images', 'public');
        $serviceCategories = serviceCategories::create([
            'category' => $req->input('category'),
            'catyegory_img' => $category_img,
            'category_type' => $req->input('category_type'),
        ]);

        $nameCategory = $req->input('category');

        // Редирект обратно на страницу с формой добавления локации
        return redirect()->back()->with('success', 'Категорія ' . $nameCategory . ' - успішно створено!');
    }
    public function editCategoryImage(Request $req, $id)
    {
        // Находим категорию по ID
        $serviceCategories = ServiceCategories::find($id);
        if (!$serviceCategories) {
            return redirect()->back()->with('success', 'Категория не найдена');
        }

        // Сохраняем старое изображение
        $oldIcon = $serviceCategories->catyegory_img;
        $fileToDelete = public_path('storage/' . $oldIcon);

        // Проверяем, существует ли файл и можно ли его удалить
        if ($oldIcon && file_exists($fileToDelete)) {
            if (!unlink($fileToDelete)) {
                return redirect()->back()->with('success', 'Не удалось удалить старое изображение');
            }
        }

        // Загружаем и сохраняем новое изображение
        if ($req->hasFile('category_img')) {
            $newIcon = $req->file('category_img')->store('src/categories_images', 'public');
            $serviceCategories->catyegory_img = $newIcon;
            $serviceCategories->save();
            return redirect()->back()->with('success', 'Изображение категории успешно обновлено');
        } else {
            return redirect()->back()->with('success', 'Новое изображение не загружено');
        }
    }
    public function editCategory(Request $request, $id)
    {
        $serviceCategories = serviceCategories::findOrFail($id); // Найти локацию по идентификатору

        // Обновить данные локации
        $serviceCategories->update([
            'category' => $request->input('category'),
            'category_type' => $request->input('category_type'),
        ]);

        $nameCategory = $request->input('category');

        // Редирект обратно на страницу, где отображается список локаций
        return redirect()->back()->with('success', 'Категорія ' . $nameCategory . ' - Успішно оновлена!');
    }
    public function deleteCategory($id)
    {
        services::where('category_id', $id)->delete();
        serviceCategories::find($id)->delete();
        return redirect()->back()->with('success', 'Успішно видалено');
    }
    // Make service
    public function storeService(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|min:1|max:255',
        ]);
        if ($validatedData) {
            services::create([
                'name' => $req->name,
                'category_id' => $req->category_id,
                'individual_price' => $req->individual_price ?? 0,
                'stream_price' => $req->stream_price ?? 0,
            ]);
            $message = 'Збережено!';
        } else {
            $message = 'Виникла помилка.';
        }
        return redirect()->back()->with('success', $message);
    }

    public function editService(Request $request, $id)
    {
        $services = services::findOrFail($id); // Найти локацию по идентификатору

        // Обновить данные локации
        $services->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'individual_price' => $request->individual_price,
            'stream_price' => $request->stream_price,
            'marker' => $request->marker ?? null,
        ]);

        $nameService = $request->input('name');

        // Редирект обратно на страницу, где отображается список локаций
        return redirect()->back()->with('success', 'Категорія ' . $nameService . ' - Успішно оновлена!');
    }
    
    public function editServicePage(Request $request, $id)
    {
        $services = services::findOrFail($id); // Найти локацию по идентификатору

        // Обновить данные локации
        $services->update([
            'name_page' => $request->name_page,
            'seo_description' => $request->seo_description,
            'description' => $request->description,
            'seo_keywords' => $request->seo_keywords,
        ]);

        $nameService = $request->input('name_page');

        // Редирект обратно на страницу, где отображается список локаций
        return redirect()->back()->with('success', 'Категорія ' . $nameService . ' - Успішно оновлена!');
    }
    
    public function deleteService($id)
    {
        services::find($id)->delete();
        return redirect()->back()->with('success', 'Успішно видалено');
    }

    public function indexStock()
    {
        return view(
            'admin.stock',
            [
                'categories' => serviceCategories::all(),
                'services' => services::all(),
                'stock' => discount::all(),
            ]
        );
    }
    public function storeStock(Request $req)
    {

        $banner = $req->file('banner')->store('src/stock_images', 'public');
        $stock = discount::create([
            'name' => $req->input('name'),
            'discount_action' => $req->input('discount_action'),
            'telegram_name' => $req->input('telegram_name'),
            'umowy' => $req->input('umowy'),
            'locations' => $req->input('locations'),
            'banner' => $banner,
        ]);

        $nameStock = $req->input('name');

        // Редирект обратно на страницу с формой добавления локации
        return redirect()->back()->with('success', 'Акція ' . $nameStock . ' - успішно створено!');
    }
    public function editStockImage(Request $req, $id)
    {
        // Находим категорию по ID
        $stock = discount::find($id);
        if (!$stock) {
            return redirect()->back()->with('success', 'Категория не найдена');
        }

        // Сохраняем старое изображение
        $oldIcon = $stock->catyegory_img;
        $fileToDelete = public_path('storage/' . $oldIcon);

        // Проверяем, существует ли файл и можно ли его удалить
        if ($oldIcon && file_exists($fileToDelete)) {
            if (!unlink($fileToDelete)) {
                return redirect()->back()->with('success', 'Не удалось удалить старое изображение');
            }
        }

        // Загружаем и сохраняем новое изображение
        if ($req->hasFile('banner')) {
            $newIcon = $req->file('banner')->store('src/stock_images', 'public');
            $stock->banner = $newIcon;
            $stock->save();
            return redirect()->back()->with('success', 'Изображение категории успешно обновлено');
        } else {
            return redirect()->back()->with('success', 'Новое изображение не загружено');
        }
    }
    public function editStock(Request $req, $id)
    {
        discount::find($id)->update([
            'name' => $req->input('name'),
            'discount_action' => $req->input('discount_action') ?? null,
            'umowy' => $req->input('umowy'),
            'telegram_name' => $req->input('telegram_name'),
            'locations' => $req->input('locations'),
        ]);

        $nameStock = $req->input('name');

        // Редирект обратно на страницу с формой добавления локации
        return redirect()->back()->with('success', 'Акція ' . $nameStock . ' - успішно оновлена!');
    }
    public function stockDelete($id)
    {
        discount::find($id)->delete();
        return redirect()->back()->with('success', 'Успішно видалено');
    }
    
    public function refreshServices()
    {
        $services = services::all();
        foreach ($services as $el) {
            $link_t = $el->name_page;
            $link_t = mb_strtolower($link_t); // Приводим к нижнему регистру
            $link_t = str_replace(
                ['а', 'б', 'в', 'г', 'ґ', 'д', 'е', 'є', 'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я'],
                ['a', 'b', 'v', 'g', 'g', 'd', 'e', 'ye', 'zh', 'z', 'y', 'i', 'yi', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'kh', 'ts', 'ch', 'sh', 'shch', '', 'yu', 'ya'],
                $link_t
            ); // Заменяем кириллицу на латиницу
            $link_t = preg_replace('/[^\w\-]+/', '-', $link_t);

            $el->update([
                'transform_url' => $link_t
            ]);
        }

        return redirect()->back();
    }
    public function refreshDiscount()
    {
        $discounts = discount::all();
        foreach ($discounts as $el) {
            $link_t = $el->name;
            $link_t = mb_strtolower($link_t); // Приводим к нижнему регистру
            $link_t = str_replace(
                ['а', 'б', 'в', 'г', 'ґ', 'д', 'е', 'є', 'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я'],
                ['a', 'b', 'v', 'g', 'g', 'd', 'e', 'ye', 'zh', 'z', 'y', 'i', 'yi', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'kh', 'ts', 'ch', 'sh', 'shch', '', 'yu', 'ya'],
                $link_t
            ); // Заменяем кириллицу на латиницу
            $link_t = preg_replace('/[^\w\-]+/', '-', $link_t);

            $el->update([
                'link_name' => $link_t
            ]);
        }

        return redirect()->back();
    }
    
    public function getServicesSitemap()
    {
        // Извлекаем данные о сервисах из базы данных
        $services = services::all(); // Замените на актуальную модель
    
        // Начинаем формирование XML
        $xmlContent = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xmlContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
    
        // Цикл по каждой услуге для генерации URL
        foreach ($services as $service) {
            $xmlContent .= '    <url>' . PHP_EOL;
            $xmlContent .= '        <loc>' . url('https://enot-24.com.ua/poslugi/' . $service->transform_url) . '</loc>' . PHP_EOL; // Предположим, что у вас есть поле slug
            $xmlContent .= '        <lastmod>' . now()->toDateString() . '</lastmod>' . PHP_EOL;
            $xmlContent .= '        <changefreq>weekly</changefreq>' . PHP_EOL;
            $xmlContent .= '        <priority>0.7</priority>' . PHP_EOL;
            $xmlContent .= '    </url>' . PHP_EOL;
        }
    
        $xmlContent .= '</urlset>' . PHP_EOL;
    
        // Возвращаем XML
        return response($xmlContent, 200)
                ->header('Content-Type', 'application/xml');
    }

}
