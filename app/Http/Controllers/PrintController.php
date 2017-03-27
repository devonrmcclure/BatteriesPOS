<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;

use App\Http\Requests;

class PrintController extends Controller
{

    public function __construct()
    {
        // TODO: Also check if user is admin.
        $this->middleware('auth');
    }

    public function sales_invoice($id) {
        // Get the invoice and corresponding sales data based on ID. 
        // Render it to a view in /print/sales/index.blade.php

        $invoice = Invoice::where('id', $id)->with('sale', 'customer')->first();
        //dd($invoice->toArray());

        return view('print/sales/index')->with('invoice', $invoice);
    }
}
