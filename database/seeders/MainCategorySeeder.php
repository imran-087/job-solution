<?php

namespace Database\Seeders;

use App\Models\MainCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainCategory::create([
            'name' => 'Jobs',
            'title' => 'Jobs',
            'slug' => 'jobs',
            'created_user_id' => '1',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        MainCategory::create([
            'name' => 'Academy',
            'title' => 'Academy',
            'slug' => 'academy',
            'created_user_id' => '1',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        MainCategory::create([
            'name' => 'Admission',
            'title' => 'Admission',
            'slug' => 'admission',
            'created_user_id' => '1',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
