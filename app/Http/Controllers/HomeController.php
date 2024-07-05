<?php

namespace App\Http\Controllers;

use App\Services\AuthenticationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    private AuthenticationService $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        // $this->middleware('auth');
        $this->authenticationService = $authenticationService;
    }

    public function index(): Renderable
    {
        $accessToken = Cookie::get('app-token');

        if (isset($accessToken) && $this->authenticationService->validateAccessToken($accessToken)) {
            return view('welcome', ['isDisplay' => true]);
        }

        return view('welcome');
    }

    public function dashboard(): RedirectResponse
    {
        $accessToken = Cookie::get('app-token');

        if (isset($accessToken) && $this->authenticationService->validateAccessToken($accessToken)) {
            return redirect()->route('home')->with('isDisplay', true);
        }

        return redirect()->route('home')->with('isDisplay', false);
    }
}
