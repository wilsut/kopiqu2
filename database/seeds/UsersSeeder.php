<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id' => 1,
                'name' => 'Super Admin',
                'email' => 'superadmin@kopiqu.com',
                'password' => bcrypt('superadmin'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'role_id' => 2,
                'name' => 'Admin',
                'email' => 'admin@kopiqu.com',
                'password' => bcrypt('admin'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'role_id' => 3,
                'name' => 'Customer',
                'email' => 'customer@kopiqu.com',
                'password' => bcrypt('customer'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('users')->insert($users);
    }
}
