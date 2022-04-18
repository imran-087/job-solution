<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    public function addTag(Request $request)
    {

        if ($request->ajax()) {
            $data = Question::select();

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

                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text"  class="form-control form-control-solid w-350px ps-14 search_tag" id="search_tag" placeholder="search tag">
                                <input type="hidden" name="question_id" value=' . $row->id . '>
                                
                            </div>
                            <div id="result"></div>';
                    return $btn;
                })
                ->rawColumns(['action', 'status', 'sub_category_id', 'subject_id', 'created_at', 'question_type'])
                ->make(true);
        }
        $sub_categories = SubCategory::all();
        return view('admin.tag.index', compact('sub_categories'));
    }

    public function searchTag(Request $request)
    {
        if ($request->ajax()) {

            //dd('here');
            $data = Subject::where('name', 'LIKE', '%' . $request->search . '%')
                ->get();

            $output = '';

            if (count($data) > 0) {

                //$output = '<ul class="list-group" style="display: block; position: relative; z-index: 1;">';


                foreach ($data as $row) {
                    $output .=
                        '<div class="d-flex align-items-center mb-5"
                            style="margin:0px 30px 20px 30px; background-color:#F5F8FA; border-radius:5px !important; padding:10px;">
                            <div class="symbol symbol-40px me-4 "></div>
                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold" >' . $row->name . '</a>
                            </div>
                            <!--end::Title-->
                        </div>';
                    //$output .= '<a href="discussion/' . $row->id . '/show"><li class="list-group-item" style=" border-radious:10px">' . $row->title . '</li></a>';
                }

                //$output .= '</ul>';
            } else {

                $output .= ' <p  class="fs-6 text-800  fw-bold"
                style="color:red; margin:0px 30px 20px 30px; background-color:#F5F8FA; padding:10px; border-radious:30px;"> '
                    . 'No Result' .
                    '</p>';
            }

            return $output;
        }
    }
}
