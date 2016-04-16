<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;


class CustomersController extends ApiController
{	
	//Declare the model we are working on
	protected $model = '\App\Customer';

	function __construct()
	{
	}

	public function index(Request $request)
	{

		$customers = $this->getResults($this->model, $request->all());

		if($customers->isEmpty())
		{
			return $this->respondNotFound('Customer does not exist');
		}
		return $this->respond([
			'data' => $customers,
			'user' => \Auth::guard('api')->user()
		]);
	}
}
