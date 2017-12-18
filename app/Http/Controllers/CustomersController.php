<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    private $customer;
    
    public function __construct(Customer $customer) {
        $this->customer = $customer;
    }

    public function customers() {
        $customers = $this->customer->with('orders')->get();
        return response()->json($customers);
    }
    
    public function store(Request $request) {
        $customer = $this->customer->create($request->all());
        return response()->json($customer);
    }

    public function show(Request $request, $id) {
        $customer = $this->customer->with(['orders'])->find($id);
        return response()->json($customer);
    }
    
    public function update(Request $request, $id) {
        $customer = $this->customer->find($id);
        $customer->update($request->all());
        return response()->json($customer);
    }

    public function delete(Request $request, $id) {
        $customer = $this->customer->find($id);
        $customer->orders()->delete();
        $customer->delete();
        return response()->json(['msg' => 'Customer removido.']);
    }

    public function orders(Request $request, $id) {
        $customer = $this->customer->find($id);
        $orders   = $customer->orders->all();
        return response()->json($orders);
    }
    
    public function addOrder(Request $request, $id) {
        $customer = $this->customer->find($id);
        $order    = $customer->orders()->create($request->all());
        return response()->json($order);
    }

    public function deleteOrders(Request $request, $id) {
        $customer = $this->customer->find($id);
        $customer->orders()->delete();
        return response()->json(['msg' => 'Ordens de serviço removidas.']);
    }
}
