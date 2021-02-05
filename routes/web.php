<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','TasksController@index')->name("home");
Route::prefix('/tasks')->group(function(){

    Route::get('/', 'TasksController@index')->name("tasks.index");
    Route::get('add', 'TasksController@add')->name("tasks.add");
    Route::post('add', 'TasksController@addAction');
    Route::get('edit/{id}', 'TasksController@edit')->name("tasks.edit");
    Route::post('edit/{id}', 'TasksController@editAction');
    Route::get('delete/{id}', 'TasksController@delete')->name("tasks.delete");;
    Route::get('done/{id}','TasksController@done')->name("tasks.done");;
});
