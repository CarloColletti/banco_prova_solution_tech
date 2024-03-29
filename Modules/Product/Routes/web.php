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

Route::prefix('product')->group(function () {
    Route::get('/', 'ProductController@index');
});

Route::prefix('product')->group(function () {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::post('/', 'ProductController@store')->name('product.store');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::get('/{product}', 'ProductController@show')->name('product.show');
    Route::match(['put', 'patch'], '/{id}', 'ProductController@update')->name('product.update');
    Route::delete('/{id}', 'ProductController@destroy')->name('product.destroy');
    Route::get('/{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::get('/product/trash', 'ProductController@trash')->name('product.trash');
    Route::post('/product/{id}/restore', 'ProductController@restore')->name('product.restore');
    Route::delete('/product/{id}/force-delete', 'ProductController@force_delete')->name('product.force_delete');
    Route::get('product/{id}/returnIdForForceDelete', 'ProductController@returnIdForForceDelete')->name('product.return_id_force_delete');
});

Route::prefix('quantity_edit')->group(function () {
    Route::get('/{id}/edit', 'MagazineController@edit')->name('product_magazine.edit');
    Route::delete('/{id}/update', 'MagazineController@update')->name('product_magazine.update');
});
