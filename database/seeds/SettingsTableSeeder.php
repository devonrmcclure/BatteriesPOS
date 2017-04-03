<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name' => 'PST',
            'value' => 0.07
        ]);

        DB::table('settings')->insert([
            'name' => 'GST',
            'value' => 0.05
        ]);

        DB::table('settings')->insert([
            'name' => 'max_discount',
            'value' => 0.10
        ]);
    }
}
