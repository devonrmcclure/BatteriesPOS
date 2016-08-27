<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;


class PurchasesController extends ApiController
{	
	//Declare the model we are working on
	protected $model = '\App\Purchase';

	function __construct()
	{
		return parent::__construct();
	}

	public function index(Request $request)
	{

		$purchases = $this->getResults($this->model, $request->all());

		if($purchases->isEmpty())
		{
			return $this->respondNotFound('Purchase does not exist');
		}
		return $this->respond([
			'data' => $purchases,
			'user' => \Auth::guard('api')->user()
		]);
	}
}
