<?php

namespace App\Http\Controllers;

use App\Models\order\request\InitOrderRequest;
use App\services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    //
    public function index($eventId)
    {

        $apiUrl = "http://localhost:8080/event/api/{$eventId}"; // Replace with your actual API URL
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            // Decode the JSON response to an array
            $responseData = $response->json();

            // Check if the status is SUCCESS and data exists
            if ($responseData['status'] === 'SUCCESS' && isset($responseData['data'])) {
                // Extract the data object
                $event = $responseData['data'];

                // Set the default quantity display
                $quantityDisplay = 1;

                // Pass both variables to the view
                return view('checkout.index', compact('event', 'quantityDisplay'));
            } else {
                // Handle the case where the response status is not SUCCESS or data is missing
                return redirect()->back()->with('error', 'Invalid event data.');
            }
        } else {
            // Handle the case where the API call fails
            return redirect()->back()->with('error', 'Unable to fetch event details.');
        }

    }

    public function processCheckout($eventId,Request $request)
    {
        $userId = "a9d4c20f-f188-440a-b2ac-c1da82939763";
        $email = $request->input('email');
        $address = $request->input('address');
        $paymentMethod = $request->input('paymentMethod');
        $quantity = $request->input('quantity');
        $currency = "VND";

        $orderData = [
            'email' => $email,
            'address' => $address,
            'paymentMethod' => $paymentMethod,
            'quantity' => 1, // Assuming quantity is always 1
            'currency' => $currency,
            'userId' => $userId,
            'eventId' => $eventId, // Make sure eventId is coming from request
        ];

        $initOrderResponses = OrderService::processCheckout($orderData);

        if (!$initOrderResponses->successful()) {
            $error = $initOrderResponses->json();
            return view("error.index");
        }

        echo "<br>";
        print_r($initOrderResponses->json()['data']['paymentUrl']);
        echo "<br>";

        $paymentUrl = $initOrderResponses->json('paymentUrl');

        $this->Redirect($initOrderResponses->json()['data']['paymentUrl']);

        $event = [
            "id" => "cbda15bf-ec8b-40a4-96a9-38ae62b96710",
            "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
            "title" => "We speak Football 1",
            "description" => "This is a talk show for EURO program.",
            "startDate" => "2024-05-25 15:20:15",
            "endDate" => "2024-05-30 15:20:15",
            "location" => "Hùng vương Plaza",
            "type" => "TALK_SHOW",
            "status" => "HAPPENING",
            "minQuantity" => 50,
            "maxQuantity" => 100,
            "stock" => 12,
            "price" => 100000,
            "currency" => "VND",
            "eventImg" => "imageUrl"
        ];

        $quantityDisplay = 1;


        return view('checkout.index',compact('event', 'quantityDisplay'));
    }

    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        exit();
    }

//    public function processCheckout($eventId,Request $request)
//    {
//        $userId = "a9d4c20f-f188-440a-b2ac-c1da82939763";
//        $email = $request->input('email');
//        $address = $request->input('address');
//        $paymentMethod = $request->input('paymentMethod');
//        $quantity = $request->input('quantity');
//        $currency = "VND";
//
//        $orderData = [
//            'email' => $email,
//            'address' => $address,
//            'paymentMethod' => $paymentMethod,
//            'quantity' => 1, // Assuming quantity is always 1
//            'currency' => $currency,
//            'userId' => $userId,
//            'eventId' => $eventId, // Make sure eventId is coming from request
//        ];
//
//        $initOrderResponses = OrderService::processCheckout($orderData);
//
//
//
//        $event = [
//            "id" => "cbda15bf-ec8b-40a4-96a9-38ae62b96710",
//            "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
//            "title" => "We speak Football 1",
//            "description" => "This is a talk show for EURO program.",
//            "startDate" => "2024-05-25 15:20:15",
//            "endDate" => "2024-05-30 15:20:15",
//            "location" => "Hùng vương Plaza",
//            "type" => "TALK_SHOW",
//            "status" => "HAPPENING",
//            "minQuantity" => 50,
//            "maxQuantity" => 100,
//            "stock" => 12,
//            "price" => 100000,
//            "currency" => "VND",
//            "eventImg" => "imageUrl"
//        ];
//
//        $quantityDisplay = 1;
//
//        return view('checkout.index',compact('event', 'quantityDisplay'));
//    }
}
