<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
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
                'name' => 'George R. Martin',
            ],
            [
                'name' => 'Brandon Sanderson',
            ],
            [
                'name' => 'Elio M. García',
            ],
            [
                'name' => 'Linda Antonsson',
            ],
            [
                'name' => 'Valerio Massimo Manfredi',
            ]
        ];

        DB::table('authors')->insert($data);
    }
}
