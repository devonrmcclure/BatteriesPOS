<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\PartOrder;
use Carbon\Carbon;

class PartOrdersController extends ApiController
{
    //Declare the model we are working on
    protected $model = '\App\PartOrder';

    function __construct()
    {
    }

    public function index(Request $request)
    {

        $partOrders = $this->getResults($this->model, $request->all());

        if($partOrders->isEmpty())
        {
            return $this->respondNotFound('No Part Orders');
        }

        return $this->respond([
            'data' => $partOrders,
            'user' => \Auth::guard('api')->user()
        ]);
    }

    public function store(Request $request)
    {
        //TODO: Validation. (Use Laravel's validator.)

        $partOrder = new PartOrder;
        $partOrder->id = $request->input('part-order-id');
        $partOrder->referred_by = $request->input('referred-by');
        $partOrder->customer_id = $request->input('customer-id');
        $partOrder->deposit = $request->input('deposit');
        $partOrder->staff_id = 1;
        $partOrder->item = $request->input('item');
        $partOrder->model = $request->input('model');;
        $partOrder->part_number = $request->input('part-number');
        $partOrder->pick_up_location = $request->input('pick-up-location');
        $partOrder->location_id = \Auth::guard('api')->user()->id;
        $partOrder->invoice_id = $request->input('invoice');
        $partOrder->notes = $request->input('notes');
        $partOrder->to_head_office = Carbon::now();
        $partOrder->save();
    }

    public function show($id) 
    {      

        $partOrder = PartOrder::where('id', $id)->where('location_id', \Auth::guard('api')->user()->id)->first();
        return $this->respond([
            'data' => $partOrder,
            'user' => \Auth::guard('api')->user()
        ]);
    }
}
