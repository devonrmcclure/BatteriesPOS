<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\RepairOrder;

class RepairOrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {
        return view('repair-orders.index');
    }

    public function show()
    {
        return view('repair-orders.view');
    }
}
