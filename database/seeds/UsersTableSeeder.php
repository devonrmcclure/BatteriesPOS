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
    				'id' => 1,
    	           	'name' => 'Head Office',
    	           	'email' => 'servicecentre@batteriesincluded.ca',
    	           	'location_code' => 'HO',
                  'phone_number' => '604-930-9889',
    	           	'admin' => 1,
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
                    'api_token' => 'token',
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
                   	'password' => bcrypt('3218gf'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
        			'id' => 7,
                   	'name' => 'Nanaimo',
                   	'email' => 'nanaimo@batteriesincluded.ca',
                   	'location_code' => 'NM',
                    'phone_number' => '250-756-2838',
                   	'admin' => 0,
                   	'password' => bcrypt('3218nm'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
        			'id' => 8,
                   	'name' => 'Maple Ridge',
                   	'email' => 'mapleridge@batteriesincluded.ca',
                   	'location_code' => 'MR',
                    'phone_number' => "604-466-8378",
                   	'admin' => 0,
                   	'password' => bcrypt('3218MR'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
