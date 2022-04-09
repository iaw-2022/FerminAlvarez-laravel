<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HasSeeder extends Seeder
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
                'price' => '6005',
                'ISBN' => '9786073132411',
                'Bookshop' => '4'
            ],
            [
                'price' => '4199',
                'ISBN' => '9788466662321',
                'Bookshop' => '3'
            ],
            [
                'price' => '4199',
                'ISBN' => '9788466662321',
                'Bookshop' => '2'
            ],
            [
                'price' => '4199',
                'ISBN' => '9788466662321',
                'Bookshop' => '1'
            ]
        ];
        DB::table('has')->insert($data);
    }
}
