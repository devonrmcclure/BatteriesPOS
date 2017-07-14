@extends('layouts.app')

@section('content')
<div class="content">
	<h1>{{Auth::user()->name}} <small>{{$date}}</small></h1>

	<daily-to-do :location="{{ Auth::User() }}"></daily-to-do>

    <weekly-to-do :location="{{ Auth::User() }}"></weekly-to-do>
</div>
@endsection
