<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_id' => Question::all()->random()->id,
            'description' => $this->faker->sentences(6),
            'created_user_id' => Admin::all()->random()->id,
            'status' => 'active',
            'created_at' => Carbon::now(),
        ];
    }
}
