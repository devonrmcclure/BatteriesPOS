<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Qoh;


class QuantityOnHandController extends ApiController
{	
	//Declare the model we are working on
	protected $model = '\App\Qoh';

	function __construct()
	{
	}

	public function index(Request $request)
	{

		$qoh = $this->getResults($this->model, $request->all());

		if($qoh->isEmpty())
		{
			return $this->respondNotFound('Qoh does not exist');
		}
		return $this->respond([
			'data' => $qoh,
			'user' => \Auth::guard('api')->user()
		]);
	}
}
