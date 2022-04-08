<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuscriberSeeder extends Seeder
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
                'email' => 'feeralvarez013@gmail.com',
            ],
            [
                'email' => 'feeralvarez013+cuenta2@gmail.com',
            ],
            [
                'email' => 'feeralvarez013+cuenta3@gmail.com',
            ]
        ];
        DB::table('suscribers')->insert($data);
    }
}
