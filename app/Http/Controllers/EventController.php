<?php

namespace App\Http\Controllers;

use App\Services\EventService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = [
            [
                "merchantId" => "dschudfcvjksmdcdsfvdfsvdf1",
                "title" => "We speak Football 1",
                "description" => "There is no description :))",
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
                "merchantId" => "dschudfcvjksmdcdsfvdfsvdf2",
                "title" => "We speak Football 2",
                "description" => "There is no description :))",
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
                "merchantId" => "dschudfcvjksmdcdsfvdfsvdf3",
                "title" => "We speak Football 3",
                "description" => "There is no description :))",
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
                "merchantId" => "dschudfcvjksmdcdsfvdfsvdf4",
                "title" => "We speak Football 4",
                "description" => "There is no description :))",
                "startDate" => "2024-05-25 15:20:15",
                "endDate" => "2024-05-30 15:20:15",
                "location" => "Hùng vương Plaza",
                "type" => "TALK_SHOW",
                "status" => "HAPPENING",
                "minQuantity" => 50,
                "maxQuantity" => 100,
                "price" => 100000,
                "currency" => "VND"
            ]
        ];

        $events1 = EventService::getAllEvents();
        if($events == null)
        {
            return view('events.index', ['events' => []]);
        }
        return view('events.index', ['events' => $events]);
    }
    public function show()
    {
        return view('events.show');
    }
}
