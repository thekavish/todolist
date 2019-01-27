@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
  @if(isset($task))
    <h4>Edit Task : </h4>
    {!! Form::model($task, ['route' => ['task.update', $task->id], 'method' => 'patch', 'class' => 'form-inline']) !!}
  @else
    <h4>Add Task : </h4>
    {!! Form::open(['route' => 'task.store', 'class' => 'form-inline']) !!}
  @endif
  {{ csrf_field() }}
  <div class="form-group">
    {!! Form::text('name', null,['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::submit($submit, ['class' => 'btn btn-primary form-control']) !!}
  </div>
  {!! Form::close() !!}
  <form action="{{ route("task.toggle") }}" method="post" id="status-toggle" style="display:none;"></form>
  <hr>
  <h4>Tasks To Do : </h4>
  <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>Name</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
      <tr>
        <td>{{ $task->name }}</td>
        <td>{{ Form::checkbox('name', 'value', $task->complete, ['class' => 'form-check-input', 'data-task-id' => $task->id]) }}</td>
        <td>
          {!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'delete']) !!}
          <div class='btn-group'>
            <a href="{!! route('task.edit', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
          </div>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection
