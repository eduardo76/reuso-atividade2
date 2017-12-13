<?php

namespace App\Http\Controllers;

use App\Costumer;
use Illuminate\Http\Request;

class CostumersController extends Controller
{
    private $costumer;
    
    public function __construct(Costumer $costumer) {
        $this->costumer = $costumer;
    }

    public function costumers() {
        $costumers = $this->costumer->with('orders')->get();
        return response()->json($costumers);
    }
    
    public function store(Request $request) {
        $costumer = $this->costumer->create($request->all());
        return response()->json($costumer);
    }

    public function show(Request $request, Costumer $costumer) {
        return response()->json($costumer);
    }

    public function orders(Request $request, Costumer $costumer) {
        $orders = $costumer->orders->all();
        return response()->json($orders);
    }
}
