<?php
//Comment
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sale;
use App\Invoice;
use App\Customer;
use App\Inventory;
use Auth;
use App\Staff;

class SalesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.index');
    }

}
