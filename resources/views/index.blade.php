@extends('layouts.app')

@section('content')
<div class="content">
	<h1>{{Auth::user()->name}} <small>{{$date}}</small></h1>

	<div class="col-md-6 module-container">
		<div class="module" id="app">
			TODO
            
		</div>
	</div>
</div>
@endsection
