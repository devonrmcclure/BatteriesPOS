<?php

use Illuminate\Database\Seeder;

class TransferHistoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transfer_history')->delete();
        
        
        
    }
}
