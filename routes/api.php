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

//Route::get('provinces/{province}/cities', function (\App\Models\Province $province) {
//    return $province->cities;
//});
//
//Route::get('countries', function () {
//    return \App\Models\Country::get();
//});
//
//Route::get('sales/forms/{form}', 'Api\SaleFormsController@show');
//
//Route::get('upload/image', 'Api\UploadController@uploadImage');
