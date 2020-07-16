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

Route::get('/', function () {

    $alltasks = \App\task::all();
    // $alltasks[0] = 'hiroshi';
    return view('taskList', ['tasks' => $alltasks]);
    // return view('taskList');
    // return view('welcome');
});
