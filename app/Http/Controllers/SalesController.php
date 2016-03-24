<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sale;
use App\Invoice;
use App\Customer;
use Auth;

class SalesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemsSold = 0;
        $totalSales = 0;

        /**
         * Calculate stats for the daily sales.
         * -Invoice count (# of unique invoice #s)
         * -Total items sold
         * -Items/invoice
         * -$$ Per invoice
         * -Total sales (pre-tax)
         * -Total sales (post-tax)
         * -Individual for each Method (allow user input for close out.)
         */

        //Get all invoices from the logged in store for today.
        $invoiceData = Invoice::today()->get();


        $invoiceNumber = Invoice::orderBy('id', 'DESC')->where('location', Auth::User()->name)->first();

        $invoiceNumber = $invoiceNumber->id + 1;
        $customer = Customer::defaultCustomer()->first();

        $itemsSold = 0;
        $totalSales = 0;

        foreach($invoiceData as $invoice)
        {

            foreach($invoice->sale as $item) {
                $itemsSold += $item->quantity;
            }

            $totalSales += $invoice->total;
        }
        $totalSales = number_format(round($totalSales, 2), 2);

        $totalInvoices = count($invoiceData);
        if($totalInvoices > 0)
        {
            $itemsPerInvoice = number_format($itemsSold/$totalInvoices, 2);
            $salesPerInvoice = number_format($totalSales/$totalInvoices, 2);
        } else
        {
            $itemsPerInvoice = 0;
            $salesPerInvoice = 0;
        }




        return view('sales.index')
                ->with('totalInvoices', $totalInvoices)
                ->with('totalSales', $totalSales)
                ->with('itemsSold', $itemsSold)
                ->with('itemsPerInvoice', $itemsPerInvoice)
                ->with('salesPerInvoice', $salesPerInvoice)
                ->with('customer', $customer)
                ->with('invoiceNumber', $invoiceNumber);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Create the new invoice
        $invoice = new Invoice();
        $invoice->id = $request->invoice_number;
        $invoice->location = Auth::User()->name;
        $invoice->total_pst = $request->pst;
        $invoice->total_gst = $request->gst;
        $invoice->total = $request->sku_total;
        $invoice->customer_id = $request->customer_id;
        $invoice->payment_method = 'Cash';
        $invoice->staff = 'Devon';
        $invoice->invoice_comment = 'Not returnable';
        $invoice->gst_number = 'fjkdslfjklds';
        $invoice->printed = false;
        $invoice->save();
        //Create the sale
        //
        $sale = new Sale();
        $sale->invoice_id = $request->invoice_number;
        $sale->sku = $request->sku;
        $sale->description = $request->description;
        $sale->category = 'Button Cell Batteries';
        $sale->quantity = $request->quantity;
        $sale->price = $request->unit_price;
        $sale->discount = $request->discount;
        $sale->extended = $request->extended;
        $sale->pst = $request->pst;
        $sale->gst = $request->gst;
        $sale->total = $request->sku_total;
        $sale->save();

        return redirect('sales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
