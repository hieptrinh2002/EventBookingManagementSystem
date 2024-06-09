<?php

namespace App\Http\Controllers\Merchant;
use App\Http\Controllers\Controller;
use App\Services\EventService;
use App\Http\Requests\events\CreateEventRequest;
use App\Http\Requests\events\UpdateEventRequest;
use Carbon\Carbon;

class EventController extends Controller
{
    protected EventService $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        $merchantId = "a0a9be74-199c-4a76-813e-cd7553065480";//auth()->user()->merchant_id; // hoặc bất kỳ cách nào lấy được merchant_id
        $events = $this->eventService->getAllEventsByMerchantId($merchantId);
        return view('merchant.events.index', ['events' => $events]);
    }

    public function create()
    {
        $merchantId = "a0a9be74-199c-4a76-813e-cd7553065480";//auth()->user()->merchant_id; // hoặc bất kỳ cách nào lấy được merchant_id
        return view('merchant.events.create', ['merchantId' => $merchantId]);
    }

    public function store(CreateEventRequest $request)
    {
        $data = $request->all();

        if($this->eventService->createEvent($data))
        {
            return to_route('merchant.events.index')->with([
                'message' => 'create success',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return to_route('merchant.events.index')->with([
                'message' => 'create failure',
                'alert-type' => 'danger'
            ]);
        }
    }


    public function edit(string $id)
    {
        //find event by id -> $event
        $merchantId = "a0a9be74-199c-4a76-813e-cd7553065480";//auth()->user()->merchant_id; // hoặc bất kỳ cách nào lấy được merchant_id
        //$event = $this->eventService->getAllEventsByMerchantId($merchantId);
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
            "stock" => 12,
            "price" => 10335453000,
            "currency" => "VND"
        ];
        return view("merchant.events.edit", ["event" => $event]);
    }

    public function update(UpdateEventRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $this->eventService->update($request, $id);
        if($this->eventService->update($request, $id))
        {
            return to_route('merchant.events.index')->with([
                'message' => 'update success !',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return to_route('merchant.events.index')->with([
                'message' => 'update failure !',
                'alert-type' => 'danger'
            ]);
        }
    }


    public function destroy(string $id)
    {

    }
}
