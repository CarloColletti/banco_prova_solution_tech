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

Route::prefix('network')->group(function () {
    Route::get('/', 'NetworkController@index');
});


// Route::prefix('network')->group(function () {
//     Route::resources('/', NetworkController::class);
// });
