<?php

use Illuminate\Database\Seeder;

class PartOrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('part_orders')->delete();
        
        \DB::table('part_orders')->insert(array (
            0 => 
            array (
                'id' => 66758,
                'invoice_id' => 49835,
                'referred_by' => 'Oster',
                'make' => 'Battery',
                'item' => 'Battery Pack',
                'model' => 'CS-ACB320SL',
                'part_number' => 'CS-ACB320SL',
                'deposit' => 50.0,
                'customer_id' => 10,
                'staff_id' => 1,
                'location_id' => 6,
                'pick_up_location' => 'Guildford',
                'notes' => '',
                'to_head_office' => '2017-08-25 13:25:33',
                'from_head_office' => '2017-08-25 13:25:33',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'created_at' => '2017-08-05 17:26:31',
                'updated_at' => '2017-08-25 13:25:33',
            ),
            1 => 
            array (
                'id' => 66759,
                'invoice_id' => 1,
                'referred_by' => 'none',
                'make' => 'K/Aid',
                'item' => 'StandMixer Motor',
                'model' => '4KSM6573',
                'part_number' => 'W10517938',
                'deposit' => 0.0,
                'customer_id' => 3,
                'staff_id' => 1,
                'location_id' => 6,
                'pick_up_location' => 'Guildford',
            'notes' => 'RO#:625082 (07-29-17) Quote $189 for part and labor',
                'to_head_office' => '2017-08-25 13:25:35',
                'from_head_office' => '2017-08-25 13:25:35',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'created_at' => '2017-08-08 17:45:38',
                'updated_at' => '2017-08-25 13:25:35',
            ),
            2 => 
            array (
                'id' => 66760,
                'invoice_id' => 49900,
                'referred_by' => 'none',
                'make' => 'Samsung',
                'item' => 'Phone',
                'model' => 'GT-S5570',
                'part_number' => 'CP-SMS583HL',
                'deposit' => 30.0,
                'customer_id' => 15,
                'staff_id' => 1,
                'location_id' => 6,
                'pick_up_location' => 'Guildford',
                'notes' => 'CS#: CP-SMS583HL OEM#: EB494353VU',
                'to_head_office' => '2017-08-25 13:24:42',
                'from_head_office' => '2017-08-25 13:24:39',
                'customer_pick_up' => '2017-08-25 13:24:42',
                'customer_called' => '2017-08-25 13:24:41',
                'created_at' => '2017-08-11 13:56:03',
                'updated_at' => '2017-08-25 13:24:42',
            ),
        ));
        
        
    }
}
