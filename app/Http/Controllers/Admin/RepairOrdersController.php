<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RepairOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('admin.repair-orders.index');
    }

    public function show($id) {
        return view('admin.repair-orders.show')->with('id', $id);
    }
}
