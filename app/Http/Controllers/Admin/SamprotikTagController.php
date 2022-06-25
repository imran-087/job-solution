<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Subject;
use App\Models\SamprotikTag;
use Illuminate\Http\Request;
use App\Models\SamprotikQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SamprotikTagController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SamprotikTag::select();

            return DataTables::of($data)
                ->addIndexColumn()

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
                        <a href="javascript:;" onclick="deleteTag(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                ->rawColumns(['action', 'created_at'])
                ->make(true);
        }
        return view('admin.samprotik_tag.index');
    }

    //create or update 
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if (isset($request->tag_id) &&  $samprotik_tag = SamprotikTag::find($request->tag_id)) { //update
                //dd($request->year_id);
                $samprotik_tag->name = $request->name;
                $samprotik_tag->updated_user_id =  Auth::guard('admin')->user()->id;
                $samprotik_tag->updated_at = Carbon::now();

                if ($samprotik_tag->update()) {
                    return response()->json([
                        'success' => true,
                        'message' => __('Year updated successfully!')
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => __('Failed!.')
                    ]);
                }
            } else { //create new category

                $samprotik_tag = new SamprotikTag();

                $samprotik_tag->name = $request->name;
                $samprotik_tag->created_user_id =  Auth::guard('admin')->user()->id;
                $samprotik_tag->created_at = Carbon::now();

                if ($samprotik_tag->save()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Tag Created'
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
    public function getTag($id)
    {
        //dd($id);
        $data = SamprotikTag::find($id);
        return response($data);
    }

    //deleteCategory
    public function deleteTag($id)
    {
        $samprotik_tag = SamprotikTag::find($id);

        $samprotik_tag->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tag deleted!'
        ], 200);
    }

    //get all tag
    // public function getAllTag(Request $request)
    // {

    //     if ($request->ajax()) {
    //         //dd($request->all());
    //         $subjects = Subject::where([
    //             'parent_id' => null
    //         ])->get();
    //         //dd($subjects);
    //     }

    //     $output = '';

    //     if (count($subjects) > 0) {

    //         $output = '<select class="form-select form-select-solid add-tag ms-2" data-control="select2" data-hide-search="true">
    //                         <option>Select...</option>
    //                         ';
    //         // <option value="subject=' . $row->id . ' question=' . $request->question_id . '" class="fs-6 text-gray-800 text-hover-primary fw-bold">' . $row->name . '</option>

    //         foreach ($subjects as $row) {
    //             $output .=
    //                 '<div class="d-flex flex-column">
    //                         <option data-sid="' . $row->id . '" data-qid="' . $request->question_id . '" class="fs-6 text-gray-800 text-hover-primary fw-bold ">' . $row->name . '</option>
    //                     </div>';
    //             //$output .= '<a href="discussion/' . $row->id . '/show"><li class="list-group-item" style=" border-radious:10px">' . $row->title . '</li></a>';
    //         }

    //         $output .= '</select>';
    //     } else {

    //         $output .= ' <p  class="fs-6 text-800  fw-bold"
    //             style="color:red; margin-top:10px; background-color:#F5F8FA; padding:10px; border-radius:5px;"> '
    //             . 'No Result' .
    //             '</p>';
    //     }

    //     return $output;
    // }

    //get all tag
    public function getAllTag(Request $request)
    {

        if ($request->ajax()) {
            //dd($request->all());
            $data = Subject::where(['main_category_id' => 1, 'sub_category_id' => 0])
                ->where('name', 'like', '%' . $request->data . '%')
                ->select('id', 'name')->get();
            dd($data);
        }

        $output = '';



        return $output;
    }

    //add tag
    public function addTag(Request $request)
    {
        if ($request->ajax()) {
            //dd($request->all());
            $question = SamprotikQuestion::find($request->question_id);

            $subject = Subject::find($request->subject_id);

            // $insert = DB::table('subjectables')->insert(
            //     array('created_user_id' => Auth::guard('admin')->id(), 'status' => 1)
            // );

            $sync = $question->subjects()->sync($subject->id);

            if ($sync) {
                return response()->json([
                    'success' => true,
                    'message' => 'Tag added'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed'
                ], 303);
            }
        }
    }
}
