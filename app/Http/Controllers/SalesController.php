<?php
//Comment
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sale;
use App\Invoice;
use App\Customer;
use App\Inventory;
use Auth;
use App\Staff;

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
        return view('sales.index');
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
        $invoice->staff = $request->rep_name;
        $invoice->invoice_comment = $request->invoice_comment;
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

    public function getStaff($rep) {
        return json_encode(Staff::where('rep_code', $rep)->first());
    }
}
