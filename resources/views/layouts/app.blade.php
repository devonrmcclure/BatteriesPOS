<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('title')
    <title>BatteriesPOS System</title>
    @show

    @section('head')
    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,400italic,700italic,300,700,500italic,300italic,400' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('css/main.css') }}" />
    @show
</head>
<body id="app">
    {{ csrf_field() }}

    @if(Auth::check())
        @include('partials.sidebar')
        <div class="current-user">
            <a href="#" id="user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <i class="caret"></i></a>

            <ul class="dropdown-menu pull-right" aria-labelledby="user-dropdown"> 
                <li><a href="/invoices">Invoice Lookup</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Settings (TODO)</a></li>
                <li><a href="/logout">Log out</a></li>
            </ul>
        </div>
    @endif

    @yield('content')

    @section('scripts')
    <!-- JavaScripts -->
    <script src="{{ URL::asset('bower_components/jquery/dist/jquery.js') }}"></script>
    <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ elixir('js/app.js') }}"></script>
    @show

</body>
</html>
