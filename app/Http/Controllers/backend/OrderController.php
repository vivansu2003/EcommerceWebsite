<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::join('orderdetail', 'orderdetail.order_id', '=', 'order.id')
            ->join('user', 'user.id', '=', 'order.user_id')
            ->orderBy('order.created_at', 'desc')
            ->select('user.name as user_name', 'user.email as user_email', 'order.*')
            ->distinct()
            ->get();

        return view('backend.order.index', compact('order'));
    }

    public function show(string $id)
    {
        //
    }
}
