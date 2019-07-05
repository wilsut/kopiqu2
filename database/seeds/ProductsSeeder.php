<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => "Amstirdam Coffee Arabika Batak Tolu",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua consequat.',
                'price' => 84000,
                'weight' => 200,
                'image' => 'https://kopitem.com/wp-content/uploads/2019/05/jual-biji-kopi-online-amstirdam-coffee-batak-tolu.jpg',
                'category_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Amstirdam Coffee Arabika Papua Baliem",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua consequat.',
                'price' => 91000,
                'weight' => 200,
                'image' => 'https://kopitem.com/wp-content/uploads/2019/05/jual-biji-kopi-online-amstirdam-coffee-papua-lembah-baliem.jpg',
                'category_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Amstirdam Coffee Robusta Malang Dampit",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua consequat.',
                'price' => 50000,
                'weight' => 200,
                'image' => 'https://kopitem.com/wp-content/uploads/2019/05/jual-biji-kopi-online-amstirdam-coffee-robusta-dampit.jpg',
                'category_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Corbu Coffee Robusta Dampit Malang Full Washed",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua consequat.',
                'price' => 65000,
                'weight' => 200,
                'image' => 'https://kopitem.com/wp-content/uploads/2018/10/jual-biji-kopi-online-corbu-coffee-malang-dampit.jpg',
                'category_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('products')->insert($products);
    }
}
