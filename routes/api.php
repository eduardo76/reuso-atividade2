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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// api/orders
Route::get('orders', 'OrdersController@orders');
Route::post('orders', 'OrdersController@store');

// api/orders/{order}
Route::get('orders/{order}', 'OrdersController@show');
Route::put('orders/{order}', 'OrdersController@update');
Route::post('orders/{order}', 'OrdersController@addItem');
Route::delete('orders/{order}', 'OrdersController@delete');

//api/customers
Route::get('customers', 'CustomersController@customers');
Route::put('customers', 'CustomersController@store');

//api/customers/{customer}
Route::get('customers/{customer}', 'CustomersController@show');
Route::put('customers/{customer}', 'CustomersController@update');
Route::delete('customers/{customer}', 'CustomersController@delete');

//api/customers/{customer}
Route::get('customers/{customer}/orders', 'CustomersController@orders');
Route::post('customers/{customer}/orders', 'CustomersController@addOrder');
Route::delete('customers/{customer}/orders', 'CustomersController@deleteOrders');