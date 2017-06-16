<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inventory;
use App\Sale;
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

    public function show($id) {
        return view('inventory.show');
    }

    public function order() {
        return view('inventory.order');
    }

    public function showRequest() {
        return view('inventory.request');
    }

    public function showOrder() {
        return view('inventory.show-order');
    }

    public function history() {
        return view('inventory.history');
    }
}