<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'password' =>  Hash::make('admin'),
                    'role' => "1",
                ],
                [
                    'name' => 'donquijote',
                    'email' => 'donquijote@donquijote.com',
                    'password' =>  Hash::make('donquijote'),
                    'role' => "2",
                ],
                [
                    'name' => 'cuspide',
                    'email' => 'cuspide@cuspide.com',
                    'password' =>  Hash::make('cuspide'),
                    'role' => "2",
                ],
                [
                    'name' => 'buscalibre',
                    'email' => 'buscalibre@buscalibre.com',
                    'password' =>  Hash::make('buscalibre'),
                    'role' => "2",
                ],
                [
                    'name' => Str::random(10),
                    'email' => 'user@user.com',
                    'password' =>  Hash::make('user'),
                    'role' => "3",
                ]
        ];

        DB::table('users')->insert($data);
    }
}
