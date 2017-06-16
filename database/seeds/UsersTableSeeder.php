<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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
      DB::table('users')->insert([
          'id' => 100,
              'name' => 'Vendor',
              'email' => 'vendor',
              'location_code' => 'VO',
              'phone_number' => '555-555-5555',
              'admin' => 1,
              'gst_number' => '',
              'api_token' => bcrypt('VO'),
              'password' => bcrypt('3218vo'),
              'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);


    	DB::table('users')->insert([
    				'id' => 1,
    	           	'name' => 'Head Office',
    	           	'email' => 'servicecentre@batteriesincluded.ca',
    	           	'location_code' => 'HO',
                  'phone_number' => '604-930-9889',
    	           	'admin' => 1,
                  'gst_number' => '121104442RT0001',
                  'api_token' => bcrypt('HO'),
    	           	'password' => bcrypt('3218ho'),
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

        DB::table('users')->insert([
        			'id' => 2,
                   	'name' => 'Richmond',
                   	'email' => 'richmond@batteriesincluded.ca',
                   	'location_code' => 'RM',
                    'phone_number' => '604-270-9989',
                   	'admin' => 0,
                    'gst_number' => '121104442RT0001',
                    'api_token' => bcrypt('RM'),
                   	'password' => bcrypt('3218rm'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
        			'id' => 3,
                   	'name' => 'White Rock',
                   	'email' => 'whiterock@batteriesincluded.ca',
                   	'location_code' => 'WR',
                    'phone_number' => '604-536-8108',
                   	'admin' => 0,
                    'gst_number' => '121104442RT0001',
                    'api_token' => bcrypt('WR'),
                   	'password' => bcrypt('3218wr'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
        			'id' => 6,
                   	'name' => 'Guildford',
                   	'email' => 'guildford@batteriesincluded.ca',
                   	'location_code' => 'GF',
                    'phone_number' => '604-930-9889',
                   	'admin' => 0,
                    'gst_number' => '121104442RT0001',
                    'api_token' => bcrypt('GF'),
                   	'password' => bcrypt('3218gf'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
        			'id' => 8,
                   	'name' => 'Maple Ridge',
                   	'email' => 'mapleridge@batteriesincluded.ca',
                   	'location_code' => 'MR',
                    'phone_number' => "604-466-8378",
                   	'admin' => 0,
                    'gst_number' => '121104442RT0001',
                    'api_token' => bcrypt('MR'),
                   	'password' => bcrypt('3218mr'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
