<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
                    'name' => "Ficción"
                ],
                [
                    'name' => "Fantasía"
                ],
                [
                    'name' => "Novela Historica"
                ]
        ];

        DB::table('categories')->insert($data);
    }
}
