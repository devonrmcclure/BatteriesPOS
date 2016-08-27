<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;


class LocationsController extends ApiController
{	
	//Declare the model we are working on
	protected $model = '\App\User';

	function __construct()
	{
		return parent::__construct();
	}

	public function index(Request $request)
	{

		$locations = $this->getResults($this->model, $request->all());

		if(!$locations)
		{
			return $this->respondNotFound('Purchase does not exist');
		}
		
		return $this->respond([
			'data' => $locations,
			'user' => \Auth::guard('api')->user()
		]);
	}
}
