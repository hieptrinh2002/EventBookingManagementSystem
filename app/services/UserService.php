<?php

namespace App\services;

use Illuminate\Support\Facades\Http;

class UserService
{

    public static function getUserInfoByUserId($userId): \Illuminate\Http\Client\Response
    {
        return Http::get("http://localhost:8081/user-profiles/" . $userId);
    }

}
