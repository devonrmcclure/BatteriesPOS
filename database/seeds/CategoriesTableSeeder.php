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
                    'name' => 'Uncategorized',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

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
                    'name' => 'Shavers',
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

        // Battery subcategories ID: 2
            DB::table('categories')->insert([
                    'name' => 'Button Cell Batteries',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Camera Batteries',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Cell Phone Batteries',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Cordless Phone Batteries',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Laptop Batteries',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Miscellaneous Batteries',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Rechargeable Batteries',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            // Rechargeable Batteries ID: 17
                DB::table('categories')->insert([
                    'name' => 'Lithium Rechargeable Batteries',
                    'parent_id' => 17,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'NiMH Rechargeable Batteries',
                        'parent_id' => 17,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'NiCD Rechargeable Batteries',
                        'parent_id' => 17,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

            DB::table('categories')->insert([
                    'name' => 'SLA Batteries',
                    'parent_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        // Cellphone accessories ID: 3
            DB::table('categories')->insert([
                    'name' => 'Cellphone Adapters',
                    'parent_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Cellphone Cases',
                    'parent_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Cellphone Cords',
                    'parent_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        // Garment care ID: 4
            DB::table('categories')->insert([
                    'name' => 'Garment Care Accessories',
                    'parent_id' => 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Garment Care Irons',
                    'parent_id' => 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Garment Care Steamers',
                    'parent_id' => 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Miscellaneous Garment Care',
                    'parent_id' => 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        // Lights ID: 5
        
            DB::table('categories')->insert([
                    'name' => 'Flashlights',
                    'parent_id' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Miscellaneous Lights',
                    'parent_id' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        // Miscellaneous ID: 6

            DB::table('categories')->insert([
                    'name' => 'Chargers',
                    'parent_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Garage Remotes',
                    'parent_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Miscellaneous',
                    'parent_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Toys',
                    'parent_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('categories')->insert([
                    'name' => 'Travel',
                    'parent_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            // Travel ID: 35

                DB::table('categories')->insert([
                        'name' => 'Travel Adapters',
                        'parent_id' => 36,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'Travel Converters',
                        'parent_id' => 36,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

        // Service & Repair ID: 7

            DB::table('categories')->insert([
                    'name' => 'In Store Service',
                    'parent_id' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            // In Store Service ID: 39

                DB::table('categories')->insert([
                        'name' => 'Battery Replacement',
                        'parent_id' => 39,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'Soldering',
                        'parent_id' => 39,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'Shaver Repair',
                        'parent_id' => 39,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

            DB::table('categories')->insert([
                    'name' => 'Service Department',
                    'parent_id' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            // Service Department ID: 43

                DB::table('categories')->insert([
                        'name' => 'Battery Packs',
                        'parent_id' => 43,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'Cell Phone Repair',
                        'parent_id' => 43,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'Shaver Repair',
                        'parent_id' => 43,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'Small Appliances',
                        'parent_id' => 43,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                DB::table('categories')->insert([
                        'name' => 'Timepieces',
                        'parent_id' => 43,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

        // Shavers ID: 8
                
                DB::table('categories')->insert([
                        'name' => 'Shaver Accessories',
                        'parent_id' => 8,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                // Shaver Accessories ID: 49

                    DB::table('categories')->insert([
                            'name' => 'Braun',
                            'parent_id' => 49,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                        'name' => 'Miscellaneous',
                        'parent_id' => 49,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                        'name' => 'Phillips',
                        'parent_id' => 49,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);


                DB::table('categories')->insert([
                        'name' => 'Shaver Parts',
                        'parent_id' => 8,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                // Shaver Parts ID: 53
                 
                    DB::table('categories')->insert([
                            'name' => 'Braun',
                            'parent_id' => 53,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Miscellaneous',
                            'parent_id' => 53,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Phillips',
                            'parent_id' => 53,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                // Shaver Units ID: 57

                DB::table('categories')->insert([
                        'name' => 'Shaver Units',
                        'parent_id' => 8,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                    DB::table('categories')->insert([
                            'name' => 'Braun',
                            'parent_id' => 57,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Miscellaneous',
                            'parent_id' => 57,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Phillips',
                            'parent_id' => 57,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);


        // Small Appliances ID: 9
                
                DB::table('categories')->insert([
                        'name' => 'Small Appliance Units',
                        'parent_id' => 9,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                    DB::table('categories')->insert([
                            'name' => 'Oster',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Phillips',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Moulinex',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Krups',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Bionaire',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Braun',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'T-Fal',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Sunbeam',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'KitchenAid',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'FoodSaver',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Salton',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'DeLonghi',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'ProctorSilex',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Hamilton Beach',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Margaritaville',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Cuisinart',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Breville',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Rowenta',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Toastess',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Miscellaneous',
                            'parent_id' => 61,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                DB::table('categories')->insert([
                        'name' => 'Small Appliance Parts',
                        'parent_id' => 9,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
//{
                    DB::table('categories')->insert([
                            'name' => 'Oster',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Phillips',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Moulinex',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Krups',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Bionaire',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Braun',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'T-Fal',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Sunbeam',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'KitchenAid',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'FoodSaver',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Salton',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'DeLonghi',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'ProctorSilex',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Hamilton Beach',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Margaritaville',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Cuisinart',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Breville',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Rowenta',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Toastess',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Miscellaneous',
                            'parent_id' => 81,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                DB::table('categories')->insert([
                        'name' => 'Small Appliance Accessories',
                        'parent_id' => 9,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                   DB::table('categories')->insert([
                            'name' => 'Oster',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Phillips',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Moulinex',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Krups',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Bionaire',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Braun',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'T-Fal',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Sunbeam',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'KitchenAid',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'FoodSaver',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Salton',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'DeLonghi',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'ProctorSilex',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Hamilton Beach',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Margaritaville',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Cuisinart',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Breville',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Rowenta',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Toastess',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('categories')->insert([
                            'name' => 'Miscellaneous',
                            'parent_id' => 101,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);
//}
    }
}
