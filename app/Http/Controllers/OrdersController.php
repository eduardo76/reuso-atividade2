<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $order;
    private $item;

    public function __construct(Order $order, Item $item) {
        $this->order = $order;
        $this->item = $item;
    }

    public function orders() {
        $orders = $this->order->with(['items', 'costumer'])->get();
        return response()->json($orders);
    }

    public function store(Request $request) {
        $order = $this->order->create($request->all());
        return response()->json($order);
    }

    public function show(Request $request, Order $order) {
        $order->load(['costumers', 'items']);
        return response()->json($order->with(['costumer','items'])->first());
    }

    public function update(Request $request, Order $order) {
        $order->update($request->all());
        return response()->json($order);
    }

    public function addItem(Request $request, Order $order) {
        $item = $order->items()->create($request->all());
        return response()->json($item);
    }
}
