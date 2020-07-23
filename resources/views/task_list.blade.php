@extends('layouts.master')
@section('title','タスクリスト')
@section('content')
<table>
  <thead>
    <tr>
      <th colspan=3 style="min-width:100px font-size:5rem">buttons</th>
      <th style="max-width:500px font-size:5rem">task</th>
      <th style="min-width:200px font-size:5rem">date</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $task)
      {{-- comment in template --}}
      <tr>
        <td><button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-primary">編集</button></td>
        <td><button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-danger">削除</button></td>
        <td><button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-default" disabled>完了</button></td>
        <td>{{ $task->task_name }}</td>
        <td>{{ $task->updated_at }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
