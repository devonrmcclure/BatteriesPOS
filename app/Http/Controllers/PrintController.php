<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;

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
        //dd($invoice->toArray());

        return view('print/sales/index')->with('invoice', $invoice)->with('print', $print);
    }

    public function repair_order_invoice($id) {
        //get repair order info
        //send to view
        $invoice = 1;
        return view('print/repair-orders/index')->with('invoice', $invoice);
    }

    public function part_order_invoice($id) {
        //get part order info
        //send to view
    }
}