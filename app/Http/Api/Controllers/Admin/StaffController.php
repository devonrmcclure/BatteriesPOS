<?php

namespace App\Http\Api\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Helpers\Phone;

use App\Staff;
use App\Http\Requests\StoreStaff;




class StaffController extends \App\Http\Api\Controllers\ApiController
{   
    //Declare the model we are working on
    protected $model = '\App\Staff';

    function __construct()
    {
        return parent::__construct();
    }

    public function index(Request $request)
    {

        $staff = $this->getResults($this->model, $request->all());

        if($staff->isEmpty())
        {
            return $this->respondNotFound('Staff does not exist');
        }

        return $this->respond([
            'data' => $staff,
            'user' => \Auth::guard('api')->user()
        ]);
    }

    public function store(StoreStaff $request) 
    {
        //dd($request->all());
        $phone = Phone::formatNumber($request->input('staff-primary-phone'));
        $staff = new Staff();
        $staff->first_name = $request->input('staff-first-name');
        $staff->last_name = $request->input('staff-last-name');
        $staff->rep_code   = $request->input('staff-repcode');
        $staff->address   = $request->input('staff-address');
        $staff->city      = $request->input('staff-city');
        $staff->province  = $request->input('staff-province');
        $staff->country   = $request->input('staff-country');
        $staff->postal_code = $request->input('staff-postal-code');
        $staff->primary_phone = Phone::formatNumber($request->input('staff-primary-phone'));
        $staff->secondary_phone = Phone::formatNumber($request->input('staff-secondary-phone'));
        $staff->email = $request->input('staff-email');
        $staff->location_id = $request->input('staff-location-id');
        $staff->save();

        return $staff;
    }
}
