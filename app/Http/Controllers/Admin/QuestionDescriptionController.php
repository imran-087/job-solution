<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\QuestionDescription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class QuestionDescriptionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = QuestionDescription::where('status', ['active', 'deactive'])->select();



            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('question_id', function ($row) {

                    //return ;
                    $val = '<div>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">' . Str::limit($row->question->question, 25) . '</span>
                            <span class="text-muted fw-bold text-muted d-block fs-7">' . $row->question->sub_category->name . '</span>
                        </div>';
                    return $val;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="javascript:;" onclick="edit(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <a href="javascript:;" onclick="deleteDescription(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                ->rawColumns(['action', 'created_at', 'question_id'])
                ->make(true);
        }

        //main category
        $main_categories = MainCategory::all();
        $sub_categories = SubCategory::all();

        return view('admin.description.question_des_index', compact('main_categories', 'sub_categories'));
    }

    //create description
    public function create()
    {
        $main_categories = MainCategory::all();
        return view('admin.description.create', compact('main_categories'));
    }

    //store or update description
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'description' => ['required'],
            'question' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if (isset($request->question_des_id) &&  $question_des = QuestionDescription::find($request->question_des_id)) { //update
                //dd($request->question_des_id);
                $question_des->question_id = $request->question;
                $question_des->description = $request->description;

                $question_des->updated_at = Carbon::now();

                // edited question description tracker 
                $question_des->edited_descriptions()->create([
                    'description' => $request->description,
                    'editor_id' => Auth::guard('admin')->user()->id,
                    'status' => 'active'
                ]);


                if ($question_des->update()) {
                    return response()->json([
                        'success' => true,
                        'message' => __('Description updated successfully!')
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => __('Failed!.')
                    ]);
                }
            } else { //create new category

                $question_des = new QuestionDescription();

                $question_des->question_id = $request->question;
                $question_des->description = $request->description;
                $question_des->created_user_id =  Auth::guard('admin')->user()->id;

                $question_des->created_at = Carbon::now();


                if ($question_des->save()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Description saved successfully!'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed!.'
                    ]);
                }
            }
        }
    }

    //getCategory
    public function getQuestionDes($id)
    {
        //dd($id);
        $question_des = QuestionDescription::find($id);
        $question = Question::where('id', $question_des->question_id)->first();

        $data = [
            'question_des' => $question_des,
            'question' => $question,
        ];
        return response($data);
    }

    //deleteDescription
    public function deleteQuestionDes($id)
    {
        $question_des = QuestionDescription::find($id);

        $question_des->delete();

        return response()->json([
            'success' => true,
            'message' => 'Description deleted successfully!'
        ], 200);
    }

    //pending description
    public function pending(Request $request)
    {
        if ($request->ajax()) {
            $data = QuestionDescription::Where('status', 'pending')->select();

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('question_id', function ($row) {
                    return Str::limit($row->question->question, 15);
                })
                ->editColumn('description', function ($row) {
                    return  htmlspecialchars_decode($row->description);
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="javascript:;" onclick="view(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-warning btn-sm me-1">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="javascript:;" onclick="changeStatus(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                           <i class="fas fa-check-circle"></i>
                        </a>
                        <a href="javascript:;" onclick="deleteDescription(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                ->rawColumns(['action', 'created_at', 'question_id', 'description'])
                ->make(true);
        }


        return view('admin.description.pending_description');
    }

    //chnagestatus 
    public function chnageStatus($id)
    {
        $question_des = QuestionDescription::find($id);

        $question_des->status = 'approve';
        $question_des->approval_id = Auth::guard('admin')->user()->id;
        if ($question_des->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Description Approved successfully!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ]);
        }
    }

    public function acceptDescription(Request $request)
    {
        $description = QuestionDescription::find($request->description_id);

        $description->description = $request->description;
        $description->status = 'approve';
        $description->approval_id = Auth::guard('admin')->user()->id;

        if ($description->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Description Approved successfully!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ]);
        }
    }

    public function rejectDescription($id)
    {
        $question_des = QuestionDescription::find($id);

        $question_des->status = 'reject';
        if ($question_des->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Description Rejected'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ]);
        }
    }


    //show single question
    public function showDescription($id)
    {
        $description = QuestionDescription::with('question')->where('id', $id)->first();
        //dd($question);
        $view = view('admin.description.view_description_modal', compact('description'))->render();

        return response([
            'html' => $view
        ]);
    }

    //show all question description
    public function getAllDescription($id)
    {
        $question = Question::with('descriptions')->where('id', $id)->first();
        //dd($question);
        $view = view('admin.description.view_all_description_modal', compact('question'))->render();

        return response([
            'html' => $view
        ]);
    }
}
