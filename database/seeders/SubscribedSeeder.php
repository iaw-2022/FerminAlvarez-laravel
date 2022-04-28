<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscribedSeeder extends Seeder
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
                'id_suscriber' => '1',
                'ISBN' => '9786073132411',
            ],
            [
                'id_suscriber' => '1',
                'ISBN' => '9788466662321',
            ],
            [
                'id_suscriber' => '2',
                'ISBN' => '9786073132411',
            ],
            [
                'id_suscriber' => '3',
                'ISBN' => '9786073132411',
            ]
        ];
        DB::table('subscribed')->insert($data);
    }
}
