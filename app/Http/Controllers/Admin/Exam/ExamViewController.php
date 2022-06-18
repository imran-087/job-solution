<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Models\Exam;
use App\Models\Question;
use App\Models\ExamDetail;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use App\Http\Controllers\Controller;
use App\Models\Subject;

class ExamViewController extends Controller
{
    public function show(Request $request)
    {
        $exam = Exam::find($request->exam_id);

        // // //dd($subject_id);
        if ($request->has('subject_id')) {
            $exam_details = ExamDetail::where('exam_id', $request->exam_id)
                ->where('subject_id', $request->subject_id)
                ->with('subject')
                ->get();
        } else {
            $exam_details = ExamDetail::where('exam_id', $request->exam_id)->with('subject')->get();
            // dd($exam_details);
        }

        $questions_arr = [];

        foreach ($exam_details as $exam_detail) {
            //dump('exam_detail= ' . $exam_detail->subject_id);
            // $subject = Subject::where('id', $exam_detail->subject_id)->value('name');

            $collection = collect($exam_detail->question_ids);
            //dump($collection);
            $question_id_collection = $collection->pluck('question_id');

            $questions = Question::whereIn('id', $question_id_collection)
                ->where('subject_id', $exam_detail->subject_id)
                ->select("id", "question", "subject_id", "passage_id", "sub_category_id")
                ->with('question_option')
                ->get()->toArray();
            // dump($question_option);

            // $question_details = Question::joinSub($question_option, 'question_options', function ($join) {
            //     $join->on('questions.id', '=', 'question_options.question_id');
            // })->select(
            //     "question_id",
            //     "subject_id",
            //     "passage_id",
            //     "question",
            //     "question_type",
            //     "future_editable",
            //     "option_1",
            //     "option_2",
            //     "option_3",
            //     "option_4",
            //     "option_5",
            //     "image_option",
            //     "image_question",
            //     "answer"
            // )->get()->toArray();

            $questions_arr = array_merge($questions_arr, $questions);
        }

        // dump($questions_arr);
        // dd('End');

        return view('admin.exam.show', compact('exam', 'exam_details'));
    }
}
