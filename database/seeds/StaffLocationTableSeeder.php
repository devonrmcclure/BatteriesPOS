<?php

use Illuminate\Database\Seeder;

class StaffLocationTableSeeder extends Seeder
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
        DB::table('staff_location')->insert([
                   	'staff_id' => 1,
                   	'location_id' => 2
        ]);

        DB::table('staff_location')->insert([
                   	'staff_id' => 2,
                   	'location_id' => 3
        ]);
    }
}
