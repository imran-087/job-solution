<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use function Illuminate\Events\queueable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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

            // dump('total =' . $total_question_count);
            // dump('answered =' . $answered_count);
            // dump('not_answered =' . $not_answered_count);

            $question_ids = $answered->pluck('question_id');
            //dump($question_ids);
            $correct_option = QuestionOption::whereIn('question_id', $question_ids)->pluck('answer');
            //dump('correct option =' . $correct_option);

            $submitted_option = $answered->pluck('select_option');
            // $wrong_option = $submitted_option->diff($correct_option);
            // $wrong_answer_count = $wrong_option->count();

            $right_option = $submitted_option->intersect($correct_option);
            $right_answer_count = $right_option->count();
            //dd('right answer =' . $right_answer_count);

            $wrong_answer_count = $answered_count - $right_answer_count;
            // //dump('right answer =' . $right_answer);

            $negative_mark = $wrong_answer_count * $examResult->negative_mark;
            // //dump('negative_mark =' . $negative_mark);

            $obtain_mark = (($total_question_count / $examResult->mark) * $right_answer_count) - $negative_mark;
            // //dump('obtain_mark =' . $obtain_mark);


            // Saved Data to result_anaylitcs table 
            ExamResultAnalytic::create([
                'exam_id' => $examResult->exam_id,
                'user_id' => Auth::id(),
                'total_question' => $total_question_count,
                'total_mark' => $examResult->mark,
                'cut_mark' => $examResult->cut_mark,
                'negative_mark' => $examResult->negative_mark,
                'answered' => $answered_count,
                'right_ans' => $right_answer_count,
                'wrong_ans' => $wrong_answer_count,
                'not_ans' => $not_answered_count,
                'obtain_mark' => $obtain_mark,
            ]);
        }));
    }
}
