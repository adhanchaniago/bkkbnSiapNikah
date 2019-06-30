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
Route::get('/',function(){
    return redirect('/admin');
});

Route::prefix('/admin')->group(function(){
    Auth::routes();

    Route::get('/home', function () {
        return redirect('/admin');
    });
    
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::namespace('Category')->prefix('/category')->name('category.')->group(function(){
        Route::get('/create', 'CreateController@index')->name('create.page');
        Route::post('/create', 'CreateController@create')->name('create');
        Route::get('/edit/id/{id}', 'EditController@index')->name('edit.page');
        Route::post('/edit/id/{id}', 'EditController@edit')->name('edit');
        Route::get('/delete/id/{categoryId}', 'DeleteController@index')->name('delete.page');
        Route::post('/delete/id/{categoryId}', 'DeleteController@remove')->name('delete');
    });
    Route::namespace('Question')->prefix('/category/detail')->name('category.detail.')->group(function(){
        Route::get('/id/{id}', 'IndexController@index')->name('id');
        Route::prefix('/question')->name('question.')->group(function(){
            Route::post('create/{categoryId}','CreateController@create')->name('create');
            Route::get('edit/{categoryId}/{questionId}','EditController@index')->name('edit.page');
            Route::post('edit/{categoryId}/{questionId}','EditController@edit')->name('edit');
            Route::get('delete/{categoryId}/{questionId}','DeleteController@index')->name('delete.page');
            Route::post('delete/{categoryId}/{questionId}','DeleteController@remove')->name('delete');
        });
    });
    Route::namespace('User')->prefix('/user-management')->name('user.management.')->group(function(){
        Route::get('/','IndexController@index')->name('index');
        Route::post('/create','CreateController@register')->name('create');
        Route::get('/edit/{userId}','EditController@index')->name('edit.page');
        Route::post('/edit/{userId}','EditController@edit')->name('edit');
        Route::get('/delete/{userId}','DeleteController@index')->name('delete.page');
        Route::post('/delete/{userId}','DeleteController@remove')->name('delete');
    });
    Route::namespace('Answer')->prefix('/questionnaire')->name('questionnaire.')->group(function(){
        Route::get('/','IndexController@index')->name('index');
        Route::get('/delete/{id}','DeleteController@index')->name('delete.page');
        Route::delete('/delete/{id}','DeleteController@delete')->name('delete');
        Route::get('/export','ExportController@export')->name('export');
    });
    Route::namespace('Message')->prefix('/message')->name('message.')->group(function(){
        Route::namespace('Welcome')->prefix('/welcome')->name('welcome.')->group(function(){
            Route::get('/','IndexController@index')->name('index');
            Route::post('/create','CreateController@create')->name('create');
            Route::post('/update/{id}','EditController@edit')->name('edit');
            Route::delete('/delete/{id}','DeleteController@delete')->name('delete');
        });
        Route::namespace('Preface')->prefix('/preface')->name('preface.')->group(function(){
            Route::post('/create','CreateController@create')->name('create');
            Route::post('/update/{id}','EditController@edit')->name('edit');
            Route::get('/','IndexController@index')->name('index');
            Route::delete('/delete/{id}','DeleteController@delete')->name('delete');
        });
    });
});

// Auth::routes();

// Route::get('/home', function () {
//     return redirect('/');
// });


// Route::get('/', 'HomeController@index')->name('home');
// Route::namespace('Category')->prefix('/category')->name('category.')->group(function(){
//     Route::get('/create', 'CreateController@index')->name('create.page');
//     Route::post('/create', 'CreateController@create')->name('create');
//     Route::get('/edit/id/{id}', 'EditController@index')->name('edit.page');
//     Route::post('/edit/id/{id}', 'EditController@edit')->name('edit');
//     Route::get('/delete/id/{categoryId}', 'DeleteController@index')->name('delete.page');
//     Route::post('/delete/id/{categoryId}', 'DeleteController@remove')->name('delete');
// });
// Route::namespace('Question')->prefix('/category/detail')->name('category.detail.')->group(function(){
//     Route::get('/id/{id}', 'IndexController@index')->name('id');
//     Route::prefix('/question')->name('question.')->group(function(){
//         Route::post('create/{categoryId}','CreateController@create')->name('create');
//         Route::get('edit/{categoryId}/{questionId}','EditController@index')->name('edit.page');
//         Route::post('edit/{categoryId}/{questionId}','EditController@edit')->name('edit');
//         Route::get('delete/{categoryId}/{questionId}','DeleteController@index')->name('delete.page');
//         Route::post('delete/{categoryId}/{questionId}','DeleteController@remove')->name('delete');
//     });
// });
// Route::namespace('User')->prefix('/user-management')->name('user.management.')->group(function(){
//     Route::get('/','IndexController@index')->name('index');
//     Route::post('/create','CreateController@register')->name('create');
//     Route::get('/edit/{userId}','EditController@index')->name('edit.page');
//     Route::post('/edit/{userId}','EditController@edit')->name('edit');
//     Route::get('/delete/{userId}','DeleteController@index')->name('delete.page');
//     Route::post('/delete/{userId}','DeleteController@remove')->name('delete');
// });
// Route::namespace('Answer')->prefix('/questionnaire')->name('questionnaire.')->group(function(){
//     Route::get('/','IndexController@index')->name('index');
//     Route::get('/delete/{id}','DeleteController@index')->name('delete.page');
//     Route::delete('/delete/{id}','DeleteController@delete')->name('delete');
//     Route::get('/export','ExportController@export')->name('export');
// });
// Route::namespace('Message')->prefix('/message')->name('message.')->group(function(){
//     Route::namespace('Welcome')->prefix('/welcome')->name('welcome.')->group(function(){
//         Route::get('/','IndexController@index')->name('index');
//         Route::post('/create','CreateController@create')->name('create');
//         Route::post('/update/{id}','EditController@edit')->name('edit');
//         Route::delete('/delete/{id}','DeleteController@delete')->name('delete');
//     });
//     Route::namespace('Preface')->prefix('/preface')->name('preface.')->group(function(){
//         Route::post('/create','CreateController@create')->name('create');
//         Route::post('/update/{id}','EditController@edit')->name('edit');
//         Route::get('/','IndexController@index')->name('index');
//         Route::delete('/delete/{id}','DeleteController@delete')->name('delete');
//     });
// });