<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\RepairOrder;

use App\Http\Requests\StoreRepairOrder;

use Auth;

use Carbon\Carbon;


class RepairOrdersController extends ApiController
{
    //Declare the model we are working on
    protected $model = '\App\RepairOrder';

    function __construct()
    {
        return parent::__construct();
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

    public function store(StoreRepairOrder $request) {

        $repairOrder = new RepairOrder;
        $repairOrder->id = $request->input('orderNumber');
        $repairOrder->referred_by = $request->input('referred-by');
        $repairOrder->customer_id = $request->input('customer-id');
        $repairOrder->call_if_over = $request->input('call-if-over');
        $repairOrder->original_receipt = true; //DO a check for if the original receipt checkbox is on or not, then set true of false that way.
        $repairOrder->warranty = true; //Same as original_receipt
        $repairOrder->deposit = $request->input('deposit');
        $repairOrder->staff_id = 1;
        $repairOrder->product = $request->input('product');
        $repairOrder->model = $request->input('model');
        $repairOrder->type = $request->input('type');
        $repairOrder->date_code = $request->input('date_code');
        $repairOrder->condition = $request->input('condition');
        $repairOrder->accessories = $request->input('accessories');
        $repairOrder->location_id = Auth::guard('api')->user()->id;
        $repairOrder->invoice_id = $request->input('deposit-invoice');
        $repairOrder->problem = $request->input('problem');
        $repairOrder->notes = $request->input('notes');
        $repairOrder->to_head_office = Carbon::now()->format('Y-m-d H:i:s');
        $repairOrder->save();

    }

    public function update(StoreRepairOrder $request) {

        $repairOrder = RepairOrder::find($request->input('orderNumber'));

        //dd($repairOrder->referred_by);
        
        $repairOrder->referred_by = $request->input('referred-by');
        $repairOrder->customer_id = $request->input('customer-id');
        $repairOrder->call_if_over = $request->input('call-if-over');
        $repairOrder->original_receipt = true; //DO a check for if the original receipt checkbox is on or not, then set true of false that way.
        $repairOrder->warranty = true; //Same as original_receipt
        $repairOrder->deposit = $request->input('deposit');
        $repairOrder->staff_id = 1;
        $repairOrder->product = $request->input('product');
        $repairOrder->model = $request->input('model');
        $repairOrder->type = $request->input('type');
        $repairOrder->date_code = $request->input('date_code');
        $repairOrder->condition = $request->input('condition');
        $repairOrder->accessories = $request->input('accessories');
        $repairOrder->location_id = Auth::guard('api')->user()->id;
        $repairOrder->invoice_id = $request->input('deposit-invoice');
        $repairOrder->problem = $request->input('problem');
        $repairOrder->notes = $request->input('notes');
        $repairOrder->to_head_office = Carbon::now()->format('Y-m-d H:i:s');
        $repairOrder->save();

    }
}
