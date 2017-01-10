<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function __construct()
    {
        // TODO: Also check if user is admin.
        $this->middleware('auth');
    }
    
    public function index() {
        return view('admin.inventory.index');
    }
}
