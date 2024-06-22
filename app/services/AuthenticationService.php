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

    public function validateAccessToken(array|string $accessToken): bool
    {
        try {
            // Decode the JWT token using the secret key
            $headers1 = new stdClass();
            $decoded = JWT::decode($accessToken, new Key("at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa", 'HS256'),$headers1);

            // Check for expired token
            if ($decoded->exp < time()) {
                return false;
            }

            // Generate a cache key using the subject (sub) claim from the token
            $cacheKey = 'access_token_' . $decoded->sub;

            // Check if the token is present in the cache
            if (!Cache::has($cacheKey)) {
                return false;
            }

            // If all checks pass, the token is valid
            return true;
        } catch (Exception $e) {
            return false; // Token has expired
        }
    }

}
