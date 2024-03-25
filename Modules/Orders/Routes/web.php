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

Route::prefix('network')->group(function () {
    Route::get('/', 'OrdersController@index')->name('orders.index');
    Route::post('/', 'OrdersController@store')->name('orders.store');
    Route::get('/create', 'OrdersController@create')->name('orders.create');
    Route::get('/{order}', 'OrdersController@show')->name('orders.show');
    Route::match(['put', 'patch'], '/{user}', 'OrdersController@update')->name('orders.update');
    Route::delete('/{order}', 'OrdersController@destroy')->name('orders.destroy');
    Route::get('/{order}/edit', 'OrdersController@edit')->name('orders.edit');
    Route::get('/order/trash', 'OrdersController@trash')->name('orders.trash');
    Route::post('/order/{order}/restore', 'OrdersController@restore')->name('orders.restore');
    Route::delete('/order/{order}/force-delete', 'OrdersController@force_delete')->name('orders.force_delete');
});
