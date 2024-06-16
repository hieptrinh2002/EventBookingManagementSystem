<?php
namespace App\Http\Controllers\Merchant;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Helpers\OrderHelper;
use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request, string $eventId)
    {
        $merchantId = Cookie::get('merchant_id');
        $allOrders = $this->orderService->getAllOrdersPerYear($merchantId, date("Y"));
        //get orders by eventId in allOrders
        $orders = $this->orderService->getOrderByEventId($allOrders, $eventId);
        $orders = OrderHelper::filterOrders($orders, $request);



        $perPage = 10; // Number of items per page
        $page = $request->input('page', 1); // Get the current page or default to 1
        $offset = ($page - 1) * $perPage;

        $paginatedOrders = new LengthAwarePaginator(
            array_slice($orders, $offset, $perPage),
            count($orders),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('merchant.orders.index', ['orders' => $paginatedOrders,
                                              'eventId' => $eventId]);
    }

    public function show(string $id)
    {
        return view('merchant.orders.show');
    }
}
