<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Illuminate\Events\queueable;


class ExamResult extends Model
{
    use HasFactory;

    protected $casts = [
        'submitted_data' => 'json',
    ];

    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(queueable(function ($examResult) {

            $collection = (collect($examResult->submitted_data));

            $total_question_count = $collection->count();

            $answered = $collection->where('select_option', '!=', 0);
            $answered_count = $answered->count();

            $not_answered_count = $total_question_count - $answered_count;

            dump('total =' . $total_question_count);
            dump('answered =' . $answered_count);
            dump('not_answered =' . $not_answered_count);

            $question_ids = $answered->pluck('question_id');
            // dd($question_ids);
            $correct_option = QuestionOption::whereIn('question_id', $question_ids)->pluck('answer');
            //dump('correct option =' . $correct_option);

            $submitted_option = $answered->pluck('select_option');
            $wrong_option = $submitted_option->diff($correct_option);
            $wrong_answer_count = $wrong_option->count();
            dump('wrong answer =' . $wrong_answer_count);

            $right_answer = $answered_count - $wrong_answer_count;
            dump('right answer =' . $right_answer);

            $negative_mark = $wrong_answer_count * $examResult->negative_mark;
            dump('negative_mark =' . $negative_mark);

            $obtain_mark = (($total_question_count / $examResult->mark) * $right_answer) - $negative_mark;
            dump('obtain_mark =' . $obtain_mark);
        }));
    }
}
