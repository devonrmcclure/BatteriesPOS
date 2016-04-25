<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;


class RepairOrdersController extends ApiController
{   
    //Declare the model we are working on
    protected $model = '\App\RepairOrder';

    function __construct()
    {
    }

    public function index(Request $request)
    {

        $repairOrders = $this->getResults($this->model, $request->all());

        if($repairOrders->isEmpty())
        {
            return $this->respondNotFound('No Repair Orders');
        }

        return $this->respond([
            'data' => $repairOrders,
            'user' => \Auth::guard('api')->user()
        ]);
    }

    public function store(Request $request)
    {   
        
    }
}
