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
use Modules\Network\Http\Controllers\NetworkController;

// Route::resource('/network', NetworkController::class);



Route::prefix('network')->group(function () {
    Route::get('/', 'NetworkController@index')->name('network.index');
    Route::post('/', 'NetworkController@store')->name('network.store');
    Route::get('/create', 'NetworkController@create')->name('network.create');
    Route::get('/{user}', 'NetworkController@show')->name('network.show');
    Route::match(['put', 'patch'], '/{user}', 'NetworkController@update')->name('network.update');
    Route::delete('/{user}', 'NetworkController@destroy')->name('network.destroy');
    Route::get('/{user}/edit', 'NetworkController@edit')->name('network.edit');
});
