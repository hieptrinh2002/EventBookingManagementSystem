<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class OrderHelper
{
    //composer dump-autoload
    public static function filterOrders($orders, Request $request)
    {
        if(count($request->all()))
        {
            return $orders;
        }
        $quantity_from = $request->input('quantity_from');
        $quantity_to = $request->input('quantity_to');
        $amount_from = $request->input('amount_from');
        $amount_to = $request->input('amount_to');
        $payment_method = (int)$request->input('payment_method');
        $status = (int)$request->input('status');
        return array_filter($orders, function ($order) use ($quantity_from, $quantity_to, $amount_from, $amount_to, $payment_method, $status) {
            return
                (!$quantity_from || $order['quantity'] >= $quantity_from) &&
                (!$quantity_to || $order['quantity'] <= $quantity_to) &&
                (!$amount_from || $order['amount'] >= $amount_from) &&
                (!$amount_to || $order['amount'] <= $amount_to) &&
                (!($payment_method) || $order['paymentMethod'] == $payment_method) &&
                (!($status) || $order['status'] == $status);
        });
    }

    // chuyển đổi dữ liệu vẽ đồ thị theo tháng
    public static function processRevenueDataMonth($orders)
    {
        $revenueData = [];

        foreach ($orders as $order) {
            $month = date('Y-m', strtotime($order['createdDate']));
            if (!isset($revenueData[$month])) {
                $revenueData[$month] = 0;
            }
            $revenueData[$month] += $order['amount'];
        }

        $data = [];
        foreach ($revenueData as $month => $amount) {
            $data[] = ['month' => $month, 'amount' => $amount];
        }

        return $data;
    }

    // chuyển đổi dữ liệu vẽ đồ thị theo quý
    public static function processRevenueQuater($orders)
    {
        $revenueData = [
            'Q1' => 0,
            'Q2' => 0,
            'Q3' => 0,
            'Q4' => 0
        ];

        foreach ($orders as $order) {
            $month = date('m', strtotime($order['createdDate']));
            $quarter = 'Q' . ceil($month / 3);
            $revenueData[$quarter] += $order['amount'];
        }

        $data = [];
        foreach ($revenueData as $quarter => $amount) {
            $data[] = ['quarter' => $quarter, 'amount' => $amount];
        }

        return $data;
    }

    public static function totalMoneyOfOrders($orders)
    {
        $totalAmount = 0;

        foreach ($orders as $order) {
            $totalAmount += $order['amount'];
        }

        return $totalAmount;
    }

    public function getCurrentYearOrders($orders)
    {
        $currentYear = date('Y');
        $currentYearOrders = [];

        foreach ($orders as $order) {
            $orderYear = date('Y', strtotime($order['createdDate']));
            if ($orderYear == $currentYear) {
                $currentYearOrders[] = $order;
            }
        }

        return $currentYearOrders;
    }
}
