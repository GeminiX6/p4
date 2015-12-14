<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Task Manager' --}}
        @yield('title','Task Manager')
    </title>

    <meta charset='utf-8'>


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link href="/css/p4.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    @if(\Session::has('flash_message'))
    <div class='flash_message'>
        {{ \Session::get('flash_message')}}
    </div>
    @endif

    <header>
        <img
        src='/image/Megaman_stand.png'
        style='width:150px'
        alt='Task Manager'>
        @yield('header')
    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')


</body>
</html>
