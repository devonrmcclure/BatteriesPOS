<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Richmond Customer',
                'last_name' => NULL,
                'company' => 'Batteries Included',
                'address' => '5300 No 3 Rd',
                'city' => 'Richmond',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => 'V6X 2C7',
                'primary_phone' => '604-270-9989',
                'secondary_phone' => NULL,
                'email' => 'richmond@batteriesincluded.ca',
                'comments' => NULL,
                'store_credit' => NULL,
                'location_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'first_name' => 'White Rock Customer',
                'last_name' => NULL,
                'company' => 'Batteries Included',
                'address' => '1711 152nd Street',
                'city' => 'Surrey',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => 'V4A 4N3',
                'primary_phone' => '604-536-8108',
                'secondary_phone' => NULL,
                'email' => 'whiterock@batteriesincluded.ca',
                'comments' => NULL,
                'store_credit' => NULL,
                'location_id' => 3,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'first_name' => 'Guildford Customer',
                'last_name' => NULL,
                'company' => 'Batteries Included',
                'address' => 'Unit 101J, 15277 - 100th Ave',
                'city' => 'Surrey',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => 'V3R 8X2',
                'primary_phone' => '604-930-9889',
                'secondary_phone' => NULL,
                'email' => 'guildford@batteriesincluded.ca',
                'comments' => NULL,
                'store_credit' => NULL,
                'location_id' => 6,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => '2017-08-04 15:49:07',
            ),
            3 => 
            array (
                'id' => 4,
                'first_name' => 'Ronnie',
                'last_name' => 'Dizom',
                'company' => '',
                'address' => '',
                'city' => 'Surrey',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '604-616-3576',
                'secondary_phone' => '',
                'email' => '',
                'comments' => '',
                'store_credit' => 0,
                'location_id' => 6,
                'created_at' => '2017-08-01 14:28:31',
                'updated_at' => '2017-08-01 14:28:31',
            ),
            4 => 
            array (
                'id' => 5,
                'first_name' => 'Phuong Nyugen',
                'last_name' => '',
                'company' => '',
                'address' => '',
                'city' => 'Surrey',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '604-722-3829',
                'secondary_phone' => '',
                'email' => '',
                'comments' => '',
                'store_credit' => 0,
                'location_id' => 6,
                'created_at' => '2017-08-02 14:33:32',
                'updated_at' => '2017-08-02 14:33:32',
            ),
            5 => 
            array (
                'id' => 6,
                'first_name' => 'Jenny Hassan',
                'last_name' => '',
                'company' => '',
                'address' => '',
                'city' => 'Surrey',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '604-996-6964',
                'secondary_phone' => '',
                'email' => '',
                'comments' => '',
                'store_credit' => 0,
                'location_id' => 6,
                'created_at' => '2017-08-02 14:47:19',
                'updated_at' => '2017-08-02 14:47:19',
            ),
            6 => 
            array (
                'id' => 7,
                'first_name' => 'Peter Jackson',
                'last_name' => '',
                'company' => '',
                'address' => '',
                'city' => 'Langley',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '604-888-9459',
                'secondary_phone' => '',
                'email' => '',
                'comments' => '',
                'store_credit' => 0,
                'location_id' => 6,
                'created_at' => '2017-08-03 14:49:37',
                'updated_at' => '2017-08-03 14:49:37',
            ),
            7 => 
            array (
                'id' => 8,
                'first_name' => 'Liza',
                'last_name' => '',
                'company' => '',
                'address' => '',
                'city' => 'Surrey',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '778-908-7804',
                'secondary_phone' => '',
                'email' => '',
                'comments' => '',
                'store_credit' => 0,
                'location_id' => 6,
                'created_at' => '2017-08-03 14:51:19',
                'updated_at' => '2017-08-03 14:51:19',
            ),
            8 => 
            array (
                'id' => 9,
                'first_name' => 'Kim',
                'last_name' => '',
                'company' => '',
                'address' => '',
                'city' => '',
                'province' => 'British Columbia',
                'country' => 'Canada',
                'postal_code' => '',
                'primary_phone' => '778-394-7426',
                'secondary_phone' => '',
                'email' => '',
                'comments' => '',
                'store_credit' => 0,
                'location_id' => 6,
                'created_at' => '2017-08-04 14:56:02',
                'updated_at' => '2017-08-04 14:56:02',
            ),
        ));
        
        
    }
}
