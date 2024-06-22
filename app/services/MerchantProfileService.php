<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class MerchantProfileService
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = Config::get('services.merchant_api_base_url');
    }

    public function getMerchantById(string $merchantId)
    {
        try {
            $response = Http::get("{$this->baseUrl}/{$merchantId}");
            if ($response->successful()) {
                $events = $response->json()['data'] ?? [];
                return $events;
            }

            throw new \Exception('Failed to fetch events from the API.');
        } catch (\Exception $e) {
            return [];
        }
    }
}
