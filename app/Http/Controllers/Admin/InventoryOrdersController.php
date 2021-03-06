<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InventoryOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('admin.inventory.inventory-orders');
    }

    public function vendor() {
        return view('admin.inventory.vendor');
    }
}
