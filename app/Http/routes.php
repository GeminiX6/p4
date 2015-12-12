<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tasks', 'TasksController@getTasks');

Route::get('/tasks/add', 'TasksController@getAddTask');
Route::post('/tasks/add', 'TasksController@postAddTask');

Route::get('/tasks/edit', 'TasksController@getEditTask');
Route::post('/tasks/edit', 'TasksController@postEditTask');

Route::get('/tasks/delete', 'TasksController@getDeleteTask');
Route::post('/tasks/delete', 'TasksController@postDeleteTask');
