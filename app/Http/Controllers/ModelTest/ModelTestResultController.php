<?php

namespace App\Http\Controllers\ModelTest;

use App\Models\Exam;
use App\Models\ExamDetail;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ExamResultAnalytic;
use App\Models\QuestionOption;
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

                            <a href="details-view?model_test=' . $row->exam_id . '" class="btn btn-sm btn-primary">
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
        $exam = Exam::find($request->model_test);
        $exam_results = ExamResult::with('exam')->where('exam_id', $request->model_test)->get();
        //dd($exam_results);
        return view('modeltest.result.view_details', compact('exam_results', 'exam'));
    }
}
