@extends('layouts.app')

@section('content')
<div class="content">
	<h1>{{Auth::user()->name}} <small>{{$date}}</small></h1>
    

    <div class="row">
    	<daily-to-do :location="{{ Auth::User() }}"></daily-to-do>

        <transfer-requests :location="{{ Auth::User() }}"></transfer-requests>

        <transfer-orders :location="{{ Auth::User() }}"></transfer-orders>
    </div>

    <div class="row">
        <weekly-to-do :location="{{ Auth::User() }}"></weekly-to-do>

    </div>


@endsection
