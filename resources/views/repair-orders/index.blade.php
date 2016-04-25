@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Repair Orders <small>{{$date}}</small></h1>
    <div class="col-md-6 module-container">
        <div class="module">
            <repair-orders></repair-orders>
        </div>
    </div>
</div>
@endsection