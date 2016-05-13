<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;
use App\Invoice;
use App\Sale;
use App\Qoh;

class SalesController extends ApiController
{
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
		$products = $request->input('products');
		$prices = $request->input('prices');
		// $invoice = $request->input('invoice');
		// $total = $request->input('sale_total');
		//dd($prices);
		$totalPST = 0;
        $totalGST = 0;

        for($i = 0; $i < count($prices); $i++)
        {
            $totalPST += $prices[$i]['pst'];
            $totalGST += $prices[$i]['gst'];
        }
		//Add invoice.
		$invoice = new Invoice();
        $invoice->id = $request->invoice;
        $invoice->location = $request->input('location')['name'];
        $invoice->total_pst = $totalPST;
        $invoice->total_gst = $totalGST;
        $invoice->total = $request->total;
        $invoice->customer_id = $request->input('customer')['id'];
        $invoice->payment_method = $request->input('method');
        $invoice->staff = $request->input('rep')['first_name'];
        $invoice->invoice_comment = $request->input('invoice_comment');
        $invoice->gst_number = $request->input('location')['gst_number'];
        $invoice->printed = $request->input('printed');
        $invoice->save();

        //Add product

        foreach($products as $i => $product)
        {
            $sale = new Sale();
            $sale->invoice_id = $request->invoice;
            $sale->location_id = $request->input('location')['id'];
            $sale->sku = $product['sku'];
            $sale->description = $product['description'];
            $sale->category = 'Button Cell Batteries';
            $sale->quantity = $prices[$i]['quantity'];
            $sale->price = $product['unit_price'];
            $sale->discount = $prices[$i]['discount'];
            $sale->extended = $prices[$i]['extended'];
            $sale->pst = $prices[$i]['pst'];
            $sale->gst = $prices[$i]['gst'];
            $sale->total = $prices[$i]['sku_total'];
            $sale->save();

            $qoh = Qoh::where('location_id', \Auth::guard('api')->user()->id)->where('sku', $product['sku'])->first();
            $qoh->quantity -= $prices[$i]['quantity'];
            $qoh->save();
        }
	}
}
