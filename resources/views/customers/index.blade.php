@extends('layouts.app')

@section('content')
<div class="content">
	<h1>Customers <small>{{$date}}</small></h1>
	<div class="col-md-6 module-container">
		<div class="module">
            
            <customer-list></customer-list>
		</div>
	</div>
</div>
@endsection