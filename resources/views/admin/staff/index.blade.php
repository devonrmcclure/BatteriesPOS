@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Staff Dash <small>{{$date}}</small></h1>
    <div class="col-md-12 module-container">
        <staff :location="{{Auth::user()}}"></staff>
    </div>
</div>
@endsection
