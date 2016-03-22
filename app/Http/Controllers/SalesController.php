<?php
//Comment
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sale;
use App\Invoice;
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
        $invoiceData = Invoice::where('created_at', '>=', date('Y-m-d'))->where('location', Auth::User()->name)->get();


        $itemsSold = 0;
        $totalSales = 0;

        foreach($invoiceData as $invoice)
        {
            //TODO: Count quanity from quantity field.
            $itemsSold += count($invoice->sale);
            $totalSales += $invoice->total;
        }

        $totalInvoices = count($invoiceData);
        if($totalInvoices > 0)
        {
            $itemsPerInvoice = round($itemsSold/$totalInvoices, 2);
            $salesPerInvoice = round($totalSales/$totalInvoices, 2);
        } else
        {
            $itemsPerInvoice = 0;
            $salesPerInvoice = 0;
        }


        return view('sales')
                ->with('totalInvoices', $totalInvoices)
                ->with('totalSales', $totalSales)
                ->with('itemsSold', $itemsSold)
                ->with('itemsPerInvoice', $itemsPerInvoice)
                ->with('salesPerInvoice', $salesPerInvoice);
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
        //
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
