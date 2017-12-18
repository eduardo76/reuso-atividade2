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
        $orders = $this->order->with(['items', 'customer'])->get();
        return response()->json($orders);
    }

    public function store(Request $request) {
        $order = $this->order->create($request->all());
        return response()->json($order);
    }

    public function show($id) {
        $order = $this->order->with(['customer', 'items'])->find($id);
        return response()->json($order);
    }

    public function update(Request $request, $id) {
        $order = $this->order->find($id);
        $order->update($request->all());
        return response()->json($order);
    }
    
    public function addItem(Request $request, $id) {
        $order = $this->order->find($id);
        $item  = $order->items()->create($request->all());
        return response()->json($item);
    }
    
    public function delete($id) {
        $order = $this->order->find($id);
        $order->items()->delete();
        $order->delete();
        return response()->json(['msg' => 'Ordem de serviço removida.']);
    }
}
