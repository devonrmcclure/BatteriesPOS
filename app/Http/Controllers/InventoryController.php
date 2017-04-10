<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inventory;
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
        $product = Inventory::where('sku', $id)->with('qoh')->first();
        return view('inventory.show')->with('product', $product);
    }
}