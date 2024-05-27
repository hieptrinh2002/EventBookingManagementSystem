<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiHelper
{
    public static function get($url)
    {
        $response = Http::get($url);

        // dd($url);
        return $response -> json();
    }

    // Thêm các hàm khác như put, delete, v.v.
}
