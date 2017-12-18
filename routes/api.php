<?php

use Illuminate\Http\Request;


////////  ROTAS ATIVIDADE 2 ///////

// api/orders
Route::get('orders', 'OrdersController@orders');
Route::post('orders', 'OrdersController@store');

// api/orders/{order}
Route::get('orders/{id}', 'OrdersController@show');
Route::put('orders/{id}', 'OrdersController@update');
Route::post('orders/{id}', 'OrdersController@addItem');
Route::delete('orders/{id}', 'OrdersController@delete');

//api/customers
Route::get('customers', 'CustomersController@customers');
Route::put('customers', 'CustomersController@store');

//api/customers/{customer}
Route::get('customers/{id}', 'CustomersController@show');
Route::put('customers/{id}', 'CustomersController@update');
Route::delete('customers/{id}', 'CustomersController@delete');

//api/customers/{customer}
Route::get('customers/{id}/orders', 'CustomersController@orders');
Route::post('customers/{id}/orders', 'CustomersController@addOrder');
Route::delete('customers/{id}/orders', 'CustomersController@deleteOrders');
/////// FIM ROTAS ATIVIDADE 2 ///////////



////////  ROTAS ATIVIDADE 3 ///////
Route::get('usuarios', 'UsuariosController@usuarios');
Route::post('usuarios', 'UsuariosController@store');
Route::get('usuarios/{id}', 'UsuariosController@show');
Route::put('usuarios/{id}', 'UsuariosController@update');
Route::delete('usuarios/{id}', 'UsuariosController@delete');

Route::get('perfis', 'PerfisController@perfis');
Route::post('perfis', 'PerfisController@store');
Route::get('perfis/{id}', 'PerfisController@show');
Route::put('perfis/{id}', 'PerfisController@update');
Route::delete('perfis/{id}', 'PerfisController@delete');

Route::get('usuarios/{id}/perfil', 'UsuariosController@perfil');
Route::post('usuarios/{id}/perfil/{perfil_id}', 'UsuariosController@associarPerfil');
Route::delete('usuarios/{id}/perfil', 'UsuariosController@desassociarPerfil');
////////  FIM ROTAS ATIVIDADE 3 ///////

