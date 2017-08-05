<?php

use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('todo')->delete();
        
        \DB::table('todo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'task' => 'Check Email',
                'task_type' => 'daily',
                'location_id' => 2,
                'completed' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'task' => 'Check Voicemail',
                'task_type' => 'daily',
                'location_id' => 2,
                'completed' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'task' => 'Turn On TV',
                'task_type' => 'daily',
                'location_id' => 2,
                'completed' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'task' => 'Clean Cases',
                'task_type' => 'weekly',
                'location_id' => 2,
                'completed' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'task' => 'Dust',
                'task_type' => 'weekly',
                'location_id' => 2,
                'completed' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'task' => 'Take Out Garbage',
                'task_type' => 'weekly',
                'location_id' => 2,
                'completed' => '0000-00-00 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'task' => 'Take Out Recycle',
                'task_type' => 'weekly',
                'location_id' => 2,
                'completed' => '0000-00-00 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'task' => 'Vacuum',
                'task_type' => 'weekly',
                'location_id' => 2,
                'completed' => '0000-00-00 00:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'task' => 'Check Email',
                'task_type' => 'daily',
                'location_id' => 3,
                'completed' => '0000-00-00 00:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'task' => 'Check Voicemail',
                'task_type' => 'daily',
                'location_id' => 3,
                'completed' => '0000-00-00 00:00:00',
            ),
            10 => 
            array (
                'id' => 11,
                'task' => 'Turn On TV',
                'task_type' => 'daily',
                'location_id' => 3,
                'completed' => '0000-00-00 00:00:00',
            ),
            11 => 
            array (
                'id' => 12,
                'task' => 'Clean Cases',
                'task_type' => 'weekly',
                'location_id' => 3,
                'completed' => '0000-00-00 00:00:00',
            ),
            12 => 
            array (
                'id' => 13,
                'task' => 'Dust',
                'task_type' => 'weekly',
                'location_id' => 3,
                'completed' => '0000-00-00 00:00:00',
            ),
            13 => 
            array (
                'id' => 14,
                'task' => 'Take Out Garbage',
                'task_type' => 'weekly',
                'location_id' => 3,
                'completed' => '0000-00-00 00:00:00',
            ),
            14 => 
            array (
                'id' => 15,
                'task' => 'Take Out Recycle',
                'task_type' => 'weekly',
                'location_id' => 3,
                'completed' => '0000-00-00 00:00:00',
            ),
            15 => 
            array (
                'id' => 16,
                'task' => 'Vacuum',
                'task_type' => 'weekly',
                'location_id' => 3,
                'completed' => '0000-00-00 00:00:00',
            ),
            16 => 
            array (
                'id' => 17,
                'task' => 'Check Email',
                'task_type' => 'daily',
                'location_id' => 6,
                'completed' => '0000-00-00 00:00:00',
            ),
            17 => 
            array (
                'id' => 18,
                'task' => 'Check Voicemail',
                'task_type' => 'daily',
                'location_id' => 6,
                'completed' => '0000-00-00 00:00:00',
            ),
            18 => 
            array (
                'id' => 19,
                'task' => 'Turn On TV',
                'task_type' => 'daily',
                'location_id' => 6,
                'completed' => '0000-00-00 00:00:00',
            ),
            19 => 
            array (
                'id' => 20,
                'task' => 'Clean Cases',
                'task_type' => 'weekly',
                'location_id' => 6,
                'completed' => '0000-00-00 00:00:00',
            ),
            20 => 
            array (
                'id' => 21,
                'task' => 'Dust',
                'task_type' => 'weekly',
                'location_id' => 6,
                'completed' => '0000-00-00 00:00:00',
            ),
            21 => 
            array (
                'id' => 22,
                'task' => 'Take Out Garbage',
                'task_type' => 'weekly',
                'location_id' => 6,
                'completed' => '0000-00-00 00:00:00',
            ),
            22 => 
            array (
                'id' => 23,
                'task' => 'Take Out Recycle',
                'task_type' => 'weekly',
                'location_id' => 6,
                'completed' => '0000-00-00 00:00:00',
            ),
            23 => 
            array (
                'id' => 24,
                'task' => 'Vacuum',
                'task_type' => 'weekly',
                'location_id' => 6,
                'completed' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}
