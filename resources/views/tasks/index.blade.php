@extends('layouts.master')


@section('title')
    All Tasks
@stop



@section('head')

@stop


@section('content')

  
    <h2>All Tasks</h2><br><br>

    @foreach ($tasks as $task)
      <div>
          <h3>{{ $task->description }}</h3>
          <br>
          Complete by: {{ $task->due }}
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
