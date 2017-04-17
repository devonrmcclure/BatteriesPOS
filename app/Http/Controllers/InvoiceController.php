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

class InvoiceController extends Controller
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
        //showrecent invoices.
        $invoices = Invoice::orderBy('created_at', 'desc')->take(5)->get();
        return view('invoice.index')->with('invoices', $invoices);
    }

    public function show() 
    {
        return view('invoice.show');
    }
}
