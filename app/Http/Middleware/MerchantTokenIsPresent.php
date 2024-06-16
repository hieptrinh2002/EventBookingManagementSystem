<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class MerchantTokenIsPresent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if token is present in the session
         $token = Cookie::get('merchant_jwt');
         $merchanId = Cookie::get('merchant_id');

         if (!$token || !$merchanId) {
             // If token is not present, redirect to login page
             return to_route('merchant.pages.login')->with([
                'message' => 'access denied, please check permission and login again !',
                'alert-type' => 'error'
            ]);
         }

         // Attach the token to the request headers
         $request->headers->set('Authorization', 'Bearer ' . $token);
        return $next($request);
    }
}
