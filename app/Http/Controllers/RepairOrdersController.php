<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\RepairOrder;

class RepairOrdersController extends Controller
{

    public function index()
    {
        return view('repair-orders.index');
    }

    public function store(Request $request) {

        //TODO: Validation. (Use Laravel's validator.)

        $repairOrder = new RepairOrder;

        $repairOrder->referred_by = $request->input('referred-by');
        $repairOrder->customer_id = 1;
        $repairOrder->call_if_over = $request->input('call_if_over');
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
        $repairOrder->location_id = Auth::user()->id;
        $repairOrder->invoice_id = NULL;
        $repairOrder->problem = $request->input('problem');
        $repairOrder->notes = NULL;
        $repairOrder->to_head_office = '0000-00-00 00:00:00';
        $repairOrder->save();

    }
}
