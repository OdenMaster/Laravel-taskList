@extends('layouts.master')
@section('title','タスクリスト')
@section('content')

<form action="task/create" method="post"><button type="submit">作成</button></form>


<table>
  <thead>
    <tr>
      <th colspan=3 style="min-width:100px font-size:5rem">buttons</th>
      <th style="max-width:500px font-size:5rem">task</th>
      <th style="min-width:200px font-size:5rem">date</th>
    </tr>
  </thead>
    @foreach ($tasks as $task)
    {{-- comment in template --}}
    <tr>
      <td><button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-primary" type="button" onclick="location.href='/task/{{$task->id}}/edit'">編集</button></td>

      {{-- Route::post('delete/{id}', 'TaskController@delete'); のようにresourceを使用しないでルーティングする場合 --}}
      {{-- <td>
        <form action="task/delete/{{ $task->id }}" method="post">
          {{csrf_field()}}
          <button type="submit" class="btn_del uk-padding-small uk-padding-remove-vertical uk-button uk-button-danger" aria-lavel="">削除</button>
        </form>
      </td> --}}

      {{-- 疑似フォームメソッドの仕組みでpostでDELETEを扱う --}}
      <td>
        <form action="/task/{{ $task->id }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn_del uk-padding-small uk-padding-remove-vertical uk-button uk-button-danger" aria-lavel="">削除</button>
        </form>
      </td>

      <td><button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-default" disabled>完了</button></td>
      <td><a href="/task/{{ $task->id }}">{{ $task->task_name }}</a></td>
      <td>{{ $task->updated_at }}</td>
    </tr>
    @endforeach
    <button class="btn_del">testbutton</button>


    <button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-primary" type="button" onclick="location.href='task/create'">作成</button>

  </tbody>
</table>

@endsection


{{-- <input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{csrf_token()}}">
{{csrf_field()}} --}}
