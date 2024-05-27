<?php
namespace App\Services;

use App\Helpers\ApiHelper;

class EventService
{
    public static function getAllEvents()
    {
        $data = ApiHelper::get(env('EVENT_API_URL'));
        return $data;
    }
}
