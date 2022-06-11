<?php

namespace App\Http\Controllers\ModelTest;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\ExamDetail;
use App\Models\ExamResult;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ModelTestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Exam::orderBy('created_at', 'desc')->select();

            //filter
            if (isset($request->status) && $request->status != "all") {
                $data->where('examinee_type', $request->status);
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('user_id', function ($row) {
                    return $row->user->name;
                })
                ->editColumn('examinee_type', function ($row) {
                    if ($row->examinee_type == 'user') {
                        $btn = '<div class="badge badge-light-success fw-bolder">Free</div>';
                    } else {
                        $btn = '<div class="badge badge-light-info fw-bolder">Paid</div>';
                    }
                    return $btn;
                })
                // ->editColumn('sub_category_id', function ($row) {
                //     if ($row->sub_category == '') {
                //         return '<div class="badge badge-light-info fw-bolder">null</div>';
                //     }
                //     return $row->sub_category->name;
                // })

                ->addColumn('subject', function ($row) {
                    $examDetails = ExamDetail::where('exam_id', $row->id)->get();
                    $val = '';

                    foreach ($examDetails as $examsubject) {
                        $subjectQues = 0;
                        if ($examsubject->question_ids) {
                            $subjectQues = collect($examsubject->question_ids)->count();
                        }
                        //$questionCollect = collect($val2);
                        $val .= '<div class="badge badge-success me-2 mb-2">' . $examsubject->subject->name . '&nbsp; &nbsp; <span class="badge badge-circle badge-danger">' . $subjectQues  . '</span></div>';
                    }
                    return $val;
                })

                ->editColumn('exam_status', function ($row) {
                    if ($row->exam_status == "published") {
                        $btn = '<div class="badge badge-light-success fw-bolder">Published</div>';
                    } else if ($row->exam_status == "unpublished") {
                        $btn = '<div class="badge badge-light-warning fw-bolder">Unpublished</div>';
                    } else {
                        $btn = '<div class="badge badge-light-danger fw-bolder">Closed</div>';
                    }
                    return $btn;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="javascript:;" onclick="view(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="model-test/attend?exam_id=' . $row->id . '" class="btn btn-sm btn-primary">
                            Attend
                        </a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'subject', 'exam_status', 'sub_category_id', 'examinee_type'])
                ->make(true);
        }

        return view('modeltest.index');
    }

    //show exam details
    public function show(Request $request)
    {
        //dd($request->id);
        $exam = Exam::with('examDetails', 'category', 'sub_category', 'user')->where('id', $request->id)->first();
        //dd($question);
        $view = view('modeltest.exam_details_modal', compact('exam'))->render();

        return response([
            'html' => $view
        ]);
    }

    //model test
    public function modelTest(Request $request)
    {
        $exam = Exam::find($request->exam_id);

        //dd($subject_id);
        $exam_details = ExamDetail::with('subject')->where('exam_id', $request->exam_id)->get();

        return view('modeltest.exam', compact('exam', 'exam_details'));
    }

    public function submittedData(Request $request)
    {
        //dd(json_encode($request->submitted_data));

        $exam = Exam::find($request->exam_id);
        $exam_result = ExamResult::create([
            'exam_id' => $exam->id ?? null,
            'sub_category_id' => $exam->sub_category_id ?? $request->sub_category_id,
            'mark' => $exam->mark ?? $request->mark,
            'cut_mark' => $exam->cut_mark ?? $request->cut_mark,
            'negative_mark' => $exam->negative_mark ?? $request->negative_mark,
            'user_id' => Auth::user()->id,
            'starting_time' => Carbon::now(),
            'submitted_data' => $request->submitted_data
        ]);

        if ($exam_result) {
            return response()->json([
                'success' => true,
                'message' => 'Exam Submitted !! View your result Go to Exam result menu',
                'url' => url('/model-test/result')
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed !!!'
            ]);
        }
    }
}
