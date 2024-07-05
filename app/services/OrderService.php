<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

class OrderService
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = Config::get('services.merchant_api_base_url')."/orders";
    }

    public static function processCheckout(array $initOrderRequest): \Illuminate\Http\Client\Response
    {
        return Http::post("http://localhost:8080/order/api/create", $initOrderRequest);
    }

    public static function getOrderByUserId(string $userId): \Illuminate\Http\Client\Response
    {
        return Http::get("http://localhost:8080/order/api/get-by-user/" . $userId);
    }

    public static function getOrderById($orderId): \Illuminate\Http\Client\Response
    {
        return Http::get("http://localhost:8080/order/api/get-detail/" . $orderId);
    }

    public function getAllOrdersToday(string $merchantId)
    {
        return $this->getAllOrdersByEndpoint("/today/{$merchantId}");
    }

    public function getAllOrdersPerMonth(string $merchantId, int $month, int $year)
    {
        return $this->getAllOrdersByEndpoint("/month/{$year}/{$month}/{$merchantId}");
    }

    public function getAllOrdersPerYear(string $merchantId, int $year)
    {
        return $this->getAllOrdersByEndpoint("/year/{$year}/{$merchantId}");
    }

    private function getAllOrdersByEndpoint(string $endpoint)
    {
        try {
            $response = Http::withToken(Cookie::get('merchant_jwt'))->get("{$this->baseUrl}{$endpoint}");
            if ($response->successful()) {
                return $response->json()['data']['orders'] ?? [];
            }

            throw new \Exception('Failed to fetch orders from the API.');
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getOrderByEventId(array $orders, string $eventId) {

        // Convert the array to a Laravel collection
        $ordersCollection = collect($orders);

        // Filter the collection
        $filteredOrders = $ordersCollection->where('eventId', $eventId);

        // Convert the filtered collection back to an array
        $filteredOrdersArray = $filteredOrders->all();

        // Output the result
        return $filteredOrdersArray;
    }
}
