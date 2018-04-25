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

Route::group(['prefix' => '/v1.0', 'middleware' => 'api'], function () {
    Route::resource('tshirts', 'TshirtController',
    ['names' =>
        [
            'index' => 'tshirt.index',
        //    'create' => 'admin.main-articles.create',
        //    'store' => 'admin.main-articles.store',
        //    'show' => 'admin.main-articles.show',
        //    'edit' => 'admin.main-articles.edit',
        //    'update' => 'admin.main-articles.update',
        //    'destroy' => 'admin.main-articles.destroy',
        ]
    ]);
});