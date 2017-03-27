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

    <div class="repair-order-invoice">
        
        <div class="invoice-header">
            <h2>Repair Order</h2> <span class="date">{{$invoice->created_at->format('Y-m-j')}}</span>
            <p class="header-info">
                <span class="invoice-number">{{$invoice->id}}</span>
                
            </p>
        </div>

        <div class="customer-info">
            <p class="name">{{$invoice->customer->first_name}} {{$invoice->customer->last_name}}</p> |
            <p class="address">{{$invoice->customer->address}} {{$invoice->customer->city}} {{$invoice->customer->province}}</p> |
            <p class="phone">
                {{$invoice->customer->primary_phone}}

                @if($invoice->customer->secondary_phone !== null)
                    or {{ $invoice->customer->secondary_phone}}
                @endif
            </p>
        </div>
        

        <div class="repair-info">
            <div class="unit-info">
                <p><span class="heading">Product:</span> {{$invoice->product}}</p>
                <p><span class="heading">Model:</span> {{$invoice->model}}</p>
                <p><span class="heading">Date Code:</span> {{$invoice->date_code}}<br />
                <p><span class="heading">Condition:</span> {{$invoice->condition}}</p>
                <p><span class="heading">Accessories:</span> {{$invoice->accessories}}</p><br />
                <span class="heading">Problem:</span> <br />
            </div>

            <div class="problem">
                {{$invoice->problem}}
            </div>

            <div class="notes">
                Notes
            </div>

            <div class="footer">
                <table>
                    <thead>
                        <th>Pickup Call</th>
                        <th colspan="4">Repair Details</th>

                        <th>Sku</th>
                        <th>Qty</th>
                        <th>$$$</th>
                    </thead>

                    <tr>
                        <td></td>
                        <td colspan="4" rowspan="8"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        
         <div class="customer-signature">
            <span style="float:right">Total (pre-tax) _________________</span>
        </div>

        <div class="customer-signature">
            <span>Picked up by: ___________________________</span> <span style="float:right">Date: _______________________________</span>
        </div>
    </div>

    <script>
        //window.print();
    </script>
</body>
</html>
