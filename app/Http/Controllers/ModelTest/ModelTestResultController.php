<?php

namespace App\Http\Controllers\ModelTest;

use App\Models\Exam;
use App\Models\Question;
use App\Models\ExamDetail;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use App\Models\ExamResultAnalytic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ModelTestResultController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = ExamResultAnalytic::where('user_id', Auth::id())->orderBy('created_at', 'desc')->select();

            //filter
            if (isset($request->status) && $request->status != "all") {
                $data->where('examinee_type', $request->status);
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('exam_id', function ($row) {

                    if ($row->exam_id == null) {
                        $btn = '<div class="badge badge-light-success fw-bolder">Custom Model Test</div>';
                    } else {
                        $btn = '<div class="badge badge-light-info fw-bolder">' . $row->exam->name . '</div>';
                    }
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->obtain_mark > $row->cut_mark) {
                        $btn = '<div class="badge badge-light-success fw-bolder">Good</div>';
                    } else if ($row->obtain_mark == $row->cut_mark) {
                        $btn = '<div class="badge badge-light-warning fw-bolder">Average</div>';
                    } else {
                        $btn = '<div class="badge badge-light-danger fw-bolder">Disastar</div>';
                    }
                    return $btn;
                })

                ->addColumn('action', function ($row) {

                    $btn = '
                        <div class="d-flex justify-content-start flex-shrink-0">

                            <a href="details-view?exam_result_id=' . $row->exam_result_id . '" class="btn btn-sm btn-primary">
                                view
                            </a>
                        </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'exam_id', 'status'])
                ->make(true);
        }

        return view('modeltest.result.index');
    }

    //details view
    public function show(Request $request)
    {
        //dd($request->exam_result_id);
        // $exam = Exam::find($request->exam_id);

        $exam_result = ExamResult::where('id', $request->exam_result_id)->first();
        // dump("exam Result: " . $exam_result);

        $submitted_queston_collection = collect($exam_result->submitted_data);
        // dump("submitted_queston_collection");
        // dump($submitted_queston_collection);


        $quesion_id_collection = $submitted_queston_collection->pluck('question_id');
        // dump("quesion_id_collection: " . $quesion_id_collection);


        $question_option = QuestionOption::whereIn('question_id', $quesion_id_collection)->select("question_id", "option_1", "option_2", "option_3", "option_4", "option_5", "image_option", "answer");
        // dump($question_option);

        $question_details = Question::joinSub($question_option, 'question_options', function ($join) {
            $join->on('questions.id', '=', 'question_options.question_id');
        })->select(
            "question_id",
            "question",
            "question_type",
            "future_editable",
            "option_1",
            "option_2",
            "option_3",
            "option_4",
            "option_5",
            "image_option",
            "answer"
        )->get()->toArray();

        // dump($question_details);

        $submitted_question_details_collection = collect($question_details);

        // dump("submitted_question_details_collection");

        // dump($submitted_question_details_collection);

        $exam_result_collection = $submitted_queston_collection->map(function ($item) use ($submitted_question_details_collection) {
            return  array_merge($item, $submitted_question_details_collection->firstWhere('question_id', '==', $item['question_id']));
        });

        // dump($exam_result_collection);

        $exam_result_collection = $exam_result_collection->groupBy(['subject_id', function ($item) {
            return $item['passage_id'];
        }], $preserveKeys = true);

        //dump($exam_result_collection);
        // foreach ($exam_result_collection as $subject_id => $subject_arr) {
        //     dump(Subject::where('id', $subject_id)->value('name'));

        //     dump($subject_arr);
        // }



        //dd("End");

        $exam_analytics = ExamResultAnalytic::where('exam_result_id', $request->exam_result_id)->first();
        //dd($exam_analytics);

        return view('modeltest.result.view_details', compact('exam_result_collection', 'exam_analytics'));
    }
}
