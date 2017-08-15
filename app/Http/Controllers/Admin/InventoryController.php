<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inventory;
use App\AssociatedSkus;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('admin.inventory.index');
    }

    public function associatedSkus() {
        return view('admin.inventory.associated-skus');
    }

    public function makeAssociatedSkus() {
        echo 'hi';

        // $clock = Inventory::where('description', 'LIKE', '%clock%')->where('sku', '!=', '3424')->where('sku', '!=', '3895')->where('sku', '!=', '3065')->where('sku', '!=', '1703')->where('sku', '!=', '842')->get();

        $buttonCells = Inventory::where('description', 'LIKE', '%micro%')->where('description', 'NOT LIKE', '%-PACK%')->where('description', 'NOT LIKE', '%-PK%')->where('sku', '!=', '141')->where('sku', '!=', '237')->where('sku', '!=', '415')->where('sku', '!=', '558')->where('sku', '!=', '739')->where('sku', '!=', '798')->where('sku', '!=', '897')->where('sku', '!=', '1001')->where('sku', '!=', '1030')->where('sku', '!=', '1113')->where('sku', '!=', '1119')->where('sku', '!=', '1247')->where('sku', '!=', '1395')->where('sku', '!=', '1424')->where('sku', '!=', '1482')->where('sku', '!=', '1538')->where('sku', '!=', '1601')->where('sku', '!=', '1743')->where('sku', '!=', '1777')->where('sku', '!=', '1884')->where('sku', '!=', '2145')->where('sku', '!=', '2172')->where('sku', '!=', '2456')->where('sku', '!=', '2733')->where('sku', '!=', '3232')->where('sku', '!=', '3259')->where('sku', '!=', '3511')->where('sku', '!=', '3726')->get();

        foreach($buttonCells as $item)
        {
            echo $item->sku . ' ' . $item->description . '<br/>';

            // $associatedSku = new AssociatedSkus();
            // $associatedSku->sku = $item->sku;
            // $associatedSku->associated_sku = 2585;
            // $associatedSku->type = 'eco_fee';
            // $associatedSku->multiplyer = 1;
            // $associatedSku->save();
        }


    }
}
