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

class StockOrderController extends ApiController
{
    //Declare the model we are working on
    protected $model = '\App\StockOrderHistory';

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
       
    }
}
