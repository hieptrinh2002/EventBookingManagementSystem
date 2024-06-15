<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use App\Helpers\ApiHelper;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class EventService
{
    private string $baseUrl;

    public function __construct()
    {
        // Sử dụng config để lấy giá trị từ biến môi trường
        $this->baseUrl = Config::get('services.merchant_event_api_base_url');
    }

    public function getAllEventsByMerchantId(string $merchantId)
    {
        try {
            $response = Http::get("{$this->baseUrl}/{$merchantId}/events");

            if ($response->successful()) {
                $events = $response->json()['data']['events'] ?? [];
                return $events;
            }

            throw new \Exception('Failed to fetch events from the API.');
        } catch (\Exception $e) {
            return [];
        }
    }

    public function createEvent(array $data)
    {
        $response = Http::post("{$this->baseUrl}/events/create", $data);
        if ($response->successful()) {
            return true;
        }
        return false;
    }

    public function getEventById(string $eventId, string $merchantId )
    {
        try {
            $response = Http::get("{$this->baseUrl}/{$merchantId}/events/{$eventId}");

            if ($response->successful()) {
                $events = $response->json()['data']['event'] ?? [];
                return $events;
            }

            throw new \Exception('Failed to fetch event by id from the API.');
        } catch (\Exception $e) {
            return null;
        }
    }

    public function update($request, $id)
    {
        $response = Http::put("{$this->baseUrl}/events/{$id}", $request->all());
        return $response->successful();
    }
}
