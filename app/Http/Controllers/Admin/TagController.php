<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Subject;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                        return $row->sub_category->name;
                    }
                })
                ->editColumn('subject_id', function ($row) {
                    if ($row->subject == '') {
                        return '<div class="badge badge-light-info fw-bolder">Current Ques.</div>';
                    } else {
                        return $row->subject->name;
                    }
                })
                ->addColumn('tag', function ($row) {
                    foreach ($row->pivotsubject as $tag) {
                        return '<div class="badge badge-success">' . $tag->name . '</div>';
                    }
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div >
                                <input type="text" data-subject_id="' . $row->subject_id . '" data-question_id="' . $row->id . '" class="form-control form-control-solid w-350px  search_tag"  placeholder="Type to search">
                                <div class="result" style="z-index:999"></div>
                            </div>';

                    return $btn;
                })
                ->rawColumns(['action', 'sub_category_id', 'subject_id', 'tag'])
                ->make(true);
        }
        $sub_categories = SubCategory::all();
        return view('admin.tag.index', compact('sub_categories'));
    }

    public function searchTag(Request $request)
    {
        if ($request->ajax()) {

            //dd($request->all());
            $data = Subject::whereDescendantOf($request->subject_id)
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->orderBy('id', 'desc')->get();
            //dd($data);

            $output = '';

            if (count($data) > 0) {

                //$output = '<ul class="list-group" style="display: block; position: relative; z-index: 1;">';

                foreach ($data as $row) {
                    $output .=
                        '<div class="d-flex align-items-center mb-2"
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

    public function addTag(Request $request)
    {
        if ($request->ajax()) {
            $question = Question::find($request->question_id);
            $question->pivotsubject()->sync($request->subject_id);

            // $tag->subject_id = $request->subject_id;
            // $tag->question_id = $request->question_id;

            if ($question->save()) {
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

    public function index2()
    {
        $questions = Question::paginate(10);
        return view('admin.tag.index_2', compact('questions'));
    }
}
