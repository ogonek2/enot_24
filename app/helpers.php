<?php

use Illuminate\Support\Str;
use App\serviceCategories;

if (!function_exists('get_all_services')) {
    function get_all_services()
    {
        return serviceCategories::all();
    }
}