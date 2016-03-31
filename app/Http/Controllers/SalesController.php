<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sale;
use App\Invoice;
use App\Customer;
use App\Inventory;
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
        $totalSales = round($totalSales, 2);


        $totalInvoices = count($invoiceData);

        if($totalInvoices > 0)
        {
            $itemsPerInvoice = number_format($itemsSold/$totalInvoices, 2);
            $salesPerInvoice = number_format($totalSales/$totalInvoices, 3);
        } else
        {
            $itemsPerInvoice = 0;
            $salesPerInvoice = 0;
        }
        $itemsSold = number_format($itemsSold, 0);
        $totalSales = number_format($totalSales, 2);



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

        //Calculate total gst and pst.
        $totalPST = 0;
        $totalGST = 0;

        for($i = 0; $i < count($request->sku); $i++)
        {
            $totalPST += $request->pst[$i];
            $totalGST += $request->gst[$i];
        }

        //Create the new invoice
        $invoice = new Invoice();
        $invoice->id = $request->invoice_number;
        $invoice->location = Auth::User()->name;
        $invoice->total_pst = $totalPST;
        $invoice->total_gst = $totalGST;
        $invoice->total = $request->sale_total;
        $invoice->customer_id = $request->customer_id;
        $invoice->payment_method = 'Cash';
        $invoice->staff = 'Devon';
        $invoice->invoice_comment = 'Not returnable';
        $invoice->gst_number = 'fjkdslfjklds';
        $invoice->printed = false;
        $invoice->save();

        for($i = 0; $i < count($request->sku); $i++)
        {
            $sale = new Sale();
            $sale->invoice_id = $request->invoice_number;
            $sale->sku = $request->sku[$i];
            $sale->description = $request->description[$i];
            $sale->category = 'Button Cell Batteries';
            $sale->quantity = $request->quantity[$i];
            $sale->price = $request->unit_price[$i];
            $sale->discount = $request->discount[$i];
            $sale->extended = $request->extended[$i];
            $sale->pst = $request->pst[$i];
            $sale->gst = $request->gst[$i];
            $sale->total = $request->sku_total[$i];
            $sale->save();
        }



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

    public function getProductByID($id) {
        return json_encode(Inventory::find($id));
    }
}
