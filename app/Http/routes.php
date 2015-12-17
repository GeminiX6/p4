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

Route::group(['middleware' => 'auth'], function () {
    #Show tasks for logged in user
    Route::get('/tasks', 'TasksController@getTasks');
    #Show completed tasks for logged in user
    Route::get('/tasks/completed', 'TasksController@getCompletedTasks');
    #Show completed tasks for logged in user
    Route::get('/tasks/uncompleted', 'TasksController@getUncompletedTasks');
    #Show form to add a new task
    Route::get('/tasks/add', 'TasksController@getAddTask');
    #Process adding the new task
    Route::post('/tasks/add', 'TasksController@postAddTask');
    #Show form to edit a specific task
    Route::get('/tasks/edit/{id?}', 'TasksController@getEditTask');
    #Process the edits to the task
    Route::post('/tasks/edit', 'TasksController@postEditTask');
    #Show task to delete
    Route::get('/tasks/delete/{id?}', 'TasksController@getDeleteTask');
    #Process task deletion
    Route::post('/tasks/delete', 'TasksController@postDeleteTask');
    #Show task to complete
    Route::get('/tasks/complete/{id?}', 'TasksController@getCompleteTask');
    #Process task completion
    Route::post('/tasks/complete', 'TasksController@postCompleteTask');
});

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');
