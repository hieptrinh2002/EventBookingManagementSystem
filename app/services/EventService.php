<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use App\Helpers\ApiHelper;

class EventService
{
    public static function getAllEvents()
    {
        // Gọi API service để lấy danh sách event
        $response = Http::get(env('EVENT_API_URL'));
        return $response->json();
    }

    public static function createEvent(array $data)
    {
        // Gọi API service để tạo event mới
        $response = Http::post(env('EVENT_API_URL'), $data);
        return $response->successful();
    }
}
