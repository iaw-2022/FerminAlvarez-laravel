<?php

namespace Database\Seeders;

use App\Models\Bookshop;
use App\Models\WrittenBy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(WrittenBySeeder::class);
        $this->call(BookshopSeeder::class);
        $this->call(HasSeeder::class);
        $this->call(SuscriberSeeder::class);
        $this->call(SubscribedSeeder::class);
    }
}
