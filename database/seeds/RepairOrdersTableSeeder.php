<?php

use Illuminate\Database\Seeder;

class RepairOrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('repair_orders')->delete();
        
        \DB::table('repair_orders')->insert(array (
            0 => 
            array (
                'id' => 625088,
                'referred_by' => 'Oster',
                'customer_id' => 4,
                'call_if_over' => 0,
                'original_receipt' => 1,
                'warranty' => '1',
                'deposit' => 0.0,
                'staff_id' => 1,
            'product' => 'Mantle Clock (Battery Powered)',
                'model' => 'None',
                'type' => '',
                'date_code' => NULL,
                'condition' => 'Used',
                'accessories' => 'none',
                'location_id' => 6,
                'invoice_id' => 0,
                'problem' => 'Not Working
Bad Movement',
                'notes' => '2017-08-03 - Needs new movement. Cost est = $55.00
2017-08-04 - Called customer with est. Customer cancelled the repair. He will p/u in the next few days.',
                'to_head_office' => '2017-08-01 15:21:17',
                'from_head_office' => '0000-00-00 00:00:00',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'created_at' => '2017-08-01 14:29:37',
                'updated_at' => '2017-08-04 15:22:38',
            ),
            1 => 
            array (
                'id' => 625089,
                'referred_by' => 'Oster',
                'customer_id' => 5,
                'call_if_over' => 0,
                'original_receipt' => 1,
                'warranty' => '1',
                'deposit' => 0.0,
                'staff_id' => 1,
                'product' => 'HUELER Ladies Watch',
                'model' => 'n/a',
                'type' => 'Metal band',
                'date_code' => NULL,
                'condition' => 'used',
                'accessories' => 'none',
                'location_id' => 6,
                'invoice_id' => 0,
                'problem' => 'Installed new battery yesterday; ran for a few hours and stopped. 
Battery tested with excellent voltage = 1.57v
Please call with estimate. ',
                'notes' => '',
                'to_head_office' => '2017-08-02 14:38:13',
                'from_head_office' => '0000-00-00 00:00:00',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'created_at' => '2017-08-02 14:34:54',
                'updated_at' => '2017-08-02 14:34:54',
            ),
            2 => 
            array (
                'id' => 625090,
                'referred_by' => 'Oster',
                'customer_id' => 6,
                'call_if_over' => 50,
                'original_receipt' => 1,
                'warranty' => '1',
                'deposit' => 30.0,
                'staff_id' => 1,
                'product' => 'Samsung Cell Phone',
                'model' => 'Note 2',
                'type' => '',
                'date_code' => NULL,
                'condition' => 'Used',
                'accessories' => 'phone',
                'location_id' => 6,
                'invoice_id' => 0,
                'problem' => 'Bad charging port
Quoted $50. ',
                'notes' => '',
                'to_head_office' => '2017-08-02 14:47:54',
                'from_head_office' => '0000-00-00 00:00:00',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'created_at' => '2017-08-02 14:47:54',
                'updated_at' => '2017-08-02 14:47:54',
            ),
            3 => 
            array (
                'id' => 625091,
                'referred_by' => 'Oster',
                'customer_id' => 7,
                'call_if_over' => 0,
                'original_receipt' => 1,
                'warranty' => '1',
                'deposit' => 0.0,
                'staff_id' => 1,
                'product' => 'Watch',
                'model' => 'LeWave',
                'type' => '3357',
                'date_code' => NULL,
            'condition' => 'used (no battery inside)',
                'accessories' => 'none',
                'location_id' => 6,
                'invoice_id' => 0,
                'problem' => 'not working. Have checked with new battery himself.',
                'notes' => '',
                'to_head_office' => '2017-08-03 14:50:33',
                'from_head_office' => '0000-00-00 00:00:00',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'created_at' => '2017-08-03 14:50:33',
                'updated_at' => '2017-08-03 14:50:33',
            ),
            4 => 
            array (
                'id' => 625092,
                'referred_by' => 'Oster',
                'customer_id' => 8,
                'call_if_over' => 0,
                'original_receipt' => 1,
                'warranty' => '1',
                'deposit' => 0.0,
                'staff_id' => 1,
                'product' => 'Guy Laroche Ladies Watch',
                'model' => '468',
                'type' => 'Metal',
                'date_code' => NULL,
                'condition' => 'Used',
                'accessories' => 'watch',
                'location_id' => 6,
                'invoice_id' => 0,
                'problem' => 'Not able to adjust the time; hands not moving.',
                'notes' => '',
                'to_head_office' => '2017-08-03 14:51:56',
                'from_head_office' => '0000-00-00 00:00:00',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'created_at' => '2017-08-03 14:51:56',
                'updated_at' => '2017-08-03 14:51:56',
            ),
            5 => 
            array (
                'id' => 625093,
                'referred_by' => 'Oster',
                'customer_id' => 9,
                'call_if_over' => 0,
                'original_receipt' => 1,
                'warranty' => '1',
                'deposit' => 0.0,
                'staff_id' => 1,
                'product' => 'Seiko Watch',
                'model' => 'n/a',
                'type' => 'metal',
                'date_code' => NULL,
                'condition' => 'used',
                'accessories' => 'watch',
                'location_id' => 6,
                'invoice_id' => 0,
                'problem' => 'Repair watch. Call with price. ',
                'notes' => '',
                'to_head_office' => '2017-08-04 14:56:28',
                'from_head_office' => '0000-00-00 00:00:00',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'created_at' => '2017-08-04 14:56:28',
                'updated_at' => '2017-08-04 14:56:28',
            ),
        ));
        
        
    }
}
