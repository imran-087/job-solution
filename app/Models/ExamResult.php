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
        static::created(queueable(function ($exam) {

            $collection = (collect($exam->submitted_data));

            $total_question_count = $collection->count();

            $answered = $collection->where('select_option', '>', 0)->sortBy('question_id');
            dump('answered =' . $answered);
            $answered_count = $answered->count();

            $not_answered_count = $total_question_count - $answered_count;

            dump('total =' . $total_question_count);
            dump('answered =' . $answered_count);
            dump('not_answered =' . $not_answered_count);

            $question_ids = $answered->pluck('question_id');
            dump($question_ids);
            $correct_option = collect(QuestionOption::whereIn('question_id', $question_ids)->pluck('answer'))->toArray();


            $submitted_option = collect($answered->pluck('select_option'))->toArray();

            $right_option = array_map(function ($submitted_option, $correct_option) {
                return $submitted_option === $correct_option;
            }, $submitted_option, $correct_option);

            var_dump($right_option);
            dump($right_option);

            $right_answer_count = count(array_filter($right_option));
            dump('right answer =' . $right_answer_count);

            $wrong_answer_count = $answered_count - $right_answer_count;
            dump('wrong answer =' . $wrong_answer_count);

            $negative_mark = $wrong_answer_count * $exam->negative_mark;
            dump('negative_mark =' . $negative_mark);

            $obtain_mark = (($total_question_count / $exam->mark) * $right_answer_count) - $negative_mark;
            dump('obtain_mark =' . $obtain_mark);

            // Saved Data to result_anaylitcs table 
            ExamResultAnalytic::create([
                'exam_id' => $exam->exam_id,
                'exam_result_id' => $exam->id,
                'user_id' => Auth::id(),
                'total_question' => $total_question_count,
                'total_mark' => $exam->mark,
                'cut_mark' => $exam->cut_mark,
                'negative_mark' => $exam->negative_mark,
                'duration' => $exam->duration,
                'exam_time' => $exam->starting_time,
                'answered' => $answered_count,
                'right_ans' => $right_answer_count,
                'wrong_ans' => $wrong_answer_count,
                'not_ans' => $not_answered_count,
                'obtain_mark' => $obtain_mark,
            ]);
        }));
    }
}
