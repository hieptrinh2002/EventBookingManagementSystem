<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthenticationService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected AuthenticationService $authenticationService;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function login(Request $request)
    {
        $result = $this->authenticationService->login($request);
        if (isset($result['data'])) {
            return redirect()->route('merchant.dashboard');
        } else {
            $message = isset($result['detail']) ? $result['detail'] : $result['message'];
            return redirect()->route('auth.login')->with([
                'message' => $message,
                'alert-type' => 'danger'
            ]);
        }
    }
}
