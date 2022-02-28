<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;

class MainCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'id' => Str::random(30),
            'name' => $this->faker->name(),
            'title' => $this->faker->title(),
            'slug' => Str::slug($this->faker->name()),
            'created_user_id' => 1,
            'created_at' => Carbon::now(),
        ];
    }
}
