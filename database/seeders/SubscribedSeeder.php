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
                'email' => 'feeralvarez013@gmail.com',
                'ISBN' => '9786073132411',
            ],
            [
                'email' => 'feeralvarez013@gmail.com',
                'ISBN' => '9788466662321',
            ],
            [
                'email' => 'feeralvarez013+cuenta2@gmail.com',
                'ISBN' => '9786073132411',
            ],
            [
                'email' => 'feeralvarez013+cuenta3@gmail.com',
                'ISBN' => '9786073132411',
            ]
        ];
        DB::table('subscribed')->insert($data);
    }
}
