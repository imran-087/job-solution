<?php

namespace App\Http\Controllers\Admin\Exam;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreExamRequest;
use App\Models\ExamDetail;
use Yajra\DataTables\Facades\DataTables;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Exam::orderBy('created_at', 'desc')->select();

            //filter
            if (isset($request->status) && $request->status != "all") {
                $data->where('status', $request->status);
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('user_id', function ($row) {
                    return $row->user->name;
                })
                ->editColumn('examinee_type', function ($row) {
                    if ($row->examinee_type == 'user') {
                        $btn = '<div class="badge badge-light-info fw-bolder">Free</div>';
                    } else {
                        $btn = '<div class="badge badge-light-info fw-bolder">Paid</div>';
                    }
                    return $btn;
                })
                ->editColumn('sub_category_id', function ($row) {
                    if ($row->sub_category == '') {
                        return '<div class="badge badge-light-info fw-bolder">null</div>';
                    }
                    return $row->sub_category->name;
                })
                ->editColumn('category_id', function ($row) {

                    return $row->category->name;
                })
                ->addColumn('subject', function ($row) {
                    $examDetails = ExamDetail::where('exam_id', $row->id)->get();
                    $val = '';

                    foreach ($examDetails as $examsubject) {
                        $subjectQues = 0;
                        if ($examsubject->question_ids) {
                            $subjectQues = collect($examsubject->question_ids)->count();
                        }
                        //$questionCollect = collect($val2);
                        $val .= '<a target="_blank" href="exam/details-view?exam_id=' . $row->id . '&subject_id=' . $examsubject->subject->id . '"><div class="badge badge-success me-2 mb-2">' . $examsubject->subject->name . '&nbsp; &nbsp;' . $subjectQues  . '</div></a>';
                    }
                    return $val;
                })

                ->editColumn('exam_status', function ($row) {
                    if ($row->status == "published") {
                        $btn = '<div class="badge badge-light-success fw-bolder">Published</div>';
                    }
                    if ($row->status == "unpublished") {
                        $btn = '<div class="badge badge-light-warning fw-bolder">Unpublished</div>';
                    } else {
                        $btn = '<div class="badge badge-light-danger fw-bolder">Closed</div>';
                    }
                    return $btn;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="exam/details-view?exam_id=' . $row->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="exam/edit/' . $row->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <a href="javascript:;" onclick="addSubject(' . $row->id . ')" class="btn btn-light btn-active-color-primary btn-sm me-1">
                            <i class="fas fa-plus">&nbsp;Subject</i>
                        </a>
                        <a href="javascript:;" onclick="editSubject(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm ">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'subject', 'exam_status', 'category_id', 'sub_category_id', 'examinee_type'])
                ->make(true);
        }

        return view('admin.exam.index');
    }
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.exam.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $exam_starting_time = Carbon::parse($request->exam_starting_time)->format('Y-m-d\TH:i');
        $duration = $request->duration . ':00';

        $exam = Exam::create([
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'user_id' => Auth::guard('admin')->user()->id,
            'name' => $request->name,
            'name' => $request->instruction,
            'examinee_type' => $request->examinee_type,
            'exam_mode' => $request->exam_mode,
            'duration' => $duration,
            'number_of_question' => $request->number_of_question,
            'mark' => $request->mark,
            'cut_mark' => $request->cut_mark ?? '0',
            'negative_mark' => $request->negative_mark ?? '0',
            'required_point' => $request->required_point ?? '0',
            'exam_price' => $request->price ?? 0,
            'discount_price' => $request->discount_price ?? 0,
            'exam_status' => $request->exam_status,
            'exam_starting_time' => $exam_starting_time,
            'discount_price' => $request->discount_price,
        ]);
        if ($exam) {
            return redirect()->route('admin.exam-details.create')->with('success', 'Exam created, Now you can add subject to this exam');
        } else {
            return redirect()->back()->with('error', 'Failed!');
        }
    }

    public function edit($id)
    {
        $exam = Exam::find($id);
        $categories = Category::select('id', 'name')->get();

        //exam subject edit
        $exam_details = ExamDetail::with('subject')->where('exam_id',  $id)
            ->where('question_ids', null)
            // ->where('created_user_id', Auth::guard('admin')->id())
            ->get();
        return view('admin.exam.edit', compact('exam', 'categories', 'exam_details'));
    }

    public function update(Request $request)
    {
        //dd($request->all());

        $exam_starting_time = Carbon::parse($request->exam_starting_time)->format('Y-m-d\TH:i');

        $exam = Exam::where('id', $request->exam_id)->update([
            //dd('here'),
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'user_id' => $request->user_id,
            'name' => $request->name,
            'examinee_type' => $request->examinee_type,
            'exam_mode' => $request->exam_mode,
            'duration' => $request->duration,
            'number_of_question' => $request->number_of_question,
            'mark' => $request->mark,
            'cut_mark' => $request->cut_mark ?? '0',
            'negative_mark' => $request->negative_mark ?? '0',
            'required_point' => $request->required_point ?? '0',
            'exam_price' => $request->price ?? 0,
            'discount_price' => $request->discount_price ?? 0,
            'exam_status' => $request->exam_status,
            'exam_starting_time' => $exam_starting_time,
            'discount_price' => $request->discount_price,
            'updated_user_id' => Auth::guard('admin')->user()->id,
        ]);

        if ($exam) {
            return redirect()->back()->with('success', 'Exam Updated');
        } else {
            return redirect()->back()->with('error', 'Failed!');
        }
    }
}
