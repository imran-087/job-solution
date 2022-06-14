<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Models\Exam;
use App\Models\Question;
use App\Models\ExamDetail;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use App\Http\Controllers\Controller;

class ExamViewController extends Controller
{
    public function show(Request $request)
    {
        $exam = Exam::find($request->exam_id);

        // // //dd($subject_id);
        if ($request->has('subject_id')) {
            $exam_details = ExamDetail::with('question')
                ->where('exam_id', $request->exam_id)
                ->where('subject_id', $request->subject_id)
                ->get();
        } else {
            $exam_details = ExamDetail::where('exam_id', $request->exam_id)->with('question')->get();
            // dd($exam_details);
        }

        $questions_arr = [];

        foreach ($exam_details as $exam_detail) {
            $collection = collect($exam_detail->question_ids);
            //dump($collection);
            $quesion_id_collection = $collection->pluck('question_id');
        
            $question_option = QuestionOption::whereIn('question_id', $quesion_id_collection)->select("question_id", "option_1", "option_2", "option_3", "option_4", "option_5",  "image_option", "image_question", "answer");
            // dump($question_option);

            $question_details = Question::joinSub($question_option, 'question_options', function ($join) {
                $join->on('questions.id', '=', 'question_options.question_id');
            })->select(
                "question_id",
                "subject_id",
                "question",
                "question_type",
                "future_editable",
                "option_1",
                "option_2",
                "option_3",
                "option_4",
                "option_5",
                "image_option",
                "image_question",
                "answer"
            )->get()->toArray();

            $questions_arr = array_merge($questions_arr, $question_details);
        }

        $questions = collect($questions_arr);

        //dump($questions);
        return view('admin.exam.show', compact('exam', 'questions'));
    }
}
