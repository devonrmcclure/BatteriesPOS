<?php

use Illuminate\Database\Seeder;

class DailyCloseOutsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('daily_close_outs')->delete();
        
        \DB::table('daily_close_outs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cash' => 63.369999999999997,
                'interac' => 53.619999999999997,
                'visa' => 16.780000000000001,
                'mastercard' => 44.759999999999998,
                'other' => 0.0,
                'total' => 178.53,
                'store_id' => 6,
                'created_at' => '2017-08-01 13:26:26',
                'updated_at' => '2017-08-01 13:26:26',
            ),
            1 => 
            array (
                'id' => 2,
                'cash' => 38.350000000000001,
                'interac' => 65.760000000000005,
                'visa' => 35.829999999999998,
                'mastercard' => 90.150000000000006,
                'other' => 0.0,
                'total' => 0.0,
                'store_id' => 6,
                'created_at' => '2017-08-02 13:47:57',
                'updated_at' => '2017-08-02 13:53:13',
            ),
            2 => 
            array (
                'id' => 3,
                'cash' => 40.07,
                'interac' => 17.620000000000001,
                'visa' => 33.560000000000002,
                'mastercard' => 11.18,
                'other' => 0.0,
                'total' => 0.0,
                'store_id' => 6,
                'created_at' => '2017-08-03 14:10:46',
                'updated_at' => '2017-08-03 14:15:00',
            ),
        ));
        
        
    }
}
