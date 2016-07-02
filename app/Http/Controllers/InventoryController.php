<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Phone;

use App\Http\Requests;

use App\Customer;
use Auth;


class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
    	return view('inventory.index');
    }
}
