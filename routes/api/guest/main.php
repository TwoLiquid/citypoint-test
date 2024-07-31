<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Guest Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function () {

    /**
     * Guest API routes
     */
    Route::group([
        'namespace'  => 'Guest'
    ], function () {

        /**
         * Getting cars
         */
        Route::get('cars', 'CarController@index')
            ->name('api.cars.index');
    });
});
