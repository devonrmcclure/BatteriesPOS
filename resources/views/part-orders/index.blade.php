@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Part Orders <small>{{$date}}</small></h1>
    <div class="col-md-12 module-container">
        <div class="module">

            <part-orders :location="{{ Auth::User() }}"></part-orders>
        </div>
    </div>
</div>
@endsection
