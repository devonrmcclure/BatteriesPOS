<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PartOrder;

use App\Http\Requests;

class PartOrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('part-orders.index');
    }

    public function show()
    {
        return view('part-orders.view');
    }
}
