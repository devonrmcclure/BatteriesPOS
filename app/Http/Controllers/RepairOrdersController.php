<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Purchase;
use App\Inventory;
use App\VendorInvoice;

class RepairOrdersController extends Controller
{

    public function index()
    {
        return view('repair-orders.index');
    }
}
