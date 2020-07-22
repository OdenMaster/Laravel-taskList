<?PHP

echo 'task list';
?>

<table>
  <thead>
    <tr>
      <th style="max-width:500px">task</th>
      <th style="min-width:200px">date</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $task)
      {{-- comment in template --}}
      <tr>
        <td>{{ $task->task_name }}</td>
        <td>{{ $task->updated_at }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
