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

    <header>
      <img
      src='image/Megaman_stand.png'
      style='width:150px'
      alt='Task Manager'>
    </header>
    
    <h2>Task Manager</h2><br><br>

    Login
    Register



@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
