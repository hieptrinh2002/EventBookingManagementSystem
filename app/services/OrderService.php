<?php

namespace App\services;

use function App\Http\services\handle_payment;
use Illuminate\Support\Facades\Http;

class OrderService
{
    public static function processCheckout(array $initOrderRequest): \Illuminate\Http\Client\Response
    {
        return Http::post("http://localhost:8080/order/api/create", $initOrderRequest);

//        if (!$response->successful()) {
//            $error = $response->json();
//            return response()->json(['error' => $error['message'] ?? 'Unknown error occurred during checkout.'], $response->status());
//        }
//
//        // Assuming you want to return the successful response data as an array
//        $responseData = $response->json();
//        return response()->json($responseData);
    }

}
