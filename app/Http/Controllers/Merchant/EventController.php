<?php

namespace App\Http\Controllers\Merchant;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EventService;
use App\Http\Requests\events\CreateEventRequest;


class EventController extends Controller
{
    protected EventService $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        //$events = $this->eventService->getAllEvents();
        $events = [
            [
                "id" => "cbda15bf-ec8b-40a4-96a9-38ae62b96710",
                "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
                "title" => "We speak Football 1",
                "description" => "This is an talk show for ....",
                "startDate" => "2024-05-25 15:20:15",
                "endDate" => "2024-05-30 15:20:15",
                "location" => "Hùng vương Plaza",
                "type" => "TALK_SHOW",
                "status" => "HAPPENING",
                "minQuantity" => 50,
                "maxQuantity" => 100,
                "price" => 100000,
                "currency" => "VND"
            ],
            [
                "id" => "cbda15bf-cnlg-248a-96a9-vnfdgffghf0",
                "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
                "title" => "We speak Football 2",
                "description" => "This is an talk show for ....",
                "startDate" => "2024-05-25 15:20:15",
                "endDate" => "2024-05-30 15:20:15",
                "location" => "Hùng vương Plaza",
                "type" => "TALK_SHOW",
                "status" => "HAPPENING",
                "minQuantity" => 155,
                "maxQuantity" => 200,
                "price" => 100000,
                "currency" => "VND"
            ],
            [
                "id" => "cbda15bf-cnlg-248a-96a9-vnfdgffghf0",
                "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
                "title" => "We speak Football 2",
                "description" => "This is an talk show for ....",
                "startDate" => "2024-05-25 15:20:15",
                "endDate" => "2024-05-30 15:20:15",
                "location" => "Hùng vương Plaza",
                "type" => "TALK_SHOW",
                "status" => "HAPPENING",
                "minQuantity" => 155,
                "maxQuantity" => 200,
                "price" => 100000,
                "currency" => "VND"
            ],
            [
                "id" => "cbda15bf-cnlg-248a-96a9-vnfdgffghf0",
                "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
                "title" => "We speak Football 2",
                "description" => "This is an talk show for ....",
                "startDate" => "2024-05-25 15:20:15",
                "endDate" => "2024-05-30 15:20:15",
                "location" => "Hùng vương Plaza",
                "type" => "TALK_SHOW",
                "status" => "HAPPENING",
                "minQuantity" => 155,
                "maxQuantity" => 200,
                "price" => 100000,
                "currency" => "VND"
            ],
            [
                "id" => "cbda15bf-cnlg-248a-96a9-vnfdgffghf0",
                "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
                "title" => "We speak Football 2",
                "description" => "This is an talk show for ....",
                "startDate" => "2024-05-25 15:20:15",
                "endDate" => "2024-05-30 15:20:15",
                "location" => "Hùng vương Plaza",
                "type" => "TALK_SHOW",
                "status" => "HAPPENING",
                "minQuantity" => 155,
                "maxQuantity" => 200,
                "price" => 100000,
                "currency" => "VND"
            ],
            [
                "id" => "cbda15bf-cnlg-248a-96a9-vnfdgffghf0",
                "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
                "title" => "We speak Football 2",
                "description" => "This is an talk show for ....",
                "startDate" => "2024-05-25 15:20:15",
                "endDate" => "2024-05-30 15:20:15",
                "location" => "Hùng vương Plaza",
                "type" => "TALK_SHOW",
                "status" => "HAPPENING",
                "minQuantity" => 155,
                "maxQuantity" => 200,
                "price" => 100000,
                "currency" => "VND"
            ],
            [
                "id" => "cbda15bf-cnlg-248a-96a9-vnfdgffghf0",
                "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
                "title" => "We speak Football 2",
                "description" => "This is an talk show for ....",
                "startDate" => "2024-05-25 15:20:15",
                "endDate" => "2024-05-30 15:20:15",
                "location" => "Hùng vương Plaza",
                "type" => "TALK_SHOW",
                "status" => "HAPPENING",
                "minQuantity" => 155,
                "maxQuantity" => 200,
                "price" => 100000,
                "currency" => "VND"
            ]
        ];
        return view('merchant.events.index', ['events' => $events]);
    }

    public function create()
    {
        $merchant_id = 1;//auth()->user()->merchant_id; // hoặc bất kỳ cách nào bạn lấy được merchant_id
        return view('merchant.events.create', ['merchant_id' => $merchant_id]);
    }

    public function store(CreateEventRequest $request)
    {
        //$data = $request->all();
        // dd($data);
        // $this->eventService->create($data);

        // return to_route('merchant.events.index')->with(['message' => 'create success']);

        $data = '{
            "merchantId": "a0a9be74-199c-4a76-813e-cd7553065480",
            "title": "Football Discussion Event",
            "description": "Join us for an exciting discussion about the latest in football.",
            "startDate": "2024-06-15T10:00:00Z",
            "endDate": "2024-06-15T12:00:00Z",
            "location": "123 Football Lane, Soccer City",
            "type": "SEMINAR",
            "minQuantity": 10,
            "maxQuantity": 100,
            "price": 50,
            "currency": "USD"
        }';

        $eventData = json_decode($data, true);

        $response = Http::post('http://localhost:8080/event/api/create', $eventData);

        dd($response->json());
        if ($response->successful()) {
            $product = $response->json();
            // Return the created product as JSON
            return response()->json($product, 201);
        } else {
            // Handle the error
            return response()->json(['error' => 'Failed to create product'], 500);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //find event by id -> $event
        $event = [
            "id" => "cbda15bf-ec8b-40a4-96a9-38ae62b96710",
            "merchantId" => "cbda15bf-ec8b-40a4-96a9-38dfvbg96710",
            "title" => "We speak Football 1",
            "description" => "This is an talk show for ....",
            "startDate" => "2024-05-25 15:20:15",
            "endDate" => "2024-05-30 15:20:15",
            "location" => "Hùng vương Plaza",
            "type" => "TALK SHOW",
            "status" => "HAPPENING",
            "minQuantity" => 50,
            "maxQuantity" => 100,
            "price" => 10335453000,
            "currency" => "VND"
        ];
        return view("merchant.events.edit", ["event" => $event]);
    }

    public function update(Request $request, string $id)
    {
        //
        $this->eventService->update($request, $id);
        return to_route('users.index')->with(['message' => 'Update success']);
    }


    public function destroy(string $id)
    {

    }
}
