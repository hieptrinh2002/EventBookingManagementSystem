<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Helpers\OrderHelper;
use Illuminate\Pagination\LengthAwarePaginator;
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

        //Pagination
        $perPage = 10;
        $page = $request->input('page', 1); // Get the current page or default to 1
        $offset = ($page - 1) * $perPage;

        $paginatedLatestOrders = new LengthAwarePaginator(
            array_slice($latestOrders, $offset, $perPage),
            count($latestOrders),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );


        return view('merchant.dashboard.index', ['revenueDataMonth' => $revenueDataMonth,
                                                'revenueDataQuater' => $revenueDataQuater,
                                                'latestOrders'=> $paginatedLatestOrders,
                                                'todayAmount'=> $todayAmount]);
    }
}
