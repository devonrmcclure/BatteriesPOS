<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Requests\StorePartOrder;

use App\PartOrder;
use Carbon\Carbon;

class PartOrdersController extends ApiController
{
    //Declare the model we are working on
    protected $model = '\App\PartOrder';

    function __construct()
    {
        return parent::__construct();
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

    public function store(StorePartOrder $request)
    {
        //TODO: Validation. (Use Laravel's validator.)

        $partOrder = new PartOrder;
        $partOrder->id = $request->input('part-order-id');
        $partOrder->referred_by = $request->input('referred-by');
        $partOrder->customer_id = $request->input('customer-id');
        $partOrder->make = $request->input('make');
        $partOrder->deposit = $request->input('deposit');
        $partOrder->staff_id = $request->input('staff');
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

    public function update(StorePartOrder $request)
    {
        //TODO: Validation. (Use Laravel's validator.)

        $partOrder = PartOrder::find($request->input('part-order-id'));
        

        $partOrder->make = $request->input('make');
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

    public function updateTimestamp(Request $request, $id)
    {
        if($request->input('type') == 'fromHO')
        {
            $partOrder = PartOrder::find($id);

            $partOrder->from_head_office = Carbon::now();
            $partOrder->save();
            dd($request->all());

        } else if($request->input('type') == 'called') {
            
            $partOrder = PartOrder::find($id);

            $partOrder->customer_called = Carbon::now();
            $partOrder->save();
            dd($request->all());

        } else if($request->input('type') == 'pickUp') {

            $partOrder = PartOrder::find($id);

            $partOrder->customer_pick_up = Carbon::now();
            $partOrder->save();
            dd($request->all());

        } else {
            dd('RiP POs');
        }
    }
}
