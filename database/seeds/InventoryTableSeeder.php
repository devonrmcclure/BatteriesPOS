<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory')->insert([
        		'sku' => 483,
        		'description' => 'CR2032 Button Cell Battery',
        		'category_id' => 1,
        		'ep_cost_vendor' => 0.00,
        		'ep_cost_landed' => 0.00,
        		'ep_cost_wholesale' => 0.00,
        		'ep_cost_ad' => 0.00,
        		'unit_cost' => 4.99,
        		'unit_price' => 4.99,
        		'pst' => 1,
        		'gst' => 1,
        		'supplier' => 'Awesome Batteries INC',
        		'brand' => 'Maxel',
        		'model' => 'CR2032',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('inventory')->insert([
        		'sku' => 485,
        		'description' => 'CR2025 Button Cell Battery',
        		'category_id' => 1,
        		'ep_cost_vendor' => 0.00,
        		'ep_cost_landed' => 0.00,
        		'ep_cost_wholesale' => 0.00,
        		'ep_cost_ad' => 0.00,
        		'unit_cost' => 4.99,
        		'unit_price' => 4.99,
        		'pst' => 1,
        		'gst' => 1,
        		'supplier' => 'Awesome Batteries INC',
        		'brand' => 'Maxel',
        		'model' => 'CR2025',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('inventory')->insert([
        		'sku' => 972,
        		'description' => '12v5ah SLA Home Alarm Battery',
        		'category_id' => 2,
        		'ep_cost_vendor' => 0.00,
        		'ep_cost_landed' => 0.00,
        		'ep_cost_wholesale' => 0.00,
        		'ep_cost_ad' => 0.00,
        		'unit_cost' => 30.98,
        		'unit_price' => 30.98,
        		'pst' => 1,
        		'gst' => 1,
        		'supplier' => 'Awesome Batteries INC',
        		'brand' => 'Infinity',
        		'model' => 'IT5-12-F1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
