<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;
use App\Invoice;
use App\Sale;


class SalesController extends ApiController
{	
	protected $salesTransformer;
	//Declare the model we are working on
	protected $model = '\App\Sale';

	function __construct()
	{
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
		// $products = $request->input('products');
		// //dd($products[0]['sku']);
		 $prices = $request->input('prices');
		// $invoice = $request->input('invoice');
		// $total = $request->input('sale_total');

		$totalPST = 0;
        $totalGST = 0;

        for($i = 0; $i < count($prices); $i++)
        {
            $totalPST += $prices[$i]['pst'];
            $totalGST += $prices[$i]['gst'];
        }
		//Add invoice. 
		$invoice = new Invoice();
        $invoice->id = '3333';
        $invoice->location = 'White Rock';
        $invoice->total_pst = $totalPST;
        $invoice->total_gst = $totalGST;
        $invoice->total = 500;
        $invoice->customer_id = 1;
        $invoice->payment_method = 'Cash';
        $invoice->staff = 'Dev';
        $invoice->invoice_comment = 'comment';
        $invoice->gst_number = 'fjkdslfjklds';
        $invoice->printed = false;
        $invoice->save();
	}
}
