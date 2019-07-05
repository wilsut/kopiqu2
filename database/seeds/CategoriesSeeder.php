<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Arabica Coffee',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua consequat.',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'name' => 'Robusta Coffee',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua consequat.',
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
