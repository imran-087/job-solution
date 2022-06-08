<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Models\ExamResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ExamResultController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ExamResult::orderBy('created_at', 'desc')->select();

            //filter
            if (isset($request->status) && $request->status != "all") {
                $data->where('status', $request->status);
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('exam_id', function ($row) {
                    return $row->exam->name;
                })

                ->editColumn('user_id', function ($row) {
                    return $row->user->name;
                })

                ->addColumn('number_of_question', function ($row) {
                    return $row->exam->number_of_question;
                })
                ->addColumn('answer', function ($row) {
                    return 10;
                })
                ->addColumn('wright', function ($row) {
                    return 8;
                })
                ->addColumn('wrong', function ($row) {
                    return 2;
                })
                ->addColumn('get_mark', function ($row) {
                    return 8;
                })

                ->addColumn('status', function ($row) {
                    // if ($row->status == "published") {
                    //     $btn = '<div class="badge badge-light-success fw-bolder">Published</div>';
                    // }
                    // if ($row->status == "unpublished") {
                    //     $btn = '<div class="badge badge-light-warning fw-bolder">Unpublished</div>';
                    // } else {
                    //     $btn = '<div class="badge badge-light-danger fw-bolder">Closed</div>';
                    // }
                    $btn = '<div class="badge badge-light-success fw-bolder">Good</div>';
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="exam/details-view?exam_id=' . $row->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <i class="fas fa-eye"></i>
                        </a>
                       
                        <a href="javascript:;" onclick="deleteCategory(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'exam_id',  'status',  'user_id'])
                ->make(true);
        }

        return view('admin.exam.exam_result.index');
    }
}
