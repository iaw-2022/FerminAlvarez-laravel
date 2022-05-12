<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WrittenBySeeder extends Seeder
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
                'Author' => '1',
                'ISBN' => '9786073132411',
            ],
            [
                'Author' => '3',
                'ISBN' => '9786073132411',
            ],
            [
                'Author' => '4',
                'ISBN' => '9786073132411',
            ],
            [
                'Author' => '2',
                'ISBN' => '9788466662321',
            ],
            [
                'Author' => '2',
                'ISBN' => '9788466658843',
            ],
            [
                'Author' => '2',
                'ISBN' => '9788466659840',
            ],
            [
                'Author' => '5',
                'ISBN' => '9788499088990',
            ]
        ];

        DB::table('written_by')->insert($data);
    }
}
