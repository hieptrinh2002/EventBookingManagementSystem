<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class AuthenticationService
{
    private string $baseUrl;

    public function __construct()
    {
        // Sử dụng config để lấy giá trị từ biến môi trường
        $this->baseUrl = Config::get('services.user_profile_url');
    }

    public function login($request)
    {
        try {

            $response = Http::post("{$this->baseUrl}/accounts/login", $request->all());
            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function register($request)
    {
        try {
            $response = Http::post("{$this->baseUrl}/accounts", $request->all());
            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
