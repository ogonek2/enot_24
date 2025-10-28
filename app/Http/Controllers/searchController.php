<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services;
use App\serviceCategories;


class searchController extends Controller
{
    public function autocompleteSearch(Request $request) {
        $query = $request->get('query');
        
        $filterResult = services::where('seo_keywords', 'LIKE', "%{$query}%")
            ->get()
            ->flatMap(function ($service) use ($query) {
                $keywords = explode(',', $service->seo_keywords);
    
                return array_filter($keywords, function ($keyword) use ($query) {
                    return stripos(trim($keyword), $query) !== false;
                });
            })
            ->unique()
            ->map(function ($keyword) use ($query) {
                $service = services::where('seo_keywords', 'LIKE', "%{$keyword}%")->first();
                return [
                    'name' => $keyword,
                    'url' => $service ? $service->transform_url : null
                ];
            })
            ->take(10)
            ->values();
    
        return response()->json(['names' => $filterResult]);
    }
    public function resultSearch(Request $request) {
        $searchTerm = $request->input('search_input_elem');
        
        // Ищем похожее слово в таблице services
        $services = services::where('name', $searchTerm)->get();
    
        // Проверяем, что у нас есть результаты поиска
        if ($services->isEmpty()) {
            return response()->json(['message' => 'No services found'], 404);
        }
    
        // Предполагается, что у всех найденных services одна и та же категория
        $thisServiceCategory = serviceCategories::find($services->first()->category_id);
        
        if (!$thisServiceCategory) {
            return response()->json(['message' => 'Category not found'], 404);
        }
    
        return response()->json([
            'services' => $services, 
            'service_category' => $thisServiceCategory->category, 
            'service_category_img' => asset('storage/' . $thisServiceCategory->catyegory_img),
        ]);
    }
    
}
