@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Repair Orders <small>{{$date}}</small></h1>
    <div class="col-md-12 module-container">
        <div class="module">

            <repair-orders :location="{{ Auth::User() }}"></repair-orders>
        </div>
    </div>
</div>
@endsection
