<?php

namespace App\services;

use function App\Http\services\handle_payment;
use Illuminate\Support\Facades\Http;

class OrderService
{
    public static function processCheckout(array $initOrderRequest): \Illuminate\Http\Client\Response
    {
        return Http::post("http://localhost:8080/order/api/create", $initOrderRequest);
    }

    public static function getOrderByUserId(string $userId): \Illuminate\Http\Client\Response
    {
        return Http::get("http://localhost:8080/order/api/get-by-user/" . $userId);
    }

}
