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
            3 => 
            array (
                'id' => 4,
                'cash' => 26.879999999999999,
                'interac' => 72.909999999999997,
                'visa' => 61.68,
                'mastercard' => 30.620000000000001,
                'other' => 0.0,
                'total' => 192.09,
                'store_id' => 6,
                'created_at' => '2017-08-05 15:25:50',
                'updated_at' => '2017-08-05 15:25:56',
            ),
            4 => 
            array (
                'id' => 5,
                'cash' => 56.869999999999997,
                'interac' => 0.0,
                'visa' => 0.0,
                'mastercard' => 164.78999999999999,
                'other' => 0.0,
                'total' => 221.66,
                'store_id' => 6,
                'created_at' => '2017-08-06 16:08:07',
                'updated_at' => '2017-08-06 16:08:07',
            ),
            5 => 
            array (
                'id' => 6,
                'cash' => 76.310000000000002,
                'interac' => 18.579999999999998,
                'visa' => 0.0,
                'mastercard' => 0.0,
                'other' => 0.0,
                'total' => 94.890000000000001,
                'store_id' => 6,
                'created_at' => '2017-08-07 16:14:33',
                'updated_at' => '2017-08-07 16:14:33',
            ),
            6 => 
            array (
                'id' => 7,
                'cash' => 48.780000000000001,
                'interac' => 0.0,
                'visa' => 4.4400000000000004,
                'mastercard' => 40.719999999999999,
                'other' => 0.0,
                'total' => 93.939999999999998,
                'store_id' => 6,
                'created_at' => '2017-08-08 16:33:03',
                'updated_at' => '2017-08-08 16:33:03',
            ),
            7 => 
            array (
                'id' => 8,
                'cash' => 83.739999999999995,
                'interac' => 26.649999999999999,
                'visa' => 0.0,
                'mastercard' => 10.9,
                'other' => 0.0,
                'total' => 121.29000000000001,
                'store_id' => 6,
                'created_at' => '2017-08-09 17:04:29',
                'updated_at' => '2017-08-09 17:04:29',
            ),
            8 => 
            array (
                'id' => 9,
                'cash' => 94.760000000000005,
                'interac' => 12.48,
                'visa' => 0.0,
                'mastercard' => 22.5,
                'other' => 0.0,
                'total' => 129.74000000000001,
                'store_id' => 6,
                'created_at' => '2017-08-10 17:12:28',
                'updated_at' => '2017-08-10 17:12:28',
            ),
            9 => 
            array (
                'id' => 10,
                'cash' => 43.159999999999997,
                'interac' => 46.079999999999998,
                'visa' => 34.840000000000003,
                'mastercard' => 108.29000000000001,
                'other' => 0.0,
                'total' => 232.37,
                'store_id' => 6,
                'created_at' => '2017-08-11 18:31:46',
                'updated_at' => '2017-08-11 18:31:46',
            ),
            10 => 
            array (
                'id' => 11,
                'cash' => 225.66999999999999,
                'interac' => 32.359999999999999,
                'visa' => 64.920000000000002,
                'mastercard' => 30.219999999999999,
                'other' => 0.0,
                'total' => 353.17000000000002,
                'store_id' => 6,
                'created_at' => '2017-08-12 18:03:31',
                'updated_at' => '2017-08-12 18:03:31',
            ),
            11 => 
            array (
                'id' => 12,
                'cash' => 74.530000000000001,
                'interac' => 104.27,
                'visa' => 36.5,
                'mastercard' => 42.380000000000003,
                'other' => 0.0,
                'total' => 257.68000000000001,
                'store_id' => 6,
                'created_at' => '2017-08-13 18:09:57',
                'updated_at' => '2017-08-13 18:09:57',
            ),
            12 => 
            array (
                'id' => 13,
                'cash' => 753.91999999999996,
                'interac' => 0.0,
                'visa' => 142.65000000000001,
                'mastercard' => 56.630000000000003,
                'other' => 0.0,
                'total' => 953.20000000000005,
                'store_id' => 6,
                'created_at' => '2017-08-15 12:27:21',
                'updated_at' => '2017-08-15 12:29:39',
            ),
            13 => 
            array (
                'id' => 14,
                'cash' => 25.16,
                'interac' => 10.5,
                'visa' => 38.109999999999999,
                'mastercard' => -16.780000000000001,
                'other' => 0.0,
                'total' => 56.990000000000002,
                'store_id' => 6,
                'created_at' => '2017-08-16 12:42:58',
                'updated_at' => '2017-08-16 12:42:58',
            ),
            14 => 
            array (
                'id' => 15,
                'cash' => 93.890000000000001,
                'interac' => 32.780000000000001,
                'visa' => 228.55000000000001,
                'mastercard' => 0.0,
                'other' => 0.0,
                'total' => 355.22000000000003,
                'store_id' => 6,
                'created_at' => '2017-08-17 13:00:45',
                'updated_at' => '2017-08-17 13:00:45',
            ),
            15 => 
            array (
                'id' => 16,
                'cash' => 50.5,
                'interac' => 106.59999999999999,
                'visa' => 10.9,
                'mastercard' => 59.280000000000001,
                'other' => 0.0,
                'total' => 227.28,
                'store_id' => 6,
                'created_at' => '2017-08-19 16:10:15',
                'updated_at' => '2017-08-19 16:10:15',
            ),
            16 => 
            array (
                'id' => 17,
                'cash' => 119.23,
                'interac' => 76.159999999999997,
                'visa' => 71.730000000000004,
                'mastercard' => 14.380000000000001,
                'other' => 0.0,
                'total' => 281.5,
                'store_id' => 6,
                'created_at' => '2017-08-20 17:01:48',
                'updated_at' => '2017-08-20 17:01:48',
            ),
            17 => 
            array (
                'id' => 18,
                'cash' => 50.590000000000003,
                'interac' => 16.969999999999999,
                'visa' => 6.7000000000000002,
                'mastercard' => 100.8,
                'other' => 0.0,
                'total' => 175.06,
                'store_id' => 6,
                'created_at' => '2017-08-21 16:56:52',
                'updated_at' => '2017-08-21 16:58:45',
            ),
            18 => 
            array (
                'id' => 19,
                'cash' => 207.47999999999999,
                'interac' => 8.8000000000000007,
                'visa' => 35.350000000000001,
                'mastercard' => 0.0,
                'other' => 0.0,
                'total' => 251.63,
                'store_id' => 6,
                'created_at' => '2017-08-22 17:06:48',
                'updated_at' => '2017-08-22 17:06:48',
            ),
            19 => 
            array (
                'id' => 20,
                'cash' => 30.710000000000001,
                'interac' => 21.379999999999999,
                'visa' => 16.149999999999999,
                'mastercard' => 0.0,
                'other' => 0.0,
                'total' => 68.239999999999995,
                'store_id' => 6,
                'created_at' => '2017-08-23 17:11:15',
                'updated_at' => '2017-08-23 17:11:15',
            ),
            20 => 
            array (
                'id' => 21,
                'cash' => 154.28999999999999,
                'interac' => 34.700000000000003,
                'visa' => 7.3499999999999996,
                'mastercard' => 45.600000000000001,
                'other' => 0.0,
                'total' => 241.94,
                'store_id' => 6,
                'created_at' => '2017-08-24 17:18:42',
                'updated_at' => '2017-08-24 17:18:42',
            ),
        ));
        
        
    }
}
