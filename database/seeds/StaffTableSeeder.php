<?php

use Illuminate\Database\Seeder;

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
    	           	'name' => 'Richmond Staff',
    	           	'primary_phone' => '778-874-9156',
    	           	'email' => 'richmond@batteriesincluded.ca',
    	           	'rep_code' => 'RM'
    	]);

        DB::table('staff')->insert([
                   	'name' => 'Devon McClure',
                   	'address' => '15826 McBeth Rd',
                   	'city' => 'Surrey',
                   	'province' => 'British Columbia',
                   	'country' => 'Canada',
                   	'postal_code' => 'V4A 5X3',
                   	'primary_phone' => '778-874-9156',
                   	'email' => 'devon.r.mcclure@gmail.com',
                   	'rep_code' => 'DM'
        ]);
    }
}
