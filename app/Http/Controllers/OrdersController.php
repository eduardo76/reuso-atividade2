<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $order;

    public function __construct(Order $order) {
        $this->order = $order;
    }

    public function orders() {
        $orders = $this->order->all();
        return response()->json($orders);
    }

    public function store(Request $request) {
        $order = $this->order->create($request->all());
        return response()->json($order);
    }

    public function show(Request $request, Order $order) {
        return response()->json($order);
    }

    public function update(Request $request, Order $order) {
        $order->update($request->all());
        return response()->json($order);
    }

}
