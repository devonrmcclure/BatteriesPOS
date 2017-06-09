<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;
use App\Inventory;
use App\StockOrderProducts;
use App\StockOrderHistory;
use App\Qoh;
use App\User;

use Carbon\Carbon;

use Auth;

class StockOrderController extends ApiController
{
    //Declare the model we are working on
    protected $model = '\App\StockOrderHistory';

    function __construct()
    {
        return parent::__construct();
    }

    public function index(Request $request)
    {

        $sale = $this->getResults($this->model, $request->all());

        if($sale->isEmpty())
        {
            return $this->respondNotFound('Sale does not exist');
        }

        return $this->respond([
            'data' => $sale,
            'user' => \Auth::guard('api')->user()
        ]);
    }

    public function store(Request $request)
    {   
       
    }

    public function new(Request $request) 
    {

        //dd($request->all());

        //create order number
        //get requesting id
        $orderFromID = User::where('location_code', $request->input('order_from'))->first();

        $orderNumber = $this->createOrderNumber($request->input('ordering_location'), $request->input('order_from'));

        $order = new StockOrderHistory();

        $order->order_number = $orderNumber;

        $order->requesting_location = Auth::user()->id;
        $order->requesting_from_location = $orderFromID->id;

        $order->status = 'Unordered';

        $order->date_ordered = null;
        $order->date_in_transit = null;
        $order->date_received = null;

        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();

        $order->save();

        return $orderNumber;
    }

    public function addProduct(Request $request) 
    {
       

        //get description
        $product = Inventory::find($request->input('sku'));
        //add product to order.

        $stockProduct = new StockOrderProducts();

        $stockProduct->order_id = $request->input('order');
        $stockProduct->sku = $request->input('sku');
        $stockProduct->description = $product->description;
        $stockProduct->quantity_ordered = $request->input('qty');
        $stockProduct->save();

    }

    private function createOrderNumber(String $orderingLocation, String $orderFrom)
    {
        //Check if an order exists with WR-01-HO
        $exists = StockOrderHistory::orderBy('order_number', 'desc')->where('order_number', 'like', $orderingLocation . '%')->first();

        $orderNumber = '';

        if($exists != null)
        {
            $explodedNumber = explode('-', $exists->order_number);

            if($explodedNumber[0] == $orderingLocation && $explodedNumber[2] == $orderFrom)
            {
                $orderNumber = $orderingLocation . '-' . ($explodedNumber[1] + 1) . '-' . $orderFrom;
                return $orderNumber;     
            }

            return $orderingLocation . '-1-' . $orderFrom;
        }

        return $orderingLocation . '-1-' . $orderFrom;
    }

}
