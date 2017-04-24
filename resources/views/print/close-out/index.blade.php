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
    <div class="close-out-print">
        <div class="info">
            <p><span class="heading">Date:</span> {{$closeOutResults['closeOutDate']}}</p><br/>
            <p><span class="heading">Sales:</span> ${{$closeOutResults['sales']}}</p><br/>
            <p><span class="heading">Returns:</span> ${{$closeOutResults['returns']}}</p><br/>
            <p><span class="heading">Net Sales:</span> ${{$closeOutResults['netSales']}}</p>
        </div>

        <div class="preTaxInfo">
            <p><span class="heading">Location:</span> {{Auth::user()->name}}</p><br/>
            <p><span class="heading">Pre-Tax Sales:</span> ${{$closeOutResults['preTaxSales']}}</p><br/>
            <p><span class="heading">Pre-Tax Returns:</span> ${{$closeOutResults['preTaxReturns']}}</p><br/>
            <p><span class="heading">Pre-Tax Net Sales:</span> ${{$closeOutResults['preTaxNetSales']}}</p> 
        </div>

        <div class="sales-info">
            <table>
                <tr>
                    <th>Method</th>
                    <th>Sales</th>
                    <th>Deposit</th>
                </tr>

                <tr>
                    <td>Cash</td>
                    <td>{{$closeOutResults['inputCashSales']}}</td>
                    <td>{{$closeOutResults['calculatedCashSales']}}</td>
                </tr>

                <tr>
                    <td>Interac</td>
                    <td>{{$closeOutResults['inputInteracSales']}}</td>
                    <td>{{$closeOutResults['calculatedInteracSales']}}</td>
                </tr>

                <tr>
                    <td>MasterCard</td>
                    <td>{{$closeOutResults['inputMasterCardSales']}}</td>
                    <td>{{$closeOutResults['calculatedMasterCardSales']}}</td>
                </tr>

                <tr>
                    <td>Visa</td>
                    <td>{{$closeOutResults['inputVisaSales']}}</td>
                    <td>{{$closeOutResults['calculatedVisaSales']}}</td>
                </tr>

                <tr>
                    <td>Other</td>
                    <td>{{$closeOutResults['inputOtherSales']}}</td>
                    <td>{{$closeOutResults['calculatedOtherSales']}}</td>
                </tr>

                <tr>
                    <td>Total</td>
                    <th>{{$closeOutResults['netSales']}}</th>
                    <th>{{$closeOutResults['netSales']}}</th>
                </tr>

            </table>
        
        </div>
        <hr />
        <div class="sales-list col-md-12">
            <table>
                <tr>
                    <th>Invoice #</th>
                    <th>Description</th>
                    <th>Sku</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>GST</th>
                    <th>PST</th>
                    <th>Total</th>
                    <th>Time</th>
                    <th>Staff</th>
                </tr>

                @foreach($sales as $sale)
                    <tr style="font-weight: bold; border-top: 1px solid black;">
                        <td>{{$sale->id}}</td>
                        <td></td>
                        <td></td>
                        <td>{{$sale->total_items}}</td>
                        <td>${{number_format(($sale->total - $sale->total_gst - $sale->total_pst), 2)}}</td>
                        <td>${{number_format($sale->total_gst, 2)}}</td>
                        <td>${{number_format($sale->total_pst, 2)}}</td>
                        <td>${{number_format($sale->total, 2)}}</td>
                        <td>{{$sale->created_at->format('H:m')}}</td>
                        <td>{{$sale->staff}}</td>
                    </tr>

                    @foreach($sale->sale as $product)
                        <tr>
                            <td></td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>${{number_format($product->extended, 2)}}</td>
                            <td>${{number_format($product->gst, 2)}}</td>
                            <td>${{number_format($product->pst, 2)}}</td>
                            <td>${{number_format($product->total, 2)}}</td>
                            <td></td>
                            <td></td>
                            <td></td>                         
                        </tr>
                    @endforeach
                @endforeach

                <tr style="border-top: 1px solid black">
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>{{$closeOutResults['itemsSold']}}</td>
                    <td>${{number_format($closeOutResults['preTaxNetSales'], 2)}}</td>
                    <td>${{number_format($closeOutResults['totalGST'], 2)}}</td>
                    <td>${{number_format($closeOutResults['totalPST'], 2)}}</td>
                    <td>${{number_format($closeOutResults['netSales'], 2)}}</td>
                    <td></td>
                    <td></td>

                </tr>
            </table>
            <table class="totals">
                <tr>
                    <td>Sales: ${{number_format($closeOutResults['preTaxNetSales'], 2)}}</td>
                    <td>GST: ${{number_format($closeOutResults['totalGST'], 2)}}</td>
                    <td>PST: ${{number_format($closeOutResults['totalPST'], 2)}}</td>
                    <td>Total: ${{number_format($closeOutResults['netSales'], 2)}}</td>
                </tr>
            </table>

        </div>

    </div>
    @if($print)
        <script>
            window.print();
            setTimeout(window.close, 500);
        </script>
    @endif
</body>
</html>
