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

Route::namespace('Question\Api')->prefix('/question')->group(function(){
    Route::get('/list','IndexController@index');
});
Route::namespace('Category\Api')->prefix('/category')->group(function(){
    Route::get('/list','IndexController@index');
});
Route::namespace('Answer\Api')->prefix('/answer')->group(function(){
    Route::post('/create','CreateController@create');
    Route::get('/get/{id}','DetailController@get')->name('api.answer.get');
});
Route::namespace('Wilayah\Api')->prefix('/region')->group(function(){
    Route::get('/cities','CityController@GetCities');
    Route::get('/provinces','ProvinceController@GetProvinces');
    Route::get('/province/{id}','ProvinceController@GetCitiesByProvinceId');
});
Route::namespace('Message')->prefix('/message')->name('api.message.')->group(function(){
    Route::namespace('Welcome\Api')->prefix('/welcome')->name('welcome.')->group(function(){
        Route::get('/get/{id}','GetController@get')->name('get');
        Route::get('/get','GetController@getFirst');
    });
    Route::namespace('Preface\Api')->prefix('/preface')->name('preface.')->group(function(){
        Route::get('/get','GetController@getFirst');
    });
});