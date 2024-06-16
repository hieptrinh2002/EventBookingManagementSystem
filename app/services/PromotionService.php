<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;


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
            $response = Http::get("{$this->baseUrl}/{$merchantId}/promotions");
            if ($response->successful()) {
                $promotions = $response->json()['data']['promotions'] ?? [];
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
        $response = Http::post("{$this->baseUrl}/promotions", $data);
        return $response->successful();
    }

    public function getPromotionById(string $promotionId)
    {
        try {
            $response = Http::get("{$this->baseUrl}/promotions/{$promotionId}");

            if ($response->successful()) {
                $promotions = $response->json()['data']['promotion'] ?? [];
                return $promotions;
            }

            throw new \Exception('Failed to fetch promotion by id from the API.');
        } catch (\Exception $e) {
            return null;
        }
    }

    public function update($request, $id)
    {
        $response = Http::put("{$this->baseUrl}/promotions/{$id}", $request->all());
        return $response->successful();
    }
}
