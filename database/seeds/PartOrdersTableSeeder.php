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
                'to_head_office' => '2017-08-05 13:25:33',
                'from_head_office' => '2017-08-25 13:25:33',
                'customer_pick_up' => '2017-08-25 00:00:00',
                'customer_called' => '2017-08-25 00:00:00',
                'updated_at' => '2017-08-25 13:25:33',
                'created_at' => '2017-08-05 17:26:31',
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
                'to_head_office' => '2017-08-08 13:25:35',
                'from_head_office' => '2017-08-25 13:25:35',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'updated_at' => '2017-08-25 13:25:35',
                'created_at' => '2017-08-08 17:45:38',
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
                'to_head_office' => '2017-08-11 13:24:42',
                'from_head_office' => '2017-08-27 13:24:39',
                'customer_pick_up' => '2017-08-27 13:24:42',
                'customer_called' => '2017-08-27 13:24:41',
                'updated_at' => '2017-08-25 13:24:42',
                'created_at' => '2017-08-11 13:56:03',
            ),
            3 => 
            array (
                'id' => 66761,
                'invoice_id' => 49948,
                'referred_by' => 'none',
                'make' => 'Krups',
                'item' => 'Espresso Machine',
                'model' => 'XP6010',
                'part_number' => 'MS622961',
                'deposit' => 28.98,
                'customer_id' => 31,
                'staff_id' => 7,
                'location_id' => 6,
                'pick_up_location' => 'Guildford',
                'notes' => '',
                'to_head_office' => '2017-08-15 14:48:57',
                'from_head_office' => '0000-00-00 00:00:00',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'updated_at' => '2017-08-15 14:48:57',
                'created_at' => '2017-08-15 14:48:57',
            ),
            4 => 
            array (
                'id' => 66762,
                'invoice_id' => 1,
                'referred_by' => 'none',
                'make' => 'n/a',
                'item' => 'planetary gear',
                'model' => 'n/a',
                'part_number' => 'WP9708176',
                'deposit' => 0.0,
                'customer_id' => 3,
                'staff_id' => 4,
                'location_id' => 6,
                'pick_up_location' => 'Guildford',
                'notes' => 'For RO 3044605',
                'to_head_office' => '2017-08-16 14:54:44',
                'from_head_office' => '0000-00-00 00:00:00',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'updated_at' => '2017-08-16 14:54:44',
                'created_at' => '2017-08-16 14:54:44',
            ),
            5 => 
            array (
                'id' => 66763,
                'invoice_id' => 1,
                'referred_by' => 'none',
                'make' => 'nikon',
                'item' => 'battery',
                'model' => 'D5600',
                'part_number' => 'CS-ENEL14A',
                'deposit' => 0.0,
                'customer_id' => 3,
                'staff_id' => 4,
                'location_id' => 6,
                'pick_up_location' => 'Guildford',
                'notes' => 'OEM #: EN-EL14 CS#: CS-ENEL14A',
                'to_head_office' => '2017-08-23 14:58:49',
                'from_head_office' => '0000-00-00 00:00:00',
                'customer_pick_up' => '0000-00-00 00:00:00',
                'customer_called' => '0000-00-00 00:00:00',
                'updated_at' => '2017-08-23 14:58:49',
                'created_at' => '2017-08-23 14:58:49',
            ),
        ));
        
        
    }
}
