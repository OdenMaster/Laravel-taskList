<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\task;

class TaskController extends Controller

{
    // routingで設定した関数を作成
    public function index()
    {
        $tasks = \App\task::all();

        // dd($tasks);

        // 取得した値をビューへ渡す
        return view('task_list', compact('tasks'));

    }

    // public function edit($id)
    public function edit()
    {
        return view('task_edit');
    }
}
