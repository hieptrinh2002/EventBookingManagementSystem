<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

class PromotionService
{
    private string $baseUrl;

    public function __construct()
    {
        // Sử dụng config để lấy giá trị từ biến môi trường
        $this->baseUrl = Config::get('services.merchant_api_base_url');
    }

    public function getAllPromotionsByMerchantId(string $merchantId)
    {
        try {
            $response = Http::withToken(Cookie::get('merchant_jwt'))->get("{$this->baseUrl}/{$merchantId}/promotions");
            if ($response->successful()) {
                $promotions = $response->json()['data'] ?? [];
                return $promotions;
            }

            throw new \Exception('Failed to fetch promotions from the API.');
        } catch (\Exception $e) {
            return [];
        }
    }

    public function createPromotion(array $data)
    {
        // Gọi API service để tạo promotion mới
        $response = Http::withToken(Cookie::get('merchant_jwt'))->post("{$this->baseUrl}/promotions/create", $data);
        return $response->successful();
    }

    public function getPromotionById(string $promotionId)
    {
        try {
            $response = Http::withToken(Cookie::get('merchant_jwt'))->get("{$this->baseUrl}/promotions/{$promotionId}");

            if ($response->successful()) {
                $promotions = $response->json()['data'] ?? [];
                return $promotions;
            }

            throw new \Exception('Failed to fetch promotion by id from the API.');
        } catch (\Exception $e) {
            return null;
        }
    }

    public function update($request, $id)
    {
        $response = Http::withToken(Cookie::get('merchant_jwt'))->put("{$this->baseUrl}/promotions/{$id}", $request->all());
        return $response->successful();
    }
}
