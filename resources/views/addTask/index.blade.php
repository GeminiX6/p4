@extends('layouts.master')


@section('title')
    Add Task
@stop



@section('head')

@stop


@section('content')


    <h2>Add Task</h2><br><br>

    <a href="/tasks">Back To Tasks</a>

    @if(count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <form method='POST' action='/tasks/add' class="form-horizontal">

        <input type='hidden' name='_token' value='{{csrf_token()}}'>

        <fieldset>
          <div class="form-group">
            <label class="control-label" for="inputLarge">New Task</label>
              <input
                      class='form-control input-lg'
                      type='text'
                      id='description'
                      name='description'
                      value='{{ old('description', 'Update project') }}'
                  >
          </div>
        </fieldset>

        <fieldset>
          <div class="form-group">
            <label for="due" class="col-lg-3 control-label">Time To Complete (in days)</label>
                  <input
                      type='int'
                      class='form-control'
                      id='due'
                      name='due'
                      value='{{ old('due', '1') }}'
                  >
          </div>
        </fieldset>

        <fieldset>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-primary">Add Task</button>
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
