<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Head Office',
                'email' => 'servicecentre@batteriesincluded.ca',
                'password' => '$2y$10$Q4d0126/RuIdz0MQwUDW0uTiwYGCus5/OeWGMedLPy73kPvxky06G',
                'location_code' => 'HO',
                'gst_number' => '121104442RT0001',
                'pst_number' => '',
                'phone_number' => '604-930-9889',
                'admin' => 1,
                'remember_token' => NULL,
                'api_token' => '$2y$10$YB909e5ttSUdQHmsVRWcxubDZ3iNwmnVDAR9bu2WQ1hR5hoYY9e3.',
                'created_at' => '2017-08-01 13:08:37',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Richmond',
                'email' => 'richmond@batteriesincluded.ca',
                'password' => '$2y$10$N3lBHA.tjkvDiFIfM/HwOegGAQP6CIcgLcGzz.T5Ycsya81OVe9a6',
                'location_code' => 'RM',
                'gst_number' => '121104442RT0001',
                'pst_number' => '',
                'phone_number' => '604-270-9989',
                'admin' => 0,
                'remember_token' => NULL,
                'api_token' => '$2y$10$kX0yO/BN/HWAF2iVwB6viuAwpW6vYyCK43CPr5DUhr2HRZ0K9nK0y',
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'White Rock',
                'email' => 'whiterock@batteriesincluded.ca',
                'password' => '$2y$10$N8nMzYybeb5IBOsdGGx9fuW94DAee7Lg/cg.w2i1ka0jX4Y2RoQt.',
                'location_code' => 'WR',
                'gst_number' => '121104442RT0001',
                'pst_number' => '',
                'phone_number' => '604-536-8108',
                'admin' => 0,
                'remember_token' => NULL,
                'api_token' => '$2y$10$B7FEIcGkHUKXbwdF1EDtR.0EbPVSe/9Fr2VS2qFvkV.sqK0R1sPIe',
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'Guildford',
                'email' => 'guildford@batteriesincluded.ca',
                'password' => '$2y$10$BW0IK83bjtrEJZTWQpQts.YLTUef0AoHydl4/.hqF/JPmSATYtwwu',
                'location_code' => 'GF',
                'gst_number' => '121104442RT0001',
                'pst_number' => '',
                'phone_number' => '604-930-9889',
                'admin' => 0,
                'remember_token' => '6wBdtGHzbVJZYoAHMiiUKuZAAnUu0R1T7eg5TWVpvrDZ25ybkdEuXgFUUOzv',
                'api_token' => '$2y$10$65DMWz2JfNKlXmTewVaZLe8WvFF3cxGFO3CJIH4BrTSmTGHeG4hKK',
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => '2017-08-02 13:36:16',
            ),
            4 => 
            array (
                'id' => 100,
                'name' => 'Vendor',
                'email' => 'vendor',
                'password' => '$2y$10$.hymxPZ/Y0SD6lJFrEbPNeJXFWNQ4qBUlLUYV5uPjudO76biZyIcS',
                'location_code' => 'VO',
                'gst_number' => '',
                'pst_number' => '',
                'phone_number' => '555-555-5555',
                'admin' => 1,
                'remember_token' => NULL,
                'api_token' => '$2y$10$n5tPcDNIOdwqECZSDOcRSukhOeINCLRgnfbOtNAZQ4cjKVV7Q7wVC',
                'created_at' => '2017-08-01 13:08:37',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
