<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\DailyCloseOut;
use Auth;
use Carbon\Carbon;

class CloseOutController extends ApiController
{   
    //Declare the model we are working on
    protected $model = '\App\DailyCloseOut';

    function __construct()
    {
        return parent::__construct();
    }

    public function index(Request $request)
    {
        $closeOut = DailyCloseOut::where('created_at', '>=', Carbon::today())->where('store_id', Auth::guard('api')->user()->id)->first();
        //todo: check if day has already been closed, if so, populate fields with that data, if not, empty data.
        if($closeOut == null)
        {
            return $this->respondNotFound('Close out has not been done');
        }

        return $this->respond([
            'data' => $closeOut,
            'user' => \Auth::guard('api')->user()
        ]);
    }

    //on POST update the closing stats for the day. 
    //
    public function store(Request $request)
    {

        if(null !== $request->input('cash') 
                && null !== $request->input('interac')
                && null !== $request->input('visa')
                && null !== $request->input('mastercard')
                && null !== $request->input('other')
                && null !== $request->input('total')
        ){
            if(DailyCloseOut::where('created_at', '>=', Carbon::today())->where('store_id', Auth::guard('api')->user()->id)->first() == null)
            {
                $closeOut = new DailyCloseOut;
                $closeOut->cash = str_replace('$ ', '', $request->input('cash'));
                $closeOut->interac = str_replace('$ ', '', $request->input('interac'));
                $closeOut->visa = str_replace('$ ', '', $request->input('visa'));
                $closeOut->mastercard = str_replace('$ ', '', $request->input('mastercard'));
                $closeOut->other = str_replace('$ ', '', $request->input('other'));
                $closeOut->total = str_replace('$ ', '', $request->input('total'));
                $closeOut->store_id = Auth::guard('api')->user()->id;
                $closeOut->save();

                return $this->respond([
                    'data' => [
                        'message' => 'success'
                    ],
                    'user' => \Auth::guard('api')->user()
                ]);
            }
            else {
                //Close out already exists, so update it.
                $closeOut = DailyCloseOut::where('created_at', '>=', Carbon::today())->where('store_id', Auth::guard('api')->user()->id)->first();

                $closeOut->cash = str_replace('$ ', '', $request->input('cash'));
                $closeOut->interac = str_replace('$ ', '', $request->input('interac'));
                $closeOut->visa = str_replace('$ ', '', $request->input('visa'));
                $closeOut->mastercard = str_replace('$ ', '', $request->input('mastercard'));
                $closeOut->other = str_replace('$ ', '', $request->input('other'));
                $closeOut->total = str_replace('$ ', '', $request->input('total'));
                $closeOut->store_id = Auth::guard('api')->user()->id;
                $closeOut->save();

                return $this->respond([
                    'data' => [
                        'message' => 'close out updated'
                    ],
                    'user' => \Auth::guard('api')->user()
                ]);
            }
            
        }

        $this->setStatusCode(400);

        return $this->respondWithError('Please enter all fields');
    }
}
