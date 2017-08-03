@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Assocaited Skus <small>{{$date}}</small></h1>
    <div class="col-md-10 module-container">
        <div class="module">
            <associated-skus :location="{{ Auth::User() }}"></associated-skus>
            
        </div>
    </div>
</div>
@endsection
