<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Customer;
use App\Helpers\Phone;

use Carbon\Carbon;

class ApiController extends Controller
{
    protected $statusCode = 200;

    /**
     * Gets the value of statusCode.
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets the value of statusCode.
     *
     * @param mixed $statusCode the status code
     *
     * @return self
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Gets the value of locationId.
     *
     * @return mixed
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    public function respondNotFound($message = 'Not Found')
    {
    	return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respond($data, $headers = [])
    {
    	return \Response::json(
			$data, 
            $this->getStatusCode(), 
            $headers
        );
    }

    public function respondWithError($message)
    {
    	return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]
		]);
    }

    public function getResults($model, Array $parameters)
    {  
        //Default limit of 20.
        $limit = 20;
        $ignore = [
            'phone',
            'order_by',
            'limit',
            'api_token',
            'only',
            'between',
            'created_at',
            'updated_at'
        ];

        $query = $model::select();

        // $date1 = '2016-04-10';
        // $date2 = '2016-04-14';
        //return $query->whereBetween('created_at', [new Carbon($date1), new Carbon($date2)])->get();

        if(isset($parameters['only']))
        {
            $columns = explode(',', $parameters['only']);
            $query = $model::select($columns);
        }

        foreach($parameters as $column => $value)
        {
            if(in_array($column, $ignore))
            {
                continue;
            }

            $query->where($column, $value);
        }

        if(isset($parameters['phone']))
        {
            $phoneNum = Phone::formatNumber($parameters['phone']);
            $query->where(function($query) use($phoneNum) {
                $query->where('primary_phone', $phoneNum);
                $query->orWhere('secondary_phone', $phoneNum);
            });
        }

        if(isset($parameters['between']))
        {
            $range = explode(',', $parameters['between'], 3);
            $query->whereBetween($range[0], [new Carbon($range[1]), new Carbon($range[2])]);
        }

        if(isset($parameters['order_by']))
        {
            $order = explode(',', $parameters['order_by'], 2);
            $query->orderBy($order[0], $order[1]);
        }

        if(isset($parameters['limit']))
        {
            $limit = $parameters['limit'];
        }

        if(isset($parameters['created_at']))
        {
            $query->whereDate('created_at', '=', $parameters['created_at']);
        }

        if(isset($parameters['updated_at']))
        {
            $query->whereDate('updated_at', '=', $parameters['updated_at']);
        }

        try {
            return $query->latest()->take($limit)->get();
        } catch (\Illuminate\Database\QueryException $e) {
            //Todo, return with proper JSON error.
            dd($e);
        }
    }
}
