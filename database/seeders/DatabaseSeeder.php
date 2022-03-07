<?php

namespace Database\Seeders;

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
        \App\Models\MainCategory::factory(30)->create();
        \App\Models\User::factory(1)->create();
        // $this->call([
        //     AdminSeeder::class
        // ]);
    }
}
