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

Route::get('/home', function () {
    return redirect('/');
    // return view('layouts.layout1');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::namespace('Category')->prefix('/category')->name('category.')->group(function(){
    Route::get('/create', 'CreateController@index')->name('create.page');
    Route::post('/create', 'CreateController@create')->name('create');
    Route::get('/edit/id/{id}', 'EditController@index')->name('edit.page');
    Route::post('/edit/id/{id}', 'EditController@edit')->name('edit');
});
Route::namespace('Question')->prefix('/category/detail')->name('category.detail.')->group(function(){
    Route::get('/id/{id}', 'IndexController@index')->name('id');
});