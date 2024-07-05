<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;
use stdClass;


class AuthenticationService
{
    private string $baseUrl;

    public function __construct()
    {
        // Sử dụng config để lấy giá trị từ biến môi trường
//        $this->baseUrl = Config::get('services.user_profile_url');
        $this->baseUrl = "http://localhost:8081";
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

    public function validateAccessToken(array|string $accessToken): string
    {
        try {
            $decoded = JWT::decode($accessToken, new Key("at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa", 'HS256'));
            return $decoded->userProfileId;
        } catch (Exception $e) {
            return ""; // Token has expired
        }
    }

}
