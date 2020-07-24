@extends('layouts.master')
@section('title','ザ★タスク')
@section('content')
{{$task->id}}
{{$task->task_name}}
{{$task->updated_at}}

@endsection
