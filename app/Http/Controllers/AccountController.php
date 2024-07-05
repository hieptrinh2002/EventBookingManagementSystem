<?php

namespace App\Http\Controllers;

use App\Services\AuthenticationService;
use App\services\OrderService;
use App\services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{

    protected AuthenticationService $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $accessToken = Cookie::get('app-token');

        $userProfileId = $this->authenticationService->validateAccessToken($accessToken);

        if (isset($accessToken) && $userProfileId != "") {

            $userInfo = UserService::getUserInfoByUserId($userProfileId)['data'];

            $orderInfo = OrderService::getOrderByUserId($userProfileId)['data'];

            $isDisplay = true;

            return view('account.index', compact('userInfo', 'orderInfo','isDisplay'));
        }

        return view("welcome.index");

    }

    public function getOrderDetail($orderId): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $orderDetail = OrderService::getOrderById($orderId)['data'];

        $isDisplay = true;

        return view('account.order-detail', compact('orderDetail','isDisplay'));
    }

    public function logout(): RedirectResponse
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        Session::invalidate();

        // Regenerate the CSRF token to prevent CSRF attacks
        Session::regenerateToken();

        // Forget the 'app-token' cookie
        $cookie = Cookie::forget('app-token');

        // Redirect to the login page with the 'app-token' cookie forgotten
        return redirect()->route('auth.login')->withCookie($cookie);
    }

}
