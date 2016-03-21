<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('invoices')->insert([
    			'id' => '300000',
    			'location' => 'White Rock',
    			'total_pst' => 0.35,
    			'total_gst' => 0.25,
    			'total' => 5.59,
    			'customer_id' => 2,
    			'payment_method' => 'Cash',
    			'invoice_comment' => 'Batteries are not refundable or exchangable',
    			'gst_number' => 'fdsk;fdksf',
    			'printed' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('invoices')->insert([
    			'id' => '300001',
    			'location' => 'White Rock',
    			'total_pst' => 0.70,
    			'total_gst' => 0.50,
    			'total' => 11.18,
    			'customer_id' => 2,
    			'payment_method' => 'Cash',
    			'invoice_comment' => 'Batteries are not refundable or exchangable',
    			'gst_number' => 'fdsk;fdksf',
    			'printed' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('invoices')->insert([
    			'id' => '600000',
    			'location' => 'Guildford',
    			'total_pst' => 0.35,
    			'total_gst' => 0.25,
    			'total' => 5.59,
    			'customer_id' => 3,
    			'payment_method' => 'Cash',
    			'invoice_comment' => 'Batteries are not refundable or exchangable',
    			'gst_number' => 'fdsk;fdksf',
    			'printed' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

    	DB::table('invoices')->insert([
    			'id' => '600001',
    			'location' => 'Guildford',
    			'total_pst' => 0.70,
    			'total_gst' => 0.50,
    			'total' => 11.18,
    			'customer_id' => 3,
    			'payment_method' => 'Cash',
    			'invoice_comment' => 'Batteries are not refundable or exchangable',
    			'gst_number' => 'fdsk;fdksf',
    			'printed' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);
    }
}
