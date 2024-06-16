<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Services\MerchantProfileService;

class MerchantProfileController extends Controller
{
    protected MerchantProfileService $merchantProfileService;

    public function __construct(MerchantProfileService $merchantProfileService)
    {
        $this->merchantProfileService = $merchantProfileService;
    }

    public function show()
    {
        $merchantId = "a0a9be74-199c-4a76-813e-cd7553065480";
        $merchant = $this->merchantProfileService->getMerchantById($merchantId);
        return view('merchant.profile.show',compact('merchant'));
    }
}
