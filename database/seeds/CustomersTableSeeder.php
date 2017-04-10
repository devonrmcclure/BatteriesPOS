<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/* Location codes:
    	    HO: 1
    	    RM: 2
    	    WR: 3
    	    GF: 6
    	    NM: 7
    	    MR: 8
    	*/
        DB::table('customers')->insert([
                   	'first_name' => 'Richmond Customer',
                   	'company' => 'Batteries Included',
                   	'address' => '5300 No 3 Rd',
                   	'city' => 'Richmond',
                   	'province' => 'British Columbia',
                   	'country' => 'Canada',
                   	'postal_code' => 'V6X 2C7',
                   	'primary_phone' => '604-270-9989',
                   	'email' => 'richmond@batteriesincluded.ca',
                   	'location_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('customers')->insert([
                   	'first_name' => 'White Rock Customer',
                   	'company' => 'Batteries Included',
                   	'address' => '1711 152nd Street',
                   	'city' => 'Surrey',
                   	'province' => 'British Columbia',
                   	'country' => 'Canada',
                   	'postal_code' => 'V4A 4N3',
                   	'primary_phone' => '604-536-8108',
                   	'email' => 'whiterock@batteriesincluded.ca',
                   	'location_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('customers')->insert([
                   	'first_name' => 'Guildford Customer',
                   	'company' => 'Batteries Included',
                   	'address' => '1026 152nd Street',
                   	'city' => 'Surrey',
                   	'province' => 'British Columbia',
                   	'country' => 'Canada',
                   	'postal_code' => 'V3R 6N7',
                   	'primary_phone' => '604-930-9889',
                   	'email' => 'guildford@batteriesincluded.ca',
                   	'location_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('customers')->insert([
                   	'first_name' => 'Maple Ridge Customer',
                   	'company' => 'Batteries Included',
                   	'address' => '#500 22709 Lougheed Highway',
                   	'city' => 'Maple Ridge',
                   	'province' => 'British Columbia',
                   	'country' => 'Canada',
                   	'postal_code' => 'V2X 0T5',
                   	'primary_phone' => '604-466-8378',
                   	'email' => 'mapleridge@batteriesincluded.ca',
                   	'location_id' => 8,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
