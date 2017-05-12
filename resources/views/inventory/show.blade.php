@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Inventory <small>{{$date}}</small></h1>
    <div class="col-md-12 module-contianer">
        <inventory-info :location="{{ Auth::User() }}"></inventory-info>
    </div>


</div>
@endsection