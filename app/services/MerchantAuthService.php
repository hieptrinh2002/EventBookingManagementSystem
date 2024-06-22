<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class MerchantAuthService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = Config::get('services.merchant_api_base_url');
    }

    public function register($data)
    {
        $response = Http::post("{$this->baseUrl}/register", $data);

        if ($response->successful()) {
            return ['success' => true, 'message' => $response->json()['message']];
        } else {
            return ['success' => false, 'message' => $response->json()['message']];
        }
    }

    public function login($data)
    {
        $response = Http::post("{$this->baseUrl}/login", $data);
        if ($response->successful()) {
            return ['success' => true, 'message' => $response->json()['message'], 'data' => $response->json()['data']];
        } else {
            return ['success' => false, 'message' => $response->json()['message']];
        }
    }
}
