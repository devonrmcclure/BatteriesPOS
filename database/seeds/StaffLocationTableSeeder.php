<?php

use Illuminate\Database\Seeder;

class StaffLocationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('staff_location')->delete();
        
        \DB::table('staff_location')->insert(array (
            0 => 
            array (
                'id' => 1,
                'staff_id' => 1,
                'location_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'staff_id' => 2,
                'location_id' => 3,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
