<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Inventory;
use App\User;

class QOHTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	/* Location codes:
    	    HO: 1
    	    RM: 2
    	    WR: 3
    	    GF: 6
    	    NM: 7
    	    MR: 8
    	*/

        $locations = User::all();
        $inventory = Inventory::all();

        foreach($locations as $location)
        {
            foreach($inventory as $product)
            {
                DB::table('qoh')->insert([
                    'location_id' => $location->id,
                    'sku' => $product->sku,
                    'quantity' => 0,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }

    }
}
