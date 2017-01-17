@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Admin Dashboard <small>{{$date}}</small></h1>
    <div class="col-md-10 module-container">
        <div class="module">
            <admin-inventory :location="{{ Auth::User() }}"></admin-inventory>
            
        </div>
    </div>
</div>
@endsection
