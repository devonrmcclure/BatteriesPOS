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
                   	'name' => 'Batteries',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
                    'name' => 'Cellphone Accessories',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
                    'name' => 'Garment Care',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);        

        DB::table('categories')->insert([
                    'name' => 'Lights',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
                    'name' => 'Miscellaneous',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
                    'name' => 'Service & Repair',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
                    'name' => 'Small Appliances',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
                    'name' => 'Timepieces',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
                    'name' => 'Vacuums',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Battery subcategories ID: 1
            DB::table('categories')->insert([
                    'name' => 'Button Cell Batteries',
                    'parent_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Camera Batteries',
                    'parent_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Cell Phone Batteries',
                    'parent_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Cordless Phone Batteries',
                    'parent_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Laptop Batteries',
                    'parent_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Miscellaneous Batteries',
                    'parent_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Rechargeable Batteries',
                    'parent_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            // Rechargeable Batteries ID: 16
                DB::table('categories')->insert([
                    'name' => 'Lithium Rechargeable Batteries',
                    'parent_id' => 16,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'NiMH Rechargeable Batteries',
                        'parent_id' => 16,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'NiCD Rechargeable Batteries',
                        'parent_id' => 16,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

            DB::table('categories')->insert([
                    'name' => 'SLA Batteries',
                    'parent_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        // Cellphone accessories ID: 2
            DB::table('categories')->insert([
                    'name' => 'Cellphone Adapters',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Cellphone Cases',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Cellphone Cords',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        // Garment care ID: 3
            DB::table('categories')->insert([
                    'name' => 'Garment Care Accessories',
                    'parent_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Garment Care Irons',
                    'parent_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Garment Care Steamers',
                    'parent_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Miscellaneous Garment Care',
                    'parent_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        // Lights ID: 4
        
            DB::table('categories')->insert([
                    'name' => 'Flashlights',
                    'parent_id' => 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Miscellaneous Lights',
                    'parent_id' => 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        // Miscellaneous ID: 5

            DB::table('categories')->insert([
                    'name' => 'Chargers',
                    'parent_id' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Garage Remotes',
                    'parent_id' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

    }
}
