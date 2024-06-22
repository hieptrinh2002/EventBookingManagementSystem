<?php

namespace App\Http\Controllers\Merchant;

use App\Helpers\EventHelper;
use App\Http\Controllers\Controller;
use App\Services\EventService;
use App\Http\Requests\events\CreateEventRequest;
use App\Http\Requests\events\UpdateEventRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cookie;

class MerchantEventController extends Controller
{
    protected EventService $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index(Request $request)
    {
        $merchantId = Cookie::get('merchant_id');
        $events = $this->eventService->getAllEventsByMerchantId($merchantId);

        $filteredEvents = EventHelper::filterEvents($events, $request);

        $perPage = 10; // Number of items per page
        $page = $request->input('page', 1); // Get the current page or default to 1
        $offset = ($page - 1) * $perPage;

        $paginatedEvents = new LengthAwarePaginator(
            array_slice($filteredEvents, $offset, $perPage),
            count($filteredEvents),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );


        return view('merchant.events.index', ['events' => $paginatedEvents]);
    }

    public function create()
    {
        $merchantId = Cookie::get('merchant_id');
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
                'alert-type' => 'error'
            ]);
        }
    }


    public function edit(string $eventId)
    {
        $event = $this->eventService->getEventById($eventId);
        return view("merchant.events.edit", ["event" => $event]);
    }

    public function show(string $eventId)
    {
        $event = $this->eventService->getEventById($eventId);
        return view("merchant.events.show", ["event" => $event]);
    }

    public function update(UpdateEventRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
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
                'alert-type' => 'warning'
            ]);
        }
    }
}
