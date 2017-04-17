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

    <div class="sales-invoice">
        <div class="customer-info">
            <p class="name">{{$invoice->customer->first_name}} {{$invoice->customer->last_name}}</p>
            <p class="address">{{$invoice->customer->address}} {{$invoice->customer->city}} {{$invoice->customer->province}}</p>
            <p class="primary_phone">{{$invoice->customer->primary_phone}}</p>
        </div>

        <div class="invoice-info">
            <p class="invoice-number"><span class="heading">Invoice: </span>{{$invoice->id}}</p>
            <p class="method"><span class="heading">Method: </span>{{$invoice->payment_method}}</p>
            <p class="staff"><span class="heading">Sold By: </span>{{$invoice->staff}}</p>
            <p cladd="date"><span class="heading">Date: </span>{{$invoice->created_at->format('M j, Y @ g:i A')}}</p>
        </div>

        <div class="invoice-products">
            <table>
                <tr>
                    <th>Sku</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Extended</th>
                    <th>PST</th>
                    <th>GST</th>
                    <th>Total</th>
                </tr>

                @foreach($invoice->sale as $product)
                    <tr> 
                        <td><p class="product-sku">{{$product->sku}}</p></td>
                        <td><p class="product-description">{{$product->description}}</p></td>
                        <td><p class="product-quantity">{{$product->quantity}}</p></td>
                        <td><p class="product-price">${{number_format($product->price, 2)}}</p></td>
                        <td><p class="product-extended">${{number_format($product->extended, 2)}}</p></td>
                        <td><p class="product-pst>">${{number_format($product->pst, 2)}}</p></td>
                        <td><p class="product-gst">${{number_format($product->gst, 2)}}</p></td>
                        <td><p class="product-total">${{number_format($product->total, 2)}}</p></td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan=4></td>
                    <th>Total</th>
                    <th>${{number_format($invoice->total_pst, 2)}}</th>
                    <th>${{number_format($invoice->total_gst, 2)}}</th>
                    <th>${{number_format($invoice->total, 2)}}</th>

                </tr>
            </table>
        </div>

        <div class="invoice-comment">
            <p class="comment">(GST#{{Auth::user()->gst_number}}) {{$invoice->invoice_comment}}</p>
            @if(isset($duplicate))
                <p class="duplicate">DUPLICATE</p>
            @endif
        </div>

    </div>
    
    @if($print)
        <script>
            window.print();
        </script>
    @endif
</body>
</html>
