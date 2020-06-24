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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {
    Route::group(['namespace' => 'API'], function () {

        Route::group(['prefix' => 'departments'], function () {
            Route::get('/', 'DepartmentController@index');
        });

        Route::group(['prefix' => 'externalsystems'], function () {
            Route::get('/', 'ExternalSystemController@index');
        });

        Route::group(['prefix' => 'latest'], function () {
            Route::get('/', 'LatestController@index');
        });
        Route::group(['prefix' => 'downloads'], function () {
            Route::get('/', 'DocumentViewController@index');
        });
    });
});

// Post a computer service request
// Route::post('/computerassistance', 'ComputerAssistanceController@store');

Route::post('/incidentreporting', 'IncidentReportingController@store');

Route::post('/logout', 'LogoutController@store');
