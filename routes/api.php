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
});