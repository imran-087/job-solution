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
        \App\Models\User::factory(10)->create();
        //\App\Models\Admin::factory(10)->create();
        // \App\Models\MainCategory::factory(5)->create();
        // \App\Models\Category::factory(5)->create();
        // \App\Models\SubCategory::factory(5)->create();
        // \App\Models\Subject::factory(5)->create();
        // \App\Models\Year::factory(10)->create();
        // \App\Models\Question::factory(200)->create();
        // \App\Models\QuestionOption::factory(200)->create();
        // \App\Models\QuestionDescription::factory(100)->create();

        $this->call([
            AdminSeeder::class,
            MainCategorySeeder::class
        ]);
    }
}
