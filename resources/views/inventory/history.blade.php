@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Inventory History <small>{{$date}}</small></h1>
    <div class="col-md-12 module-container">
        <inventory-history :location="{{ Auth::User() }}"></inventory-history>
    </div>
</div>
@endsection