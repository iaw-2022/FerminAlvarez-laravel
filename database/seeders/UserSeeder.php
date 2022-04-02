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
                    'email' => 'ferminalvarez013+debug1@gmail.com',
                    'password' =>  Hash::make('FerminDebug', [
                        'rounds' => 12,
                    ]),
                ],
                [
                    'name' => 'Alvarez',
                    'email' => 'ferminalvarez013+debug2@gmail.com',
                    'password' =>  Hash::make('FerminDebug', [
                        'rounds' => 12,
                    ])
                ],   
                [
                    'name' => Str::random(10),
                    'email' => 'ferminalvarez013+debug3@gmail.com',
                    'password' =>  Hash::make('FerminDebug', [
                        'rounds' => 12,
                    ])
                ]
        ];

        DB::table('users')->insert($data);
    }
}
