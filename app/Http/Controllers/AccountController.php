<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\services\OrderService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function index() {

        $response = OrderService::getOrderByUserId("a9d4c20f-f188-440a-b2ac-c1da82939763");

        return view('account.index', compact('response'));
    }
}
