@extends('layouts.master')
@section('title','IMO')
@section('content')
    <form action="/task" method="post">
        @csrf
        <label>新規追加</label>
        <input name="task" palaceholder="タスクを入力してください" required>
        <button type="submit">送信</button>
    </form>
@endsection
