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
    	           	'admin' => 1,
    	           	'password' => bcrypt('3218ho'),
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);

        DB::table('users')->insert([
        			'id' => 2,
                   	'name' => 'Richmond',
                   	'email' => 'richmond@batteriesincluded.ca',
                   	'location_code' => 'RM',
                   	'admin' => 0,
                   	'password' => bcrypt('3218rm'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
        			'id' => 3,
                   	'name' => 'White Rock',
                   	'email' => 'whiterock@batteriesincluded.ca',
                   	'location_code' => 'WR',
                   	'admin' => 0,
                   	'password' => bcrypt('3218wr'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
        			'id' => 6,
                   	'name' => 'Guildford',
                   	'email' => 'guildford@batteriesincluded.ca',
                   	'location_code' => 'GF',
                   	'admin' => 0,
                   	'password' => bcrypt('3218gf'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
        			'id' => 7,
                   	'name' => 'Nanaimo',
                   	'email' => 'nanaimo@batteriesincluded.ca',
                   	'location_code' => 'NM',
                   	'admin' => 0,
                   	'password' => bcrypt('3218nm'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
        			'id' => 8,
                   	'name' => 'Maple Ridge',
                   	'email' => 'mapleridge@batteriesincluded.ca',
                   	'location_code' => 'MR',
                   	'admin' => 0,
                   	'password' => bcrypt('3218MR'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
