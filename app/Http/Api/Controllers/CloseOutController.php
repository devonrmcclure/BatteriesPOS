<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;
use App\Invoice;
use App\Sale;

use App\Http\Api\Transformers\StatsTransformer;


class DailyStatsController extends ApiController
{   
    //Declare the model we are working on
    //protected $invoices = '\App\Sale';

    function __construct()
    {
        return parent::__construct();
    }

    public function index(Request $request)
    {
        //todo: check if day has already been closed, if so, populate fields with that data, if not, empty data.
        $parameters = $request->all();
        
        return $this->respond([
            'data' => [
                
            ],
            'user' => \Auth::guard('api')->user()
        ]);
    }

    //on POST update the closing stats for the day. 
}
