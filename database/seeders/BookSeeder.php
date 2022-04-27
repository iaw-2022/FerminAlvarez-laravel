<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
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
                'ISBN' => '9786073132411',
                'name' => 'El Mundo de Hielo y Fuego',
                'publisher' => 'Grijalbo Ilustrado',
                'total_pages' => '336',
                'published_at' => '2016-02-23',
                'category' => '1',
                'image_link' => '',
                'image_path' => ''
            ],
            [
                'ISBN' => '9788466662321',
                'name' => 'ARCANUM ILIMITADO',
                'publisher' => 'Nova',
                'total_pages' => '650',
                'published_at' => '2018-02-27',
                'category' => '2',
                'image_link' => '',
                'image_path' => ''
            ]
        ];
        DB::table('books')->insert($data);
    }
}
