<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Services\MerchantProfileService;
use Illuminate\Support\Facades\Cookie;

class MerchantProfileController extends Controller
{
    protected MerchantProfileService $merchantProfileService;

    public function __construct(MerchantProfileService $merchantProfileService)
    {
        $this->merchantProfileService = $merchantProfileService;
    }

    public function show()
    {
        $merchantId = Cookie::get('merchant_id');
        $merchant = $this->merchantProfileService->getMerchantById($merchantId);
        return view('merchant.profile.show',compact('merchant'));
    }
}
