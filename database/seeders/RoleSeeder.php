<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                [
                    'role' => "admin"
                ],
                [
                    'role' => "bookshop"
                ],
                [
                    'role' => "user"
                ]
        ];

        DB::table('roles')->insert($data);
    }
}
