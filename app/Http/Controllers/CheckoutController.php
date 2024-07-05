<?php

namespace App\Http\Controllers;

use App\Models\order\request\InitOrderRequest;
use App\Services\AuthenticationService;
use App\services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{

    protected AuthenticationService $authenticationService;

    public function __construct(Request $request, AuthenticationService $authenticationService)
    {
        $accessToken = $request->cookie('app-token');
        $this->authenticationService = $authenticationService;
//        $this->middleware('auth');
    }

    //
    public function index(Request $request,$eventId): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $accessToken = $request->cookie('app-token');

        if (isset($accessToken) && $this->authenticationService->validateAccessToken($accessToken) != "") {
            $isDisplay = true;
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
                    return view('checkout.index', compact('event', 'quantityDisplay','isDisplay'));
                } else {
                    // Handle the case where the response status is not SUCCESS or data is missing
                    return redirect()->back()->with('error', 'Invalid event data.');
                }
            } else {
                // Handle the case where the API call fails
                return redirect()->back()->with('error', 'Unable to fetch event details.');
            }
        }

        return redirect()->route('auth.login');

    }

    public function processCheckout($eventId,Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $accessToken = $request->cookie('app-token');

        $userId = $this->authenticationService->validateAccessToken($accessToken);

        isset($accessToken) && $this->authenticationService->validateAccessToken($accessToken) != "";

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

        $paymentUrl = $initOrderResponses->json('paymentUrl');

        $this->Redirect($initOrderResponses->json()['data']['paymentUrl']);

        $apiUrl = "http://localhost:8080/event/api/{$eventId}"; // Replace with your actual API URL
        $response = Http::get($apiUrl);
        $responseData = $response->json();
        $event = $responseData['data'];

        $quantityDisplay = 1;


        return view('checkout.index',compact('event', 'quantityDisplay'));
    }

    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        exit();
    }
}
