<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('title')
        <title>Print Invoice</title>
    @show

    @section('head')
    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,400italic,700italic,300,700,500italic,300italic,400' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('css/main.css') }}" />
    @show
</head>
<body>
    <!-- This will be variables and stuff from what is receive via getting an invoice -->

    <div class="part-order-invoice">
        <div class="customer-info">
            <p class="invoice-number"><span class="heading">PO#: </span>{{$partOrder->id}}</p>
            <p cladd="date"><span class="heading">Date: </span>{{$partOrder->created_at->format('M j, Y @ g:i A')}}</p>
            <br />
            <p class="name"><span class="heading">Customer: </span>{{$partOrder->customer->first_name}} {{$partOrder->customer->last_name}}</p>
            <p class="primary_phone"><span class="heading">Phone: </span>{{$partOrder->customer->primary_phone}}</p>

        </div>

        <div class="invoice-products">
            <table>
                <tr>
                    <th>Make</th>
                    <th>Item</th>
                    <th>Model</th>
                    <th>Description</th>
                    <th>Part Number</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Sku</th>
                </tr>

                @foreach($invoice->sale as $product)
                    <tr> 
                        <td><p class="product-make">{{$partOrder->make}}</p></td>
                        <td><p class="product-description">{{$partOrder->item}}</p></td>
                        <td><p class="product-quantity">{{$partOrder->model}}</p></td>
                        <td><p class="product-price">{{$product->description}}</p></td>
                        <td><p class="product-extended">{{$partOrder->part_number}}</p></td>
                        <td><p class="product-pst>">{{$product->quantity}}</p></td>
                        <td><p class="product-gst">{{$product->extended}}</p></td>
                        <td><p class="product-sku">{{$product->sku}}</p></td>
                    </tr>
                @endforeach
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <td colspan="2"><strong class="heading">Customer Called: </strong></td>
                    <td colspan="3"><strong class="heading">Customer Pickup: </strong></td>
                    <td colspan="1"><strong class="heading">Total Owing: </strong></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <span class="heading">Notes: </span>{{$partOrder->notes}}
        <div class="invoice-info">
            <p class="invoice-number"><span class="heading">Invoice#: </span>{{$invoice->id}}</p>
            <p class="deposit"><span class="heading">Deposit: </span>${{number_format($partOrder->deposit, 2)}}</p>
            <p class="staff"><span class="heading">Sold By: </span>{{$invoice->staff}}</p>
        </div>

    </div>
</body>
</html>
