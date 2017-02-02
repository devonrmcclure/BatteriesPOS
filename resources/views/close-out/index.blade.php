@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Close Out <small>{{$date}}</small></h1>
    <div class="col-md-6 module-container">
        <div class="module">

            <close-out :location="{{ Auth::User() }}"></close-out>
        </div>
    </div>
</div>
@endsection
