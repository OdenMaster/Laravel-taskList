@extends('layouts.master')
@section('title','編集')
@section('content')
<form action="/task/{{$task->id}}" method="post">
    @csrf
    @method('patch')
    {{-- <label for="title">タスク</label> --}}
<input name="task" value="{{$task->task_name}}" placeholder="" required>
    <button type="submit" class="uk-button uk-button-default">送信</button>
</form>
@endsection
