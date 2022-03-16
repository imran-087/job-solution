<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sub_category_id' => SubCategory::all()->random()->id,
            'subject_id' => Subject::all()->random()->id,
            'year_id' => Year::all()->random()->id,
            'question_type' => 'mcq',
            'mark' => '1',
            'hard_level' => 'easy',
            'question' => $this->faker->sentence(10),
            'slug' => Str::slug($this->faker->sentence(3)),
            'created_user_id' => Admin::all()->random()->id,
            'created_at' => Carbon::now(),
        ];
    }
}
