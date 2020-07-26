<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use db\filed\enum\taskState;

class TasksController extends Controller

{
    // routingで設定したmethodを作成
    public function index()
    {
        $tasks = \App\Task::all();
        // dd($tasks);
        // 取得した値をビューへ渡す
        return view('task_list', compact('tasks'));
        // return view('welcome');
    }
    public function welcome()
    {
        return view('welcome');
    }

    // Route::resource
    public function create(Request $request){
        // dd($request);
        return view('task_create');
    }
    public function store(Request $request){
        $task = new Task;
        $task->task_name = $request->task;
        $task->save();
        return redirect('/');
    }
    public function show($id){
        return view('task_show', ['task' => Task::findOrFail($id)]);
    }
    public function edit($id){
        return view('task_edit', [
            'task' => Task::findOrFail($id),
            'states' => \App\TaskState::all()
        ]);
    }
    public function update(Request $request, $id){
        $task = Task::find($id);
        $task->task_name = $request->task;
        $task->state = intval($request->state);
        $task->save();
        return redirect('/');
    }
    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/');
    }

    // 手動ルーティングでの削除
    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect('/');
    }

    public function closeTask($id)
    {
        $task = Task::find($id);
        $task->state = taskState::CLOSE;
        $task->save();
        return redirect('/');
    }

    public function editList()
    {
        $task = Task::select()->join('task_states','tasks.state','=','task_states.state_num')->get();
        return view('task_edit_list', compact($task));
    }

    public function select(){
        // INNAR JOIN
        $task = Task::table('tasks')->join('task_states','tasks.state','=','task_states.state_num')->get();
        return view('task_edit_list');
    }
}
