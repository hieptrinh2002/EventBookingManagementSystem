<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class PromotionService
{
    public static function getAllPromotions()
    {
    }

    public static function createPromotion(array $data)
    {
        // Gọi API service để tạo promotion mới
        $response = Http::post(env('PROMOTION_API_URL'), $data);
        return $response->successful();
    }

    public function create($request): mixed
    {
        $dataCreate = $request->all();
        $response = Http::post(env('PROMOTION_API_URL'), $dataCreate);
        return $response->successful();
    }
}
