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

use App\Repositories\UserRepository;

Route::get('/', function(UserRepository $userRepo){
	dd($userRepo);
	return 1;
});
// Route::get('/', 'PagesController@home');

// Route::get('/contact','PagesController@contact');

// Route::get('/about','PagesController@about');

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
// project routes
Route::resource('projects', 'ProjectsController');
Route::get('/projects','ProjectsController@index');
Route::post('/projects','ProjectsController@store');
Route::get('/projects/create','ProjectsController@create');

Route::post('/projects/{project}/tasks','ProjectTasksController@store');
// Route::patch('/tasks/{task}','ProjectTasksController@update');

Route::post('completed-tasks/{task}', 'CompletedTasksController@complete');
Route::delete('completed-tasks/{task}', 'CompletedTasksController@incomplete');