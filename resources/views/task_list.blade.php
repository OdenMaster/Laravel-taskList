@extends('layouts.master')
@section('title','タスクリスト')
@section('content')
<table>
  <thead>
    <tr>
      <th colspan=3 style="min-width:100px font-size:5rem">buttons</th>
      <th style="min-width:080px font-size:5rem">state</th>
      <th style="max-width:500px font-size:5rem">task</th>
      <th style="min-width:200px font-size:5rem">date</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($tasks as $task)
    <tr>
      <td><button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-primary" type="button" onclick="location.href='/task/{{$task->id}}/edit'">編集</button></td>

      <td>
        <form action="/task/{{ $task->id }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn_del uk-padding-small uk-padding-remove-vertical uk-button uk-button-danger" aria-lavel="">削除</button>
        </form>
      </td>

      <td>
        @if ($task->state === TASK_OPEN)
        <button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-secondary" type="button" onclick="location.href='/close/{{ $task->id }}'">完了</button>
        @else
        <button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-secondary" type="button" onclick="" disabled>完了</button>
        @endif
      </td>

      <td>{{ $task->joinTaskState->state_name }}</td>
      <td><a href="/task/{{ $task->id }}">{{ $task->task_name }}</a></td>
      <td>{{ $task->updated_at }}</td>
    </tr>
    @endforeach
  </tbody>
  <button class="btn_del">testbutton</button>

  <button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-primary" type="button" onclick="location.href='task/create'">作成</button>

</tbody>
</table>

@endsection
