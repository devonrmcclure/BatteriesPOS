<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('staff')->delete();
        
        \DB::table('staff')->insert(array (
            0 => 
            array (
                'id' => 1,
                'location_id' => 1,
                'first_name' => 'Head Office Staff',
                'last_name' => '',
                'address' => NULL,
                'city' => NULL,
                'province' => NULL,
                'country' => NULL,
                'postal_code' => NULL,
                'primary_phone' => '604-930-9889',
                'secondary_phone' => NULL,
                'email' => 'servicecentre@batteriesincluded.ca',
                'rep_code' => 'HO',
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'location_id' => 2,
                'first_name' => 'Richmond Staff',
                'last_name' => '',
                'address' => NULL,
                'city' => NULL,
                'province' => NULL,
                'country' => NULL,
                'postal_code' => NULL,
                'primary_phone' => '604-270-9989',
                'secondary_phone' => NULL,
                'email' => 'richmond@batteriesincluded.ca',
                'rep_code' => 'RM',
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'location_id' => 3,
                'first_name' => 'White Rock Staff',
                'last_name' => '',
                'address' => NULL,
                'city' => NULL,
                'province' => NULL,
                'country' => NULL,
                'postal_code' => NULL,
                'primary_phone' => '604-536-8108',
                'secondary_phone' => NULL,
                'email' => 'whiterock@batteriesincluded.ca',
                'rep_code' => 'WR',
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'location_id' => 6,
                'first_name' => 'Guildford Staff',
                'last_name' => '',
                'address' => NULL,
                'city' => NULL,
                'province' => NULL,
                'country' => NULL,
                'postal_code' => NULL,
                'primary_phone' => '604-930-9889',
                'secondary_phone' => NULL,
                'email' => 'guildford@batteriesincluded.ca',
                'rep_code' => 'GF',
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'location_id' => 6,
                'first_name' => 'Devon',
                'last_name' => 'McClure',
                'address' => '',
                'city' => '',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '778-874-9156',
                'secondary_phone' => '',
                'email' => '',
                'rep_code' => 'DM',
                'created_at' => '2017-08-01 13:11:59',
                'updated_at' => '2017-08-01 13:11:59',
            ),
            5 => 
            array (
                'id' => 6,
                'location_id' => 6,
                'first_name' => 'Joseph',
                'last_name' => 'Kwan',
                'address' => '',
                'city' => '',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '555-555-5555',
                'secondary_phone' => '',
                'email' => '',
                'rep_code' => 'JK',
                'created_at' => '2017-08-01 13:12:16',
                'updated_at' => '2017-08-01 13:12:16',
            ),
            6 => 
            array (
                'id' => 7,
                'location_id' => 6,
                'first_name' => 'Karl',
                'last_name' => '',
                'address' => '',
                'city' => '',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '555-555-5555',
                'secondary_phone' => '',
                'email' => '',
                'rep_code' => 'KS',
                'created_at' => '2017-08-01 13:12:26',
                'updated_at' => '2017-08-01 13:12:26',
            ),
            7 => 
            array (
                'id' => 8,
                'location_id' => 6,
                'first_name' => 'Fei',
                'last_name' => '',
                'address' => '',
                'city' => '',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '555-555-5555',
                'secondary_phone' => '',
                'email' => '',
                'rep_code' => 'FY',
                'created_at' => '2017-08-01 13:12:39',
                'updated_at' => '2017-08-01 13:12:39',
            ),
            8 => 
            array (
                'id' => 9,
                'location_id' => 6,
                'first_name' => 'Frank',
                'last_name' => '',
                'address' => '',
                'city' => '',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '555-555-5555',
                'secondary_phone' => '',
                'email' => '',
                'rep_code' => 'FP',
                'created_at' => '2017-08-01 13:12:47',
                'updated_at' => '2017-08-01 13:12:47',
            ),
        ));
        
        
    }
}
