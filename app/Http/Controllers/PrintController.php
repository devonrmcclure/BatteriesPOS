<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\PartOrder;
use App\RepairOrder;
use App\DailyCloseOut;

use Carbon\Carbon;

use App\Http\Requests;

class PrintController extends Controller
{   

    // GENERAL TODO: Only allow either admin or the location itself to access sales.
    // IE: White Rock should *only* be able to access its own sales, not that of GF, RM, etc.

    public function __construct()
    {
        // TODO: Also check if user is admin.
        $this->middleware('auth');
    }

    public function sales_invoice($id) {
        // Get the invoice and corresponding sales data based on ID. 
        // Render it to a view in /print/sales/index.blade.php

        $invoice = Invoice::where('id', $id)->with('sale', 'customer')->first();

        isset($_GET['print']) ? $print = true : $print = false;
        isset($_GET['duplicate']) ? $duplicate = true : $duplicate = false;
        //dd($invoice->toArray());

        return view('print/sales/index')->with('invoice', $invoice)->with('print', $print)->with('duplicate', $duplicate);
    }

    public function part_order_invoice($id) {
        //get part order info
        //send to view

        $partOrder = PartOrder::where('id', $id)->with('customer', 'invoice')->first();
        $invoice = null;
        if($partOrder->invoice !== null) 
        {
            $invoice = Invoice::where('id', $partOrder->invoice->id)->with('sale')->first();
        }

        return view('print/part-orders/index')->with('partOrder', $partOrder)->with('invoice', $invoice);
    }

    public function repair_order_invoice($id) {
        //get repair order info
        //send to view
        $invoice = RepairOrder::where('id', $id)->with('customer', 'staff')->first();
        //dd($invoice->toArray());
        return view('print/repair-orders/index')->with('invoice', $invoice);
    }

    public function close_out($date) {
        $preTaxSales = 0;
        $preTaxReturns = 0;
        $preTaxNetSales = 0;

        $closeOutDate = $date;

        $sales = 0;
        $returns = 0;
        $netSales = 0;

        $calculatedCashSales = 0;
        $calculatedInteracSales = 0;
        $calculatedMasterCardSales = 0;
        $calculatedVisaSales = 0;
        $calculatedOtherSales = 0;

        $inputCashSales = 0;
        $inputInteracSales = 0;
        $inputMasterCardSales = 0;
        $inputVisaSales = 0;
        $inputOtherSales = 0;

        //get values for closeout if already exists.
        $closeOut = DailyCloseOut::whereDate('created_at', '=', $date)->first();

        $inputCashSales = $closeOut->cash;
        $inputInteracSales = $closeOut->interac;
        $inputMasterCardSales = $closeOut->mastercard;
        $inputVisaSales = $closeOut->visa;
        $inputOtherSales = $closeOut->other;

        $itemsSold = 0;

        //get values from invoices ->with('sale', 'customer'). 
        $invoices = Invoice::whereDate('created_at', '=', $date)->with('sale', 'customer')->get();

        $invoiceCount = count($invoices);
        
        //determine sales, refunds, and net sales.  
        foreach ($invoices as $invoice)
        {   
            switch($invoice->payment_method)
            {
                case 'Cash':
                    $calculatedCashSales += $invoice->total;
                    break;
                case 'Interac':
                    $calculatedInteracSales += $invoice->total;
                    break;
                case 'MasterCard':
                    $calculatedMasterCardSales += $invoice->total;
                    break;
                case 'Visa':
                    $calculatedVisaSales += $invoice->total;
                    break;
                default:
                    echo 'This should not happen';
                    break;
            }

            foreach ($invoice->sale as $product)
            {   

                $itemsSold += $product->quantity;

                if((float) $product->total < 0)
                {   
                    $preTaxReturns += abs($product->extended);
                    $returns += abs($product->total);
                } else {
                    $preTaxSales += $product->extended;
                    $sales += $product->total;
                }
            }
        }

        $preTaxNetSales = $preTaxSales - $preTaxReturns;
        $netSales = $sales - $returns;
        $salesPerInvoice = $netSales/$invoiceCount;

        $closeOutResults = compact('preTaxSales', 'preTaxReturns', 'preTaxNetSales', 'sales', 'returns', 'netSales', 
            'calculatedCashSales', 'calculatedInteracSales', 'calculatedMasterCardSales', 'calculatedVisaSales', 
            'calculatedOtherSales', 'inputCashSales', 'inputInteracSales', 'inputMasterCardSales', 'inputVisaSales',
            'inputOtherSales', 'closeOutDate', 'itemsSold', 'invoiceCount', 'salesPerInvoice');

        return view('print/close-out/index')->with('closeOutResults', $closeOutResults)->with('sales', $invoices);
    }
}
