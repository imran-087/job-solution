<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Models\Exam;
use App\Models\Passage;
use App\Models\Subject;
use App\Models\Question;
use App\Models\ExamDetail;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use App\Http\Controllers\Controller;

class ExamViewController extends Controller
{

    public function show(Request $request)
    {

        if ($request->has(['exam_id', 'subject_id'])) {
            $exam = Exam::where('id', $request->exam_id)->with(['examDetails' => function ($query) use ($request) {
                $query->where('subject_id', $request->subject_id)->with('subject:id,name');
            }])->first();
        } else {
            if ($request->has('exam_id')) {
                $exam = Exam::where('id', $request->exam_id)->with('examDetails.subject:id,name')->first();
            }
        }

        //dump($exam);

        $subject = [];
        $exam_details = [];

        foreach ($exam->examDetails as $exam_detail) {

            $subject[] = $exam_detail->subject->name;

            $exam_detail_question = collect($exam_detail->question_ids);

            $exam_detail_question_ids = $exam_detail_question->pluck('question_id');


            $question_option = QuestionOption::whereIn('question_id', $exam_detail_question_ids)->select("question_id", "option_1", "option_2", "option_3", "option_4", "option_5", "image_option", "image_question", "answer");

            $question_with_option = Question::joinSub($question_option, 'question_options', function ($join) {
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

            //dump($question_with_option);

            $question_details_collection = collect($question_with_option);

            //dump("question_details_collection");

            $exam_detail_question = $exam_detail_question->map(function ($item) use ($question_details_collection) {
                return  array_merge($item, $question_details_collection->firstWhere('question_id', '==', $item['question_id']));
            });

            // dd($exam_result_collection);

            $exam_details[] = ($exam_detail_question->groupBy('passage_id')->toArray());
        }

        // dump($subject);
        // dump($exam_details);

        $exam_details = array_map(function ($subject, $exam_details) {
            return array($subject, $exam_details);
        }, $subject, $exam_details);
        //dump($exam_details);


        // //For Blade View
        // foreach ($exam_details as $kay => $exam_detail) {

        //     //Print Subject
        //     dump($exam_detail[0]);

        //     foreach ($exam_detail[1] as $passage_id  => $questions) {

        //         //Print Passge

        //         if ($passage_id != 0) {
        //             $passage = Passage::find($passage_id);
        //             dump($passage->title);
        //             // dump($passage->passage);
        //         }
        //         foreach ($questions as $question) {
        //             //Print Queston, Option and Answer etc
        //             dump($question['question']);
        //             dump($question['option_1']);
        //         }
        //     }
        // }

        // dd('End');


        return view('admin.exam.show', compact('exam', 'exam_details'));
    }
}
