<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year::create([
            'year' => '2011',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Year::create([
            'year' => '2012',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Year::create([
            'year' => '2005',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Year::create([
            'year' => '2006',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
