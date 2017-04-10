@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Inventory <small>{{$date}}</small></h1>
    <div class="col-md-8 module-container">
        <div class="module">
            <div class="product-wrapper">
                <div class="product-info">
                    <p class="sku">{{$product->sku}}</p>
                    <p class="description">{{$product->description}}</p>
                    <p class="price">${{$product->unit_price}}</p>
                </div>
                <hr />
                <div class="product-image">
                    <img src="{{$product->image}}"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 module-container">
        <div class="module">
            <div class="product-wrapper">
                <div class="qoh">
                    {{-- Make a table! --}}
                    <h3>Quantity On Hand</h3>
                    <table>
                        <tr>
                            @foreach($product->qoh as $qoh)
                                <th>{{$qoh->location->location_code}}</th>
                            @endforeach
                        </tr>

                        <tr>
                            @foreach($product->qoh as $qoh)
                                <td>{{$qoh->quantity}}</td>
                            @endforeach
                        </tr>
                    </table>
                </div>

                <hr />
                
                <div class="history">  
                    <h3>Sales History</h3>
                    <table>
                        <tr>
                            <th>Sku</th>
                            <th>Desc</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Method</th>
                            <th>Staff</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection