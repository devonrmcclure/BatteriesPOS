<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;


class VendorInvoicesController extends ApiController
{	
	protected $vendorInvoiceTransformer;
	//Declare the model we are working on
	protected $model = '\App\VendorInvoice';

	function __construct()
	{
		return parent::__construct();
	}

	public function index(Request $request)
	{

		$invoice = $this->getResults($this->model, $request->all());

		if($invoice->isEmpty())
		{
			return $this->respondNotFound('Invoice does not exist');
		}

		return $this->respond([
			'data' => $invoice,
			'user' => \Auth::guard('api')->user()
		]);
	}
}
