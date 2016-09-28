@extends('layouts.app')

@section('content')
<div class="content">
	<h1>Sales <small>{{$date}}</small></h1>
	<div class="col-md-8 module-container">
		<div class="module">
			<button id="show-modal" @click="showRepLoginModal = true">New Sale</button>
			<daily-sales-stats title="Daily Sales Stats" :location="{{ Auth::User() }}"></daily-sales-stats>
			<br />
			<div>
				<rep-login-modal :show.sync="showRepLoginModal" title="Rep Login" :location="{{ Auth::User() }}"></rep-login-modal>
				
			</div>
	</div>
</div>
@endsection
