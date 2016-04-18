<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;


class StaffController extends ApiController
{	
	//Declare the model we are working on
	protected $model = '\App\Staff';

	function __construct()
	{
	}

	public function index(Request $request)
	{

		$staff = $this->getResults($this->model, $request->all());

		if($staff->isEmpty())
		{
			return $this->respondNotFound('Purchase does not exist');
		}

		return $this->respond([
			'data' => $staff,
			'user' => \Auth::guard('api')->user()
		]);
	}
}