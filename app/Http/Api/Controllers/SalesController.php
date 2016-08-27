<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;
use App\Invoice;
use App\Sale;
use App\Qoh;

use Auth;

class SalesController extends ApiController
{
	//Declare the model we are working on
	protected $model = '\App\Sale';

	function __construct()
    {
        return parent::__construct();
    }

	public function index(Request $request)
	{

		$sale = $this->getResults($this->model, $request->all());

		if($sale->isEmpty())
		{
			return $this->respondNotFound('Sale does not exist');
		}

		return $this->respond([
			'data' => $sale,
			'user' => \Auth::guard('api')->user()
		]);
	}

	public function store(Request $request)
	{   
		$totalPST = 0;
        $totalGST = 0;

        for($i = 0; $i < count($request->input('sku')); $i++)
        {   
            $totalPST += $request->input('pst')[$i];
            $totalGST += $request->input('gst')[$i];
        }
		//Add invoice.
		$invoice = new Invoice();
        $invoice->id = $request->input('sale-invoice');
        $invoice->location = \Auth::guard('api')->user()->name;
        $invoice->total_pst = $totalPST;
        $invoice->total_gst = $totalGST;
        $invoice->total = $request->input('sale-total');
        $invoice->customer_id = $request->input('customer-id');
        $invoice->payment_method = $request->input('payment-method');
        $invoice->staff = $request->input('sale-rep');
        $invoice->invoice_comment = $request->input('invoice-comment');
        $invoice->gst_number = \Auth::guard('api')->user()->gst_number;
        $invoice->printed = $request->input('printed');
        $invoice->save();

        //Add product

        for($i = 0; $i < count($request->input('sku')); $i++)
        {
            $sale = new Sale();
            $sale->invoice_id = $request->input('sale-invoice');
            $sale->location_id = \Auth::guard('api')->user()->id; //This should use Auth::user()->id instead
            $sale->sku = $request->input('sku')[$i];
            $sale->description = $request->input('description')[$i];
            $sale->category = 'Button Cell Batteries';
            $sale->quantity = $request->input('quantity')[$i];
            $sale->price = $request->input('unit-price')[$i];
            $sale->discount = $request->input('discount')[$i];
            $sale->extended = $request->input('extended')[$i];
            $sale->pst = $request->input('pst')[$i];
            $sale->gst = $request->input('gst')[$i];
            $sale->total = $request->input('sku-total')[$i];
            $sale->save();

            $qoh = Qoh::where('location_id', \Auth::guard('api')->user()->id)->where('sku', $request->input('sku')[$i])->first();
            $qoh->quantity -= $request->input('quantity')[$i];
            $qoh->save();
        }
	}
}
