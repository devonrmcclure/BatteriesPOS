<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                   	'name' => 'Button Cell Batteries',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
                   	'name' => 'Home Alarm Batteries',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
