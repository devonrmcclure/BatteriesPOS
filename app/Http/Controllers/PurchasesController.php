<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Purchase;
use App\Inventory;
use App\VendorInvoice;

class PurchasesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

    	$previousPurchases = VendorInvoice::latest()->get();


    	return view('admin.history.index')
    	        ->with('previousPurchases', $previousPurchases);
    }

    public function store(Request $request)
    {

       //Create the new invoice
       $invoice = new VendorInvoice();
       $invoice->invoice_id = $request->vendor_invoice;
       $invoice->vendor = 'Fake Vendor';
       $invoice->total_gst = 0.00;
       $invoice->total = $request->purchase_total;
       $invoice->payment_method = 'Cash';
       $invoice->staff = 'Devon';
       //TODO: Once there is an invoice comment DB Table, get the comment from it and hard-code the comment here.
       $invoice->comments = $request->comments;
       $invoice->save();

       for($i = 0; $i < count($request->sku); $i++)
       {
           $sale = new Purchase();
           $sale->vendor_invoice_id = $request->vendor_invoice;
           $sale->sku = $request->sku[$i];
           $sale->description = $request->description[$i];
           $sale->brand = 'Maxell';
           $sale->ep_cost_vendor = 0.00;
           $sale->ep_cost_landed = 0.00;
           $sale->quantity = $request->quantity[$i];
           $sale->total = $request->sku_total[$i];
           $sale->save();
       }



       return redirect('admin/purchase/history');
    }


    public function getProduct($id)
    {
    	return json_encode(Inventory::find($id));
    }
}
