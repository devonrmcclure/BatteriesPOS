<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'PST',
                'value' => 0.070000000000000007,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'GST',
                'value' => 0.050000000000000003,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'max_discount',
                'value' => 0.10000000000000001,
            ),
        ));
        
        
    }
}
