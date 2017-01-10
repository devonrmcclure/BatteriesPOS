<?php

namespace App\Http\Api\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends \App\Http\Api\Controllers\ApiController
{
    protected $model = '\App\Category';

    function __construct()
    {
        return parent::__construct();
    }
    
    public function index(Request $request) {
        $categories = $this->getResults($this->model, $request->all());

        if($categories->isEmpty())
        {
            return $this->respondNotFound('Category does not exist');
        }
        return $this->respond([
            'data' => $categories,
            'user' => \Auth::guard('api')->user()
        ]);
    }
}
