<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Uncategorized',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Batteries',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Cellphone Accessories',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Garment Care',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Lights',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Miscellaneous',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Service & Repair',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Shavers',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Small Appliances',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Timepieces',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Vacuums',
                'slug' => NULL,
                'parent_id' => NULL,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Button Cell Batteries',
                'slug' => NULL,
                'parent_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Camera Batteries',
                'slug' => NULL,
                'parent_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Cell Phone Batteries',
                'slug' => NULL,
                'parent_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Cordless Phone Batteries',
                'slug' => NULL,
                'parent_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Laptop Batteries',
                'slug' => NULL,
                'parent_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Miscellaneous Batteries',
                'slug' => NULL,
                'parent_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Rechargeable Batteries',
                'slug' => NULL,
                'parent_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Lithium Rechargeable Batteries',
                'slug' => NULL,
                'parent_id' => 17,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'NiMH Rechargeable Batteries',
                'slug' => NULL,
                'parent_id' => 17,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'NiCD Rechargeable Batteries',
                'slug' => NULL,
                'parent_id' => 17,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'SLA Batteries',
                'slug' => NULL,
                'parent_id' => 2,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Cellphone Adapters',
                'slug' => NULL,
                'parent_id' => 3,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Cellphone Cases',
                'slug' => NULL,
                'parent_id' => 3,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Cellphone Cords',
                'slug' => NULL,
                'parent_id' => 3,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Garment Care Accessories',
                'slug' => NULL,
                'parent_id' => 4,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Garment Care Irons',
                'slug' => NULL,
                'parent_id' => 4,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Garment Care Steamers',
                'slug' => NULL,
                'parent_id' => 4,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Miscellaneous Garment Care',
                'slug' => NULL,
                'parent_id' => 4,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Flashlights',
                'slug' => NULL,
                'parent_id' => 5,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Miscellaneous Lights',
                'slug' => NULL,
                'parent_id' => 5,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Chargers',
                'slug' => NULL,
                'parent_id' => 6,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Garage Remotes',
                'slug' => NULL,
                'parent_id' => 6,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Miscellaneous',
                'slug' => NULL,
                'parent_id' => 6,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Toys',
                'slug' => NULL,
                'parent_id' => 6,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Travel',
                'slug' => NULL,
                'parent_id' => 6,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Travel Adapters',
                'slug' => NULL,
                'parent_id' => 36,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Travel Converters',
                'slug' => NULL,
                'parent_id' => 36,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'In Store Service',
                'slug' => NULL,
                'parent_id' => 7,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Battery Replacement',
                'slug' => NULL,
                'parent_id' => 39,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Soldering',
                'slug' => NULL,
                'parent_id' => 39,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Shaver Repair',
                'slug' => NULL,
                'parent_id' => 39,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Service Department',
                'slug' => NULL,
                'parent_id' => 7,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Battery Packs',
                'slug' => NULL,
                'parent_id' => 43,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Cell Phone Repair',
                'slug' => NULL,
                'parent_id' => 43,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Shaver Repair',
                'slug' => NULL,
                'parent_id' => 43,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Small Appliances',
                'slug' => NULL,
                'parent_id' => 43,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Timepieces',
                'slug' => NULL,
                'parent_id' => 43,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Shaver Accessories',
                'slug' => NULL,
                'parent_id' => 8,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Braun',
                'slug' => NULL,
                'parent_id' => 49,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Miscellaneous',
                'slug' => NULL,
                'parent_id' => 49,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Phillips',
                'slug' => NULL,
                'parent_id' => 49,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Shaver Parts',
                'slug' => NULL,
                'parent_id' => 8,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Braun',
                'slug' => NULL,
                'parent_id' => 53,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Miscellaneous',
                'slug' => NULL,
                'parent_id' => 53,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Phillips',
                'slug' => NULL,
                'parent_id' => 53,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Shaver Units',
                'slug' => NULL,
                'parent_id' => 8,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Braun',
                'slug' => NULL,
                'parent_id' => 57,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Miscellaneous',
                'slug' => NULL,
                'parent_id' => 57,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Phillips',
                'slug' => NULL,
                'parent_id' => 57,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Small Appliance Units',
                'slug' => NULL,
                'parent_id' => 9,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Oster',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Phillips',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Moulinex',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Krups',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Bionaire',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Braun',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'T-Fal',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Sunbeam',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'KitchenAid',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'FoodSaver',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Salton',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'DeLonghi',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'ProctorSilex',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Hamilton Beach',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Margaritaville',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Cuisinart',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Breville',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Rowenta',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Toastess',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Miscellaneous',
                'slug' => NULL,
                'parent_id' => 61,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Small Appliance Parts',
                'slug' => NULL,
                'parent_id' => 9,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Oster',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Phillips',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Moulinex',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Krups',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Bionaire',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Braun',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'T-Fal',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Sunbeam',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'KitchenAid',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'FoodSaver',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Salton',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'DeLonghi',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'ProctorSilex',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Hamilton Beach',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Margaritaville',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Cuisinart',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Breville',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Rowenta',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Toastess',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'Miscellaneous',
                'slug' => NULL,
                'parent_id' => 81,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Small Appliance Accessories',
                'slug' => NULL,
                'parent_id' => 9,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Oster',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Phillips',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Moulinex',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Krups',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Bionaire',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Braun',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'T-Fal',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Sunbeam',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'KitchenAid',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'FoodSaver',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Salton',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'DeLonghi',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'ProctorSilex',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Hamilton Beach',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Margaritaville',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Cuisinart',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Breville',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Rowenta',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Toastess',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Miscellaneous',
                'slug' => NULL,
                'parent_id' => 101,
                'created_at' => '2017-08-01 13:08:38',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
