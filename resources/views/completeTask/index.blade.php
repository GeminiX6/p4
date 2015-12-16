@extends('layouts.master')


@section('title')
    Edit Task
@stop



@section('head')

@stop


@section('content')


    <li><a href="/tasks">Back To Tasks</a></li>

    <h2>Complete Task</h2><br><br>

    @if(count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <div>

        Are you sure you want to complete this task?

        <h3>{{ $task->description }}</h3>
        Created on: {{ $task->created_at->toFormattedDateString()}}
        Currently due: {{ $task->due }}

    </div>

    <form method='POST' action='/tasks/complete' class="form-horizontal">

      <input type='hidden' name='_token' value='{{csrf_token()}}'>

      <input type='hidden' name='id' value='{{ $task->id }}'>

        <fieldset>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-primary">Complete Task</button>
            </div>
          </div>
        </fieldset>
    </form>




@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
