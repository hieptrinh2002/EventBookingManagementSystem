<?php

namespace App\Http\Controllers\Merchant;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\Http\Requests\MerchantAuth\MerchantLoginRequest;
use App\Http\Requests\MerchantAuth\MerchantRegisterRequest;
use App\Services\MerchantAuthService;

class MerchantAuthController extends Controller
{
    protected MerchantAuthService $authService;

    public function __construct(MerchantAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showRegisterForm()
    {
        return view('merchant.pages.register');
    }

    public function showLoginForm()
    {
        return view('merchant.pages.login');
    }

    public function register(MerchantRegisterRequest $request)
    {
        $response = $this->authService->register($request->all());

        if($response['success'])
        {
            return to_route('merchant.pages.login')->with([
                'message' => $response['message'],
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return to_route('merchant.pages.register')->with([
                'message' =>  $response['message'],
                'alert-type' => 'error'
            ]);
        }
    }

    public function login(MerchantLoginRequest $request)
    {
        $response = $this->authService->login($request->all());
        if ($response['success']) {
            $jwt = $response['data']['accessToken'];
            $merchantId = $response['data']['merchantId'];

            Cookie::queue(Cookie::make('merchant_jwt', $jwt, 0, null, null, false, true));
            Cookie::queue(Cookie::make('merchant_id', $merchantId, 0, null, null, false, true));

            return to_route('merchant.dashboard.index')->with([
                'message' => $response['message'],
                'alert-type' => 'success'
            ]);
        } else {
            return to_route('merchant.login')->with([
                'message' => $response['message'],
                'alert-type' => 'warning'
            ]);
        }
    }

    public function logout()
    {
        // Xóa cookie
        Cookie::queue(Cookie::forget('merchant_jwt'));
        Cookie::queue(Cookie::forget('merchant_Id'));

        return to_route('merchant.login')->with([
            'message' => 'Logged out successfully!',
            'alert-type' => 'success'
        ]);
    }
}
