<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\promotions\CreatePromotionRequest;
use App\Http\Requests\Promotions\UpdatePromotionRequest;
use App\Services\PromotionService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cookie;

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

    public function index(Request $request)
    {
        $merchantId = Cookie::get('merchant_id');
        $promotions = $this->promotionService->getAllPromotionsByMerchantId($merchantId);


        $perPage = 10; // Number of items per page
        $page = $request->input('page', 1); // Get the current page or default to 1
        $offset = ($page - 1) * $perPage;

        $paginatedPromotions= new LengthAwarePaginator(
            array_slice($promotions, $offset, $perPage),
            count($promotions),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('merchant.promotions.index', ['promotions' => $paginatedPromotions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchantId = Cookie::get('merchant_id');
        return view('merchant.promotions.create',['merchantId' => $merchantId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePromotionRequest $request)
    {
        if($this->promotionService->createPromotion($request->all()))
        {
            return to_route('merchant.promotions.index')->with([
                'message' => 'create success',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return to_route('merchant.promotions.index')->with([
                'message' => 'create failure',
                'alert-type' => 'error'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = $this->promotionService->getPromotionById($id);
        return view("merchant.promotions.show", ["promotion" => $promotion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotion = $this->promotionService->getPromotionById($id);
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
