@extends('layouts.master')


@section('title')
    All Tasks
@stop



@section('head')

@stop


@section('content')

    <li><a href="/logout">Logout</a></li>

    <h2>All Tasks</h2><br><br>

    <li><a href="/tasks/add">Add A New Task</a></li>

    @foreach ($tasks as $task)
        @if($task->completed)
          <div class='completed_task'>
            <h3>{{ $task->description }}</h3>
            Created on: {{ $task->created_at->toFormattedDateString() }}<br>
            Completed on: {{ $task->updated_at->toFormattedDateString() }}<br>
          </div>

        @else
          <div class='noncompleted_task'>
            <h3>{{ $task->description }}</h3>
            <a href='/tasks/complete/{{$task->id}}'>Complete This Task</a><br>
            Created on: {{ $task->created_at->toFormattedDateString() }}<br>
            Complete by: {{ $task->due }}<br>
            <a href='/tasks/edit/{{$task->id}}'>Edit</a> | <a href='/tasks/delete/{{$task->id}}'>Delete</a>
          </div>
        @endif

    @endforeach




@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
