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
                    'name' => 'Fermin',
                    'email' => 'feeralvarez013+admin@gmail.com',
                    'password' =>  Hash::make('FerminAdmin'),
                    'role' => "1",
                ],
                [
                    'name' => 'Alvarez',
                    'email' => 'feeralvarez013+tienda@gmail.com',
                    'password' =>  Hash::make('FerminTienda'),
                    'role' => "2",
                ],
                [
                    'name' => Str::random(10),
                    'email' => 'feeralvarez013+usuario@gmail.com',
                    'password' =>  Hash::make('FerminUsuario'),
                    'role' => "3",
                ]
        ];

        DB::table('users')->insert($data);
    }
}
