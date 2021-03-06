<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Admin;
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
            'name' => $this->faker->lastName(),
            'title' => $this->faker->sentence(3),
            'slug' => Str::slug($this->faker->lastName()),
            'created_user_id' => Admin::all()->random()->id,
            'created_at' => Carbon::now(),
        ];
    }
}
