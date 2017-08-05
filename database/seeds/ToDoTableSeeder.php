<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ToDoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo')->insert([

                'task' => 'Check Email',
                'task_type' => 'daily',
                'location_id' => '2',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Check Voicemail',
                'task_type' => 'daily',
                'location_id' => '2',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Turn On TV',
                'task_type' => 'daily',
                'location_id' => '2',
                'completed' => '0000-00-00 00:00:00',
        ]);

        //END RICHMOND DAILY TODOS

        DB::table('todo')->insert([

                'task' => 'Clean Cases',
                'task_type' => 'weekly',
                'location_id' => '2',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

            'task' => 'Dust',
            'task_type' => 'weekly',
            'location_id' => '2',
            'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Take Out Garbage',
                'task_type' => 'weekly',
                'location_id' => '2',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Take Out Recycle',
                'task_type' => 'weekly',
                'location_id' => '2',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Vacuum',
                'task_type' => 'weekly',
                'location_id' => '2',
                'completed' => '0000-00-00 00:00:00',
        ]);

        //END RICHMOND WEEKLY TODOS

        DB::table('todo')->insert([

                'task' => 'Check Email',
                'task_type' => 'daily',
                'location_id' => '3',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Check Voicemail',
                'task_type' => 'daily',
                'location_id' => '3',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Turn On TV',
                'task_type' => 'daily',
                'location_id' => '3',
                'completed' => '0000-00-00 00:00:00',
        ]);

        //END WHITEROCK DAILY TODOS

        DB::table('todo')->insert([

                'task' => 'Clean Cases',
                'task_type' => 'weekly',
                'location_id' => '3',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

            'task' => 'Dust',
            'task_type' => 'weekly',
            'location_id' => '3',
            'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Take Out Garbage',
                'task_type' => 'weekly',
                'location_id' => '3',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Take Out Recycle',
                'task_type' => 'weekly',
                'location_id' => '3',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Vacuum',
                'task_type' => 'weekly',
                'location_id' => '3',
                'completed' => '0000-00-00 00:00:00',
        ]);

        //END WHITEROCK WEEKLY TODOS

        DB::table('todo')->insert([

                'task' => 'Check Email',
                'task_type' => 'daily',
                'location_id' => '6',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Check Voicemail',
                'task_type' => 'daily',
                'location_id' => '6',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Turn On TV',
                'task_type' => 'daily',
                'location_id' => '6',
                'completed' => '0000-00-00 00:00:00',
        ]);

        //END GUILDFORD DAILY TODOS

        DB::table('todo')->insert([

                'task' => 'Clean Cases',
                'task_type' => 'weekly',
                'location_id' => '6',
                'completed' => '0000-00-00 00:00:00',
        ]);
        
        DB::table('todo')->insert([

            'task' => 'Dust',
            'task_type' => 'weekly',
            'location_id' => '6',
            'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Take Out Garbage',
                'task_type' => 'weekly',
                'location_id' => '6',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Take Out Recycle',
                'task_type' => 'weekly',
                'location_id' => '6',
                'completed' => '0000-00-00 00:00:00',
        ]);

        DB::table('todo')->insert([

                'task' => 'Vacuum',
                'task_type' => 'weekly',
                'location_id' => '6',
                'completed' => '0000-00-00 00:00:00',
        ]);
    }
}
