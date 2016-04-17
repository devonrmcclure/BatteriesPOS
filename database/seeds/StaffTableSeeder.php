<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StaffTableSeeder extends Seeder
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

    	DB::table('staff')->insert([
                  'location_id' => 2,
    	           	'first_name' => 'Richmond Staff',
    	           	'primary_phone' => '778-874-9156',
    	           	'email' => 'richmond@batteriesincluded.ca',
    	           	'rep_code' => 'RM',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

        DB::table('staff')->insert([
                    'location_id' => 3,
                   	'first_name' => 'Devon',
                    'last_name' => 'McClure',
                   	'address' => '15826 McBeth Rd',
                   	'city' => 'Surrey',
                   	'province' => 'British Columbia',
                   	'country' => 'Canada',
                   	'postal_code' => 'V4A 5X3',
                   	'primary_phone' => '778-874-9156',
                   	'email' => 'devon.r.mcclure@gmail.com',
                   	'rep_code' => 'DM',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
