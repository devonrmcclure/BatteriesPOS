<?php

namespace App\Http\Api\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AssociatedSkus;

class InventoryController extends \App\Http\Api\Controllers\ApiController
{
    protected $model = '\App\Inventory';

    function __construct()
    {
        return parent::__construct();
    }
    
    public function index(Request $request) {
        $inventory = $this->getResults($this->model, $request->all());

        if($inventory->isEmpty())
        {
            return $this->respondNotFound('Inventory does not exist');
        }
        return $this->respond([
            'data' => $inventory,
            'user' => \Auth::guard('api')->user()
        ]);
    }

    public function update(Request $request) {
        $data = $request->all();

        $categoryName = explode(' (', $data['category']);
        $product = \App\Inventory::find($data['sku']);
        $category = \App\Category::where('name', $categoryName[0])->where('parent_id', '!=', NULL)->get();

        $product->category_id = $category[0]->id;
        $product->save();
    }

    public function associatedSkus(Request $request) {
        //dd($request->all());

        $associatedSku = new AssociatedSkus();
        $associatedSku->sku = $request->input('sku');
        $associatedSku->associated_sku = $request->input('associated_sku');
        $associatedSku->type = $request->input('type');
        $associatedSku->multiplyer = $request->input('multiplyer');
        $associatedSku->save();
    }
}
