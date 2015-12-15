@extends('layouts.master')


@section('title')
    All Tasks
@stop



@section('head')

@stop


@section('content')


    <h2>All Tasks</h2><br><br>

    <a href="/tasks/add">Add Task</a>

    @foreach ($tasks as $task)
      <div>
          <h3>{{ $task->description }}</h3>
          Complete by: {{ $task->due }}
          <a href='/tasks/edit/{{$task->id}}'>Edit</a>
          <a href='/tasks/delete/{{$task->id}}'>Delete</a>
       </div>
    @endforeach




@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
