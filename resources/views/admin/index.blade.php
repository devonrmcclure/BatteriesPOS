@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Admin Dashboard <small>{{$date}}</small></h1>
    <div class="col-md-12 module-container">
        <dashboard :location="{{ Auth::User() }}"></dashboard>
    </div>
</div>
@endsection
