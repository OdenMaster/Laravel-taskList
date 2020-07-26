<?php

use App\Http\Controllers\TasksController;
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
Route::get('/close/{id}','TasksController@closeTask');
Route::resource('task', 'TasksController');

// controllerを経由しない場合。変数を渡すことも可能
// Route::get('/', function () {
//     $alltasks = \App\task::all();
//     return view('task_list', ['tasks' => $alltasks]);
//     return view('task_list');
// });
