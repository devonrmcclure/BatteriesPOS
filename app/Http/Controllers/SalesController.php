<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sale;
use DB;
use Auth;

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
        /**
         * Calculate stats for the daily sales.
         * -Invoice count (# of unique invoice #s)
         * -Total items sold
         * -Items/invoice
         * -$$ Per invoice
         * -Total sales (pre-tax)
         * -Total sales (post-tax)
         * -Individual for each Method (allow user input for close out.)
         */
        $salesData = DB::table('sales')->where('created_at', '>=', date('Y-m-d'))->where('location', Auth::User()->name)->get();

        $itemsSold = count($salesData);
        $totalSales = 0;
        //Get the total sales
        foreach($salesData as $sale)
        {
            $totalSales += $sale->extended;
        }

        return view('sales', ['itemsSold' => $itemsSold],['totalSales' => $totalSales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
