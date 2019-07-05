<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'name' => 'Admin',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'name' => 'User',
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('roles')->insert($roles);
    }
}
