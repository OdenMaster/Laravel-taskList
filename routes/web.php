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


// コントローラー名＠アクション
Route::get('/', 'TaskController@index');
Route::get('/edit', 'TaskController@edit');


// Route::get('/', function () {
//     $alltasks = \App\task::all();
//     // $alltasks[0] = 'hiroshi';
//     return view('task_list', ['tasks' => $alltasks]);
//     // return view('taskList');
//     // return view('welcome');
// });
