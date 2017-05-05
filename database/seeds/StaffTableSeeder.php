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
    	    MR: 8
    	*/

      DB::table('staff')->insert([
              'location_id' => 1,
              'first_name' => 'Head Office Staff',
              'primary_phone' => '604-930-9889',
              'email' => 'servicecentre@batteriesincluded.ca',
              'rep_code' => 'HO',
              'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

    	DB::table('staff')->insert([
                  'location_id' => 2,
    	           	'first_name' => 'Richmond Staff',
    	           	'primary_phone' => '604-270-9989',
    	           	'email' => 'richmond@batteriesincluded.ca',
    	           	'rep_code' => 'RM',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

      DB::table('staff')->insert([
                  'location_id' => 3,
                 	'first_name' => 'White Rock Staff',
                 	'primary_phone' => '604-536-8108',
                 	'email' => 'whiterock@batteriesincluded.ca',
                 	'rep_code' => 'WR',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('staff')->insert([
              'location_id' => 6,
              'first_name' => 'Guildford Staff',
              'primary_phone' => '604-930-9889',
              'email' => 'guildford@batteriesincluded.ca',
              'rep_code' => 'GF',
              'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('staff')->insert([
              'location_id' => 8,
              'first_name' => 'Maple Ridge Staff',
              'primary_phone' => '604-466-8378',
              'email' => 'mapleridge@batteriesincluded.ca',
              'rep_code' => 'MR',
              'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
    }
}
