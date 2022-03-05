<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Subject;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Subject::select();

            //filter
            if (isset($request->status) && $request->status != "all") {
                $data->where('status', $request->status);
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == "active") {
                        $btn = '<div class="badge badge-light-success fw-bolder">Active</div>';
                    } else {
                        $btn = '<div class="badge badge-light-danger fw-bolder">Deactive</div>';
                    }
                    return $btn;
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
                ->rawColumns(['action', 'status', 'created_at'])
                ->make(true);
        }

        //get all main category
        $main_categories = MainCategory::all();
        $parent_subjects = Subject::where('parent_id', 0)->get();
        return view('admin.category.subject', compact(['main_categories', 'parent_subjects']));
    }

    //create or update main category
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'title' => ['required'],
            'status' => ['required'],
            'sub_category' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if (isset($request->subject_id) &&  $subject = Subject::find($request->subject_id)) { //update
                //dd($request->subject_id);
                $subject->name = $request->name;
                $subject->title = $request->title;
                $subject->description = $request->description;
                $subject->parent_id = $request->parent ?? 0;
                $subject->status =  $request->status;
                $subject->sub_category_id =  $request->sub_category;
                $subject->slug =  Str::slug($request->name);
                $subject->updated_user_id =  Auth::guard('admin')->user()->id;

                $subject->updated_at = Carbon::now();

                //track edited category
                $subject->edited_categories()->create([
                    'category' => $request->name,
                    'editor_id' => Auth::guard('admin')->user()->id,
                    'status' => $request->status
                ]);

                //edited description tracker
                if (strlen($subject->description != strlen($request->description))) {
                    $subject->edited_descriptions()->create([
                        'description' => $request->description,
                        'editor_id' => Auth::guard('admin')->user()->id,
                        'status' => 'active'
                    ]);
                }



                if ($subject->update()) {
                    return response()->json([
                        'success' => true,
                        'message' => __('Subject updated successfully!')
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => __('Failed!.')
                    ]);
                }
            } else { //create new category

                $subject = new Subject();

                $subject->name = $request->name;
                $subject->title = $request->title;
                $subject->parent_id = $request->parent ?? 0;
                $subject->description = $request->description;
                $subject->status =  $request->status;
                $subject->sub_category_id =  $request->sub_category;
                $subject->slug =  Str::slug($request->name);
                $subject->created_user_id =  Auth::guard('admin')->user()->id;

                $subject->created_at = Carbon::now();


                if ($subject->save()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Subject saved successfully!'
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
    public function getSubject($id)
    {
        //dd($id);
        $subject = Subject::find($id);
        $sub_category = SubCategory::where('id', $subject->sub_category_id)->first();
        $category = Category::where('id', $sub_category->category_id)->first();
        $main_category = MainCategory::where('id', $category->main_category_id)->first();
        $data = [
            'subject' => $subject,
            'sub_category' => $sub_category,
            'category' => $category,
            'main_category' => $main_category,
        ];
        return response($data);
    }

    //deleteCategory
    public function deleteSubject($id)
    {
        $subject = Subject::find($id);

        $subject->delete();

        return response()->json([
            'success' => true,
            'message' => 'Subject deleted successfully!'
        ], 200);
    }
}
