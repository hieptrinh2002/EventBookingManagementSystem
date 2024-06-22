<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class EventService
{
    private string $baseUrl;
    private string $eventBaseUrl;

    public function __construct()
    {
        // Sử dụng config để lấy giá trị từ biến môi trường
        $this->baseUrl = Config::get('services.merchant_api_base_url');
        $this->eventBaseUrl = Config::get('services.event_api_base_url');
    }

    public function getAllEventsByMerchantId(string $merchantId)
    {
        try {
            $response = Http::withToken(Cookie::get('merchant_jwt'))->get("{$this->baseUrl}/{$merchantId}/events");
            if ($response->successful()) {
                $events = $response->json()['data']['events'] ?? [];
                return $events;
            }

            throw new \Exception('Failed to fetch events from the API.');
        } catch (\Exception $e) {
            return [];
        }
    }


    public function getAllEvents()
    {
        try {
            $response = Http::get("{$this->eventBaseUrl}/get-all");
            if ($response->successful()) {
                $events = $response->json()['data'] ?? [];
                return $events;
            }

            throw new \Exception('Failed to fetch events from the API.');
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getEventDetails(string $eventId)
    {
        try {
            $response = Http::get("{$this->eventBaseUrl}/{$eventId}");
            if ($response->successful()) {
                $event = $response->json()['data'] ?? [];
                return $event;
            }

            throw new \Exception('Failed to fetch event details from the API.');
        } catch (\Exception $e) {
            return [];
        }
    }

    public function createEvent(array $data)
    {
        try {
            $response = Http::withToken(Cookie::get('merchant_jwt'))->post("{$this->baseUrl}/events/create", $data);
            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getEventById(string $eventId)
    {
        try {
            $response = Http::withToken(Cookie::get('merchant_jwt'))->get("{$this->baseUrl}/events/{$eventId}");

            if ($response->successful()) {
                $events = $response->json()['data'] ?? [];
                return $events;
            }

            throw new \Exception('Failed to fetch event by id from the API.');
        } catch (\Exception $e) {
            return null;
        }
    }

    public function update($request, $id)
    {
        $response = Http::withToken(Cookie::get('merchant_jwt'))->put("{$this->baseUrl}/events/{$id}", $request->all());
        return $response->successful();
    }
}
