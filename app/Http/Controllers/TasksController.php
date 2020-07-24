<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\task;

class TasksController extends Controller

{
    // routingで設定したmethodを作成
    public function index()
    {
        $tasks = \App\task::all();
        // dd($tasks);
        // 取得した値をビューへ渡す
        return view('task_list', compact('tasks'));
    }

    // Route::resource
    public function create(Request $request){
        // dd($request);
        return view('task_create');
    }
    public function store(Request $request){
        $task = new task;
        $task->task_name = $request->task;
        $task->save();
        return redirect('/');
    }
    public function show($id){
        return view('task_show', ['task' => task::findOrFail($id)]);
    }
    public function edit($id){
        return view('task_edit', ['task' => task::findOrFail($id)]);
    }
    public function update(Request $request, $id){
        $task = task::find($id);
        $task->task_name = $request->task;
        $task->save();
        return redirect('/');
    }
    public function destroy($id){
        $task = task::findOrFail($id);
        $task->delete();
        return redirect('/');
    }

    // 手動ルーティングでの削除
    public function delete(Request $request)
    {
        task::find($request->id)->delete();
        return redirect('/');
    }

    // public function edit($id)
    public function editList()
    {
        return view('task_edit_list');
    }

}
