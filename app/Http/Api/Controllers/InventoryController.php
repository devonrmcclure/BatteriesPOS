<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;


class InventoryController extends ApiController
{	
	//Declare the model we are working on
	protected $model = '\App\Inventory';

	function __construct()
	{
		return parent::__construct();
	}

	public function index(Request $request)
	{

		$inventory = $this->getResults($this->model, $request->all());

		if($inventory->isEmpty())
		{
			return $this->respondNotFound('Product does not exist');
		}

		return $this->respond([
			'data' => $inventory,
			'user' => \Auth::guard('api')->user()
		]);
	}
}
