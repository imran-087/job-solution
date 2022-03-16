<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'title' => $this->faker->sentence(3),
            'slug' => Str::slug($this->faker->firstName()),
            'created_user_id' => Admin::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => Carbon::now(),
        ];
    }
}
