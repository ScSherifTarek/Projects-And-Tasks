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

/**
	GET /projects (index)
	GET /projects/{project_id} (show)
	GET /projects/create (create)
	POST /projects (store)
	GET /projects/{project_id}/edit (edit)
	PATCH /projects/{project_id} (update)
	GET /projects/create (create)
	DELETE /projects/{project_id} (destroy)
**/

// home route
Route::get('/', function(){
	return view('welcome');
});

// project routes
// Route::resource('projects', 'ProjectsController')->middleware('can:update,project');
Route::resource('projects', 'ProjectsController');

// project tasks routes
//// create task
Route::post('/projects/{project}/tasks','ProjectTasksController@store');

//// mark task as completed
Route::post('completed-tasks/{task}', 'CompletedTasksController@complete');

//// mark task as not completed
Route::delete('completed-tasks/{task}', 'CompletedTasksController@incomplete');


// auth routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
