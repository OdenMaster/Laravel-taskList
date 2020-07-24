@extends('layouts.master')
@section('title','')
@section('content')
    <label for="title">タスク</label>
    <p>{{$task->task_name}}</p>
    <button type="button" onclick="location.href='/task/{{$task->id}}/edit'" class="uk-button uk-button-default">編集</button>
    <button type="button" onclick="javascript:history.back();" class="uk-button uk-button-default">戻る</button>
@endsection
