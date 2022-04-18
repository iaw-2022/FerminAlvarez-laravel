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
                'category' => 'Fiction',
                'image_link' => 'http://books.google.com/books/content?id=FT_YjgEACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api'
            ],
            [
                'ISBN' => '9788466662321',
                'name' => 'ARCANUM ILIMITADO',
                'publisher' => 'Nova',
                'total_pages' => '650',
                'published_at' => '2018-02-27',
                'category' => 'Fiction',
                'image_link' => 'http://books.google.com/books/content?id=kCbuswEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'
            ]
        ];
        DB::table('books')->insert($data);
    }
}
