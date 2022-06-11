<?php

namespace App\Http\Controllers\ModelTest;

use App\Models\Exam;
use App\Models\ExamDetail;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ModelTestResultController extends Controller
{
    public function index(Request $request)
    {

        // if ($request->ajax()) {
        //     $data = ExamResult::where('user_id', Auth::id())->orderBy('created_at', 'desc')->select();

        //     //filter
        //     if (isset($request->status) && $request->status != "all") {
        //         $data->where('examinee_type', $request->status);
        //     }

        //     return DataTables::of($data)
        //         ->addIndexColumn()

        //         ->editColumn('exam_id', function ($row) {
        //             if ($row->exam_id == null) {
        //                 $btn = '<div class="badge badge-light-success fw-bolder">Custom Model Test</div>';
        //             } else {
        //                 $btn = '<div class="badge badge-light-info fw-bolder">' . $row->exam->name . '</div>';
        //             }
        //             return $btn;
        //         })

        //         ->addColumn('total_question', function ($row) {
        //             return collect($row->submitted_data)->count();
        //         })

        //         ->addColumn('answer', function ($row) {
        //             $submitted_data = collect($row->submitted_data);
        //             return object()
        //         })

        //         ->addColumn('not_answer', function ($row) {

        //             // return collect($row->submitted_data)->count() - collect($row->submitted_data)->count();
        //             return 'not ans';
        //         })

        //         ->addColumn('right', function ($row) {
        //             return 'right';
        //         })

        //         ->addColumn('wrong', function ($row) {
        //             return 'wrong';
        //         })

        //         ->addColumn('obtain_mark', function ($row) {
        //             return 'obtain';
        //         })

        //         ->addColumn('action', function ($row) {

        //             $btn = '
        //                 <div class="d-flex justify-content-start flex-shrink-0">

        //                     <a href="model-test/attend?exam_id=' . $row->id . '" class="btn btn-sm btn-primary">
        //                         view
        //                     </a>
        //                 </div>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action', 'exam_id', 'total_question', 'answer', 'not_answer', 'right', 'wrong', 'obtain_mark'])
        //         ->make(true);
        // }

        return view('modeltest.result.index');
    }
}
