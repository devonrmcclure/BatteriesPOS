@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Inventory <small>{{$date}}</small></h1>
    <inventory-info></inventory-info>
</div>
@endsection