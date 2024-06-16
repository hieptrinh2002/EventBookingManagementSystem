<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Helpers\OrderHelper;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $merchantId = Cookie::get('merchant_id');
        $orders = $this->orderService->getAllOrdersPerYear($merchantId, date("Y"));

        $revenueDataMonth = OrderHelper::processRevenueDataMonth($orders);
        $revenueDataQuater = OrderHelper::processRevenueQuater($orders);
        $latestOrders = (collect($this->orderService->getAllOrdersToday($merchantId))->where('status', 2)->all()); // 2 -> Success

        $todayAmount = OrderHelper::totalMoneyOfOrders($this->orderService->getAllOrdersToday($merchantId));

        return view('merchant.dashboard.index', ['revenueDataMonth' => $revenueDataMonth,
                                                'revenueDataQuater' => $revenueDataQuater,
                                                'latestOrders'=> $latestOrders,
                                                'todayAmount'=> $todayAmount]);
    }
}
