@extends('layouts.master')


@section('title')
    Task Manager
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop


@section('content')

    <h2>Task Manager</h2><br><br>

    <ul>
      @if(Auth::check())
            <li><a href='/'>Home</a></li>
            <li><a href='/tasks'>Go To Tasks</a></li>
            <li><a href='/logout'>Log Out</a></li>
        @else
            <li><a href='/'>Home</a></li>
            <li><a href='/login'>Login</a></li>
            <li><a href='/register'>Register</a></li>
        @endif
    </ul>



@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
