<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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

    	DB::table('qoh')->insert([
    			'location_id' => 2,
    			'quantity' => 87,
    			'sku' => 483,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('qoh')->insert([
    			'location_id' => 2,
    			'quantity' => 34,
    			'sku' => 485,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('qoh')->insert([
    			'location_id' => 2,
    			'quantity' => 7,
    			'sku' => 972,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('qoh')->insert([
    			'location_id' => 3,
    			'quantity' => 100,
    			'sku' => 483,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('qoh')->insert([
    			'location_id' => 3,
    			'quantity' => 100,
    			'sku' => 485,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('qoh')->insert([
    			'location_id' => 3,
    			'quantity' => 5,
    			'sku' => 972,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('qoh')->insert([
    			'location_id' => 6,
    			'quantity' => 15,
    			'sku' => 483,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('qoh')->insert([
    			'location_id' => 6,
    			'quantity' => 15,
    			'sku' => 485,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('qoh')->insert([
    			'location_id' => 6,
    			'quantity' => 4,
    			'sku' => 972,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    }
}
