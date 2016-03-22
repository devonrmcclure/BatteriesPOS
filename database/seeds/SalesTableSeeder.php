<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
        		'invoice_id' => 300000,
        		'sku' => 483,
        		'description' => 'CR2032 Button Cell Battery',
        		'category' => 'Button Cell Batteries',
        		'quantity' => 1,
        		'price' => 4.99,
        		'discount' => 0.00,
        		'extended' => 4.99,
        		'pst' => 0.35,
        		'gst' => 0.25,
        		'total' => 5.59,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('sales')->insert([
        		'invoice_id' => 300001,
        		'sku' => 485,
        		'description' => 'CR2025 Button Cell Battery',
        		'category' => 'Button Cell Batteries',
        		'quantity' => 2,
        		'price' => 4.99,
        		'discount' => 0.00,
        		'extended' => 9.98,
        		'pst' => 0.70,
        		'gst' => 0.50,
        		'total' => 11.18,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('sales')->insert([
        		'invoice_id' => 600000,
        		'sku' => 483,
        		'description' => 'CR2032 Button Cell Battery',
        		'category' => 'Button Cell Batteries',
        		'quantity' => 1,
        		'price' => 4.99,
        		'discount' => 0.00,
        		'extended' => 4.99,
        		'pst' => 0.35,
        		'gst' => 0.25,
        		'total' => 5.59,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('sales')->insert([
        		'invoice_id' => 600001,
        		'sku' => 483,
        		'description' => 'CR2032 Button Cell Battery',
        		'category' => 'Button Cell Batteries',
        		'quantity' => 2,
        		'price' => 4.99,
        		'discount' => 0.00,
        		'extended' => 9.98,
        		'pst' => 0.70,
        		'gst' => 0.50,
        		'total' => 11.18,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
