@extends('layouts.app')

@section('content')
<div class="content">
	<h1>Customers <small>{{$date}}</small></h1>
	<div class="col-md-8 module-container">
		<div class="module">
            
            <customer-list :location="{{ Auth::User() }}"></customer-list>
		</div>
	</div>
</div>
@endsection
