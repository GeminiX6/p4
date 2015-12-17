@extends('layouts.master')


@section('title')
    Edit Task
@stop



@section('head')

@stop


@section('content')

    <li><a href="/tasks">Back To Tasks</a></li>

    <h2>Edit Task</h2><br><br>

    @if(count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <form method='POST' action='/tasks/edit' class="form-horizontal">

        <input type='hidden' name='_token' value='{{csrf_token()}}'>

        <input type='hidden' name='id' value='{{ $task->id }}'>

        <fieldset>
          <div class="form-group">
            <label class="control-label" for="inputLarge">Edit Task</label>
              <input
                      class='form-control input-lg'
                      type='text'
                      id='description'
                      name='description'
                      value='{{ $task->description }}'
              >
          </div>
        </fieldset>

        Created on: {{ $task->created_at->toFormattedDateString()}}<br>
        Currently due: {{ $task->due }}

        <fieldset>
          <div class="form-group">
            <label for="due" class="col-lg-3 control-label">Update by how many days?</label>
                  <input
                      type='int'
                      class='form-control'
                      id='due'
                      name='due'
                      value='{{ old('due') }}'
                  >
          </div>
        </fieldset>

        <fieldset>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-primary">Edit Task</button>
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
