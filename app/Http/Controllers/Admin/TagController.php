<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Subject;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Question::select();

            //dd($data->tagsubject->count());
            //filter
            if (isset($request->category) && $request->category != "all") {
                $data->where('sub_category_id', $request->category);
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('sub_category_id', function ($row) {
                    if ($row->sub_category_id == '') {
                        return '<div class="badge badge-light-info fw-bolder">Current Ques.</div>';
                    } else {
                        return $row->subCategory->name ?? 'Not Found';
                    }
                })
                ->editColumn('subject_id', function ($row) {
                    if ($row->subject == '') {
                        return '<div class="badge badge-light-info fw-bolder">no subject</div>';
                    } else {
                        return $row->subject->name ?? 'Not Found';
                    }
                })
                ->addColumn('tag', function ($row) {
                    $val = '';
                    foreach ($row->subjects as $tag) {
                        $val.= '<div class="badge badge-success mb-2 me-2">' . $tag->name . '</div>';
                    }
                    return $val;
                })

                ->addColumn('add_subject', function ($row) {
                    $btn = '<div>
                                <span  data-subcategory_id="' . $row->sub_category_id . '" data-question_id="' . $row->id . '" class="btn btn-sm btn-light btn-active-color-primary w-120px  get-subject cursor-pointer" title="Click" >Add Subject</span>
                                <div class="subject" style="z-index:999"></div>
                            </div>';

                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div >
                                <input type="text" data-subject_id="' . $row->subject_id . '" data-question_id="' . $row->id . '" class="form-control form-control-solid w-150px  search_tag"  placeholder="Type to search">
                                <div class="result" style="z-index:999"></div>
                            </div>';

                    return $btn;
                })
                ->rawColumns(['action', 'sub_category_id', 'tag', 'subject_id', 'add_subject'])
                ->make(true);
        }
        $sub_categories = SubCategory::all();
        return view('admin.tag.index', compact('sub_categories'));
    }

    public function searchTag(Request $request)
    {
        if ($request->ajax()) {

            //dd($request->all());
            $data = Subject::whereDescendantOrSelf($request->subject_id)
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->orderBy('id', 'desc')->get();
            //dd($data);

            $output = '';

            if (count($data) > 0) {

                //$output = '<ul class="list-group" style="display: block; position: relative; z-index: 1;">';

                foreach ($data as $row) {
                    $output .=
                        '<div class="d-flex align-items-center mb-2 "
                            style="margin-top:10px; background-color:#F5F8FA; border-radius:5px !important; padding:10px;">
                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <a href="javascript:;" data-qid="' . $request->question_id . '"  data-sid="' . $row->id . '" class="fs-6 text-gray-800 text-hover-primary fw-bold add" >' . $row->name . '</a>
                            </div>
                            <!--end::Title-->
                        </div>';
                    //$output .= '<a href="discussion/' . $row->id . '/show"><li class="list-group-item" style=" border-radious:10px">' . $row->title . '</li></a>';
                }

                //$output .= '</ul>';
            } else {

                $output .= ' <p  class="fs-6 text-800  fw-bold"
                style="color:red; margin-top:10px; background-color:#F5F8FA; padding:10px; border-radius:5px;"> '
                    . 'No Result' .
                    '</p>';
            }

            return $output;
        }
    }

    //Questions  Tag
    public function addTag(Request $request)
    {
        if ($request->ajax()) {
            //dd($request->all());
            $exists = DB::table('subjectables')->where([
                'subjectable_type' => 'App\Models\Question',
                'subjectable_id' => $request->question_id,
                'subject_id' => $request->subject_id
            ])->exists();
            if ($exists) {
                return response()->json([
                    'error' => true,
                    'message' => 'This tag is already exists'
                ], 200);
            } else {

                $question = Question::find($request->question_id);
                $subject = Subject::find($request->subject_id);

                // $insert = DB::table('subjectables')->insert(
                //     array('created_user_id' => Auth::guard('admin')->id(), 'status' => 1)
                // );

                $sync = $question->subjects()->sync([$subject->id => ['subject_id' => $subject->id, 'created_user_id' => Auth::user()->id, 'status' => 1]], false);

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

    //delete tag
    public function delete($id){
        dd($id);
    }

    //get subject
    public function getSubject(Request $request)
    {
        //dd($request->all());

        if ($request->ajax()) {

            $subjects = Subject::where([

                'sub_category_id' => $request->sub_category_id,
                'parent_id' => null
            ])->get();
            //dd($subjects);

            if ($subjects->count() == 0) {

                $subjects = Subject::where([
                    'sub_category_id' => 0,
                    'parent_id' => null
                ])->get();
                //dd($subjects);
            }

            $output = '';

            if (count($subjects) > 0) {

                $output = '<select class="form-select form-select-solid add-subject" data-control="select2" data-hide-search="true">
                            <option>Select...</option>
                            ';
                // <option value="subject=' . $row->id . ' question=' . $request->question_id . '" class="fs-6 text-gray-800 text-hover-primary fw-bold">' . $row->name . '</option>

                foreach ($subjects as $row) {
                    $output .=
                        '<div class="d-flex flex-column">
                            <option data-sid="' . $row->id . '" data-qid="' . $request->question_id . '" class="fs-6 text-gray-800 text-hover-primary fw-bold">' . $row->name . '</option>
                        </div>';
                    //$output .= '<a href="discussion/' . $row->id . '/show"><li class="list-group-item" style=" border-radious:10px">' . $row->title . '</li></a>';
                }

                $output .= '</select>';
            } else {

                $output .= ' <p  class="fs-6 text-800  fw-bold"
                style="color:red; margin-top:10px; background-color:#F5F8FA; padding:10px; border-radius:5px;"> '
                    . 'No Result' .
                    '</p>';
            }

            return $output;
        }
    }

    public function addSubject(Request $request)
    {

        $question = Question::find($request->question_id);
        $question->subject_id = $request->subject_id;

        if ($question->update()) {
            return response()->json([
                'success' => true,
                'message' => 'Subject added'
            ]);
        }
    }
}
