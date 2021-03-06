<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Helpers\Phone;

use App\Http\Requests;
use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;

use App\Customer;

use Carbon\Carbon;


class ToDoController extends ApiController
{   
    //Declare the model we are working on
    protected $model = '\App\ToDo';

    function __construct()
    {
        return parent::__construct();
    }

    public function index(Request $request)
    {

        $customers = $this->getResults($this->model, $request->all());

        if($customers->isEmpty())
        {
            return $this->respondNotFound('ToDo does not exist');
        }
        return $this->respond([
            'data' => $customers,
            'user' => \Auth::guard('api')->user()
        ]);
    }

    public function store(StoreCustomer $request) 
    {
        //dd($request->all());
        $customer = new Customer();
        $customer->first_name = $request->input('customer-first-name');
        $customer->last_name = $request->input('customer-last-name');
        $customer->company   = $request->input('customer-company');
        $customer->address   = $request->input('customer-address');
        $customer->city      = $request->input('customer-city');
        $customer->province  = $request->input('customer-province');
        $customer->country   = $request->input('customer-country');
        $customer->postal_code = $request->input('customer-postal-code');
        $customer->primary_phone = Phone::formatNumber($request->input('customer-primary-phone'));
        $customer->secondary_phone = Phone::formatNumber($request->input('customer-secondary-phone'));
        $customer->email = $request->input('customer-email');
        $customer->comments = $request->input('customer-comments');
        $customer->store_credit = $request->input('customer-store-credit');
        $customer->location_id = \Auth::guard('api')->user()->id;
        $customer->save();

        return $customer;
    }

    public function update(Request $request)
    {
       $todo = \App\ToDo::find($request->input('id'));

       $todo->completed = Carbon::now();
       $todo->save();

       return $todo;
    }
}
