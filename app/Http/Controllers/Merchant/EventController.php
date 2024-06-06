<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EventService;


class EventController extends Controller
{
    private $eventService;

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
        return view('merchant.events.create');
    }

    // public function store(EventRequest $request)
    // {
    //     $this->eventService->createProduct($request->validated());
    //     return redirect()->route('merchant.events.index');
    // }

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {

    }
}
