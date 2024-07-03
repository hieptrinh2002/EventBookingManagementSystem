<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class EventHelper
{
    public static function filterEvents(array $events, Request $request)
    {
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');
        $stock = $request->input('stock');
        $min_quantity = $request->input('min_quantity');
        $max_quantity = $request->input('max_quantity');
        $location = $request->input('location');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');
        $type = $request->input('type');
        $is_out_of_stock = $request->has('is_out_of_stock');
        return array_filter($events, function ($event) use ($price_from, $price_to, $stock, $min_quantity, $max_quantity, $location, $start_date, $end_date, $status, $type, $is_out_of_stock) {
            return
                (!$price_from || $event['price'] >= $price_from) &&
                (!$price_to || $event['price'] <= $price_to) &&
                (!$stock || $event['stock'] >= $stock) &&
                (!$min_quantity || $event['minQuantity'] >= $min_quantity) &&
                (!$max_quantity || $event['maxQuantity'] <= $max_quantity) &&
                (!$location || stripos($event['location'], $location) !== false) && // LIKE search
                (!$start_date || $event['startDate'] >= $start_date) &&
                (!$end_date || $event['endDate'] <= Carbon::createFromFormat('Y-m-d', $end_date)->addDay()->format("Y-m-d"))&&
                (!$status || $event['status'] == $status) &&
                (!$type || $event['type'] == $type) &&
                (!$is_out_of_stock || $event['isOutOfStock'] == $event['maxQuantity']);
        });
    }
}
