<?php

use Illuminate\Database\Seeder;

class StockOrderHistoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('stock_order_history')->delete();
        
        
        
    }
}
