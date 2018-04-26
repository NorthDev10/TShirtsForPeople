<?php

use Illuminate\Http\Request;
use App\Tshirt;

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

Route::group(['prefix' => '/v1.0/', 'middleware' => 'api'], function () {
    Route::get('tshirts', [
        'as' => 'tshirt_list',
        'uses' => 'TshirtController@index'
    ]);

    Route::get('options', [
        'as' => 'tshirt_options',
        'uses' => 'TshirtOptions@getOptions'
    ]);
});