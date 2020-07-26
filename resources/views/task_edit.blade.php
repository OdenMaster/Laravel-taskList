@extends('layouts.master')
@section('title','編集')
@section('content')
<form action="/task/{{$task->id}}" method="post">
    @csrf
    @method('patch')
    {{-- <label for="title">タスク</label> --}}
    @foreach ($states as $state)
        @if (1 === $state->allow_user_ctrl)
        <input type="radio" name="state" value="{{ $state->state_num }}" id="editState{{ $state->state_num }}"
            @if ($state->state_num === $task->state) checked @endif>
        <label for="editState{{ $state->state_num }}">{{ $state->state_name }}</label>
        @endif
    @endforeach

    <textarea name="task" id="" cols="50" rows="10" required>{{$task->task_name}}</textarea>
    <button type="submit" class="uk-button uk-button-default">送信</button>
</form>
@endsection

