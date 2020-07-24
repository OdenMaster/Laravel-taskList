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


// controller@acition(method)
Route::get('/', 'TasksController@index');
Route::get('/editList', 'TasksController@editList');
// Route::resource('/task/{$id}', 'TasksController@edit');

// Route::post('task/task', 'TasksController@store');
// Route::post('task/delete/{id}', 'Tas ksController@delete');
Route::resource('task', 'TasksController');



// Route::get('/task/{$id}', 'TasksController@edit');
// Route::get('/task{$id}', function(){
//     return view('task_edit');
// });
// '/edit', 'TasksController@edit');
// Route::get('/edit/{id}', 'TasksController@edit');


// controllerを経由しない場合。変数を渡すことも可能
// Route::get('/', function () {
//     $alltasks = \App\task::all();
//     return view('task_list', ['tasks' => $alltasks]);
//     return view('task_list');
// });
