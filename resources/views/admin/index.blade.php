@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Admin Dashboard <small>{{$date}}</small></h1>
    <div class="col-md-6 module-container">
        <div class="module">
            <dashboard :location="{{ Auth::User() }}"></dashboard>
            
        </div>
    </div>
</div>
@endsection
