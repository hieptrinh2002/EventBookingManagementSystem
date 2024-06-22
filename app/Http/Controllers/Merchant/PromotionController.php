<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\promotions\CreatePromotionRequest;
use App\Http\Requests\Promotions\UpdatePromotionRequest;
use App\Services\PromotionService;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected PromotionService $promotionService;

    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }

    public function index()
    {
        $promotions = [
            [
                "id" => "cbda15bf-ec8b-40a4-96a9-38ae62b96710",
                "code" => "gh454hd67j",
                "dateStart" => "2024-05-30T17:00:00.000+00:00",
                "dateExpire" => "2024-06-30T17:00:00.000+00:00",
                "condition" => 80.25,
                "discount" => 15
            ],
            [
                "id" => "cbda15bf-ec8b-40a4-96a9-38ae6dedede",
                "code" => ")@*@)FH@hc",
                "dateStart" => "2024-04-30T17:00:00.000+00:00",
                "dateExpire" => "2024-05-10T17:00:00.000+00:00",
                "condition" => 80.25,
                "discount" => 15
            ]
        ];
        return view('merchant.promotions.index', ['promotions' => $promotions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchantId = "a0a9be74-199c-4a76-813e-cd7553065480";
        return view('merchant.promotions.create',['merchantId' => $merchantId]);
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store(CreatePromotionRequest $request)
    {
        $this->promotionService->createPromotion($request->all());
        return to_route('merchant.promotions.index')->with(['message' => 'create success']);
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
        #$promotion = $this->promotionService->getPromotionById($id);
        $promotion = [
            "id" => "cbda15bf-ec8b-40a4-96a9-38ae62b96710",
            "code" => "gh454hd67j",
            "dateStart" => "2024-05-30 15:20:15",
            "dateExpire" => "2024-05-30 15:20:15",
            "condition" => 80.25,
            "discount" => 15,
            "merchantId" => "a0a9be74-199c-4a76-813e-cd7553065480"
        ];

        return view("merchant.promotions.edit", ["promotion" => $promotion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromotionRequest $request, string $id) :\Illuminate\Http\RedirectResponse
    {
        if($this->promotionService->update($request, $id))
        {
            return to_route('merchant.promotions.index')->with([
                'message' => 'update success !',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return to_route('merchant.promotions.index')->with([
                'message' => 'update failure !',
                'alert-type' => 'warning'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
