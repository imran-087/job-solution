<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionOptionFactory extends Factory
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
            'option_1' => $this->faker->sentence(2),
            'option_2' => $this->faker->sentence(2),
            'option_3' => $this->faker->sentence(2),
            'option_4' => $this->faker->sentence(2),
            'answer' => $this->faker->numberBetween(1, 4),
            'created_at' => Carbon::now(),
        ];
    }
}
