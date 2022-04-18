<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Librería Don Quijote',
                'city' => 'Bahía Blanca',
                'latitude' => '-38.722433003095695',
                'longitude' => '-62.26480468466647',
            ],
            [
                'name' => 'Cúspide',
                'city' => 'CABA',
                'latitude' => '-34.48894057978279',
                'longitude' => '-58.499096569738754',
            ],
            [
                'name' => 'Cúspide',
                'city' => 'CABA',
                'latitude' => '-34.586590081413064',
                'longitude' => '-58.414013719921385',
            ]
        ];
        DB::table('bookshops')->insert($data);
        DB::table('bookshops')->insert([
            'name' => "BuscaLibre"
        ]);
    }
}
