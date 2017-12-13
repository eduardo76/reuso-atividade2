<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// api/orders
Route::get('orders', 'OrdersController@orders');
Route::post('orders', 'OrdersController@store');

// api/orders/{order}
Route::get('orders/{order}', 'OrdersController@show');
Route::put('orders/{order}', 'OrdersController@update');

//api/costumers
Route::get('costumers', 'CostumersController@costumers');
Route::post('costumers', 'CostumersController@store');

//api/costumers/{costumer}
Route::get('costumers/{costumer}', 'CostumersController@show');
Route::get('costumers/{costumer}/orders', 'CostumersController@orders');