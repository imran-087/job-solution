<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(1),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(5),
            'slug' => Str::slug($this->faker->sentence(1)),
            'created_user_id' => Admin::all()->random()->id,
            'sub_category_id' => SubCategory::all()->random()->id,
            'created_at' => Carbon::now(),
        ];
    }
}
