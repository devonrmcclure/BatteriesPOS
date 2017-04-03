<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use Auth;

class SettingsController extends ApiController
{
    //Declare the model we are working on
    protected $model = '\App\Setting';

    function __construct()
    {
        return parent::__construct();
    }

    public function index(Request $request)
    {

        $setting = $this->getResults($this->model, $request->all());

        if($setting->isEmpty())
        {
            return $this->respondNotFound('Setting does not exist');
        }

        return $this->respond([
            'data' => $setting,
            'user' => \Auth::guard('api')->user()
        ]);
    }

    public function store(Request $request)
    {  
    }
}
