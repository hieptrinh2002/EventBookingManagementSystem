<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = [
            [
                "code" => "gh454hd67j",
                "dateStart" => "2024-05-30T17:00:00.000+00:00",
                "dateExpire" => "2024-06-30T17:00:00.000+00:00",
                "condition" => 80.25,
                "discount" => 15
            ],
            [
                "code" => ")@*@)FH@hc",
                "dateStart" => "2024-04-30T17:00:00.000+00:00",
                "dateExpire" => "2024-05-10T17:00:00.000+00:00",
                "condition" => 80.25,
                "discount" => 15
            ],
            [
                "code" => "CHUOIjuiho",
                "dateStart" => "2024-05-30T17:00:00.000+00:00",
                "dateExpire" => "2024-06-30T17:00:00.000+00:00",
                "condition" => 90.25,
                "discount" => 15
            ],
            [
                "code" => "90dio#fh8",
                "dateStart" => "2024-05-30T17:00:00.000+00:00",
                "dateExpire" => "2024-06-30T17:00:00.000+00:00",
                "condition" => 60.25,
                "discount" => 7
            ],
            [
                "code" => "jiod)(#ud#)",
                "dateStart" => "2024-05-30T17:00:00.000+00:00",
                "dateExpire" => "2024-06-30T17:00:00.000+00:00",
                "condition" => 50.25,
                "discount" => 3
            ],

        ];
        return view('merchant.promotions.index', ['promotions' => $promotions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }
}
