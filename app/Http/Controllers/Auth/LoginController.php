<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthenticationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;

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
    protected string $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @param AuthenticationService $authenticationService
     * @return void
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Handle login request.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    protected function login(Request $request): RedirectResponse
    {
        // Check for valid access token in cookie first
        $accessToken = $request->cookie('app-token');
        if (isset($accessToken) && $this->authenticationService->validateAccessToken($accessToken) != "") {
            return redirect()->route('welcome.index')->with('isDisplay', true);
        }

        // Perform login if no valid access token found
        try {
            $result = $this->authenticationService->login($request);

            if (isset($result['data'])) {
                $accessToken = $result['data']['accessToken'];

                // Create HTTP-only secure cookie
                $cookie = cookie('app-token', $accessToken, config('session.lifetime'), null, null, true, true);

                // Redirect to welcome with cookie
                return redirect()->route('welcome.index')->with('isDisplay', true)->withCookie($cookie);
            }

            // Handle login failure
            $message = $result['detail'] ?? $result['message'];
            return redirect()->route('auth.login')->with([
                'message' => $message,
                'alert-type' => 'danger'
            ]);
        } catch (Exception $e) {
            // Log the error and provide a generic error message
            error_log($e->getMessage() . "\n" . $e->getTraceAsString());
            return redirect()->route('auth.login')->with([
                'message' => 'An error occurred during login. Please try again.',
                'alert-type' => 'danger'
            ]);
        }
    }

}

