<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


// Route::prefix('orders')->group(function () {
//     Route::get('/', 'OrdersController@index');
// });

Route::prefix('order')->middleware('role:admin|customer')->group(function () {
    Route::get('/', 'OrdersController@index')->name('order.index');
    Route::get('/order_create', 'OrdersController@order_create')->name('order.cart');
    Route::post('/', 'OrdersController@store')->name('order.store');
    Route::post('/create', 'OrdersController@create')->name('order.create');
    // Route::match(['put', 'patch'], '/{user}', 'OrdersController@update')->name('order.update');
    // Route::delete('/{order}', 'OrdersController@destroy')->name('order.destroy');
    // Route::get('/{ids}/edit', 'OrdersController@edit')->name('order.edit');
    // Route::get('/order/trash', 'OrdersController@trash')->name('order.trash');
    // Route::post('/order/{order}/restore', 'OrdersController@restore')->name('order.restore');
    // Route::delete('/order/{order}/force-delete', 'OrdersController@force_delete')->name('order.force_delete');
});

Route::prefix('order')->middleware('role:seller')->group(function () {
    Route::get('/show_orders', 'OrdersController@show')->name('order.show');
});
