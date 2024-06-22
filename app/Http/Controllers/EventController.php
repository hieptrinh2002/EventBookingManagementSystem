<?php

namespace App\Http\Controllers;

use App\Services\EventService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    protected EventService $eventService;
    /**
     * Display a listing of the resource.
     */
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        $events = $this->eventService->getAllEvents();

        if ($events == null) {
            return view('events.index', ['events' => []]);
        }
        return view('events.index', ['events' => $events]);
    }
    public function show($id)
    {
        $event = $this->eventService->getEventDetails($id);

        if ($event == null) {
            return view('events.show', ['event' => null]);
        }

        return view('events.show', ['event' => $event]);
    }
}
