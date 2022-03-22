<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Year;
use App\Models\Passage;
use App\Models\Subject;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use App\Http\Controllers\Controller;
use App\Models\EditedQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Question::select();

            //filter
            if (isset($request->status) && $request->status != "all") {
                $data->where('status', $request->status);
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('sub_category_id', function ($row) {
                    return $row->sub_category->name;
                })
                ->editColumn('subject_id', function ($row) {
                    return $row->subject->name;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == "active") {
                        $btn = '<div class="badge badge-light-success fw-bolder">Active</div>';
                    } else if ($row->status == "pending") {
                        $btn = '<div class="badge badge-light-warning fw-bolder">Pending</div>';
                    } else {
                        $btn = '<div class="badge badge-light-danger fw-bolder">Deactive</div>';
                    }
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="edit-question/' . $row->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <a href="javascript:;" onclick="deleteQuestion(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                ->rawColumns(['action', 'status', 'sub_category_id', 'subject_id', 'created_at'])
                ->make(true);
        }
        return view('admin.question.question_index');
    }

    public function create()
    {
        $question = 1;
        $option = 4;
        $type = 'mcq';

        $main_categories = MainCategory::all();
        $years = Year::all();
        $passages = Passage::get(['id', 'title']);

        return view('admin.question.create', compact(['question', 'option', 'type', 'main_categories', 'years', 'passages']));
        //return view('admin.question.create');
    }

    public function createQuestionInput(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'question' => 'required',
            'option' => 'required|max:5',
            'type' => 'required',
        ]);
        //dd($request->all());
        $question = $request->question;
        $option = $request->option;
        $type = $request->type;

        $main_categories = MainCategory::all();
        $years = Year::all();
        $passages = Passage::get(['id', 'title']);

        return view('admin.question.question_input', compact(['question', 'option', 'type', 'main_categories', 'years', 'passages']));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        //multiple image question
        if ($request->hasfile('image')) {
            //dd('ok');
            foreach ($request->file('image') as $key => $file) {
                //dd('option_'.$key);
                //    dump($file);
                //    echo "<br>";
                $name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                // dump($name);
                // echo "<br>";
                $path = public_path() . '/uploads/Img/QuestionImage/';
                $file->move($path, $name);
                $image_path = 'uploads/Img/QuestionImage/' . $name;
                $Imgdata[] = [
                    'option_' . $key => $image_path
                ];
                //dump($Imgdata);
                if (count($request->question) > 1) {
                    $chunk_image = array_chunk($Imgdata, ceil(count($Imgdata) / 2));
                }

                //dump($chunk_image);
                //dump($chunk_image[1]);
            }
        } //else {
        //     //dd('not ok');
        //     $chunk_image = 'NULL';
        // }

        //dd(json_encode($chunk_image));

        //question save
        foreach ($request->question as $key => $value) {
            if (\strlen($value) > 1) {
                //question save
                $question = new Question;
                $question->subject_id = $request->subject;
                $question->sub_category_id = $request->sub_category;
                $question->year_id = 1;
                $question->passage_id = $request->passage;
                $question->question_type = $request->type;
                $question->hard_level = 1;
                $question->mark = 1;
                $question->question = $request->question[$key];
                $question->future_editable = 1;
                $question->lock_status = 'lock';
                $question->status = 1;
                $question->created_user_id = Auth::guard('admin')->user()->id;
                $question->slug = Str::slug($request->question[$key]);

                $question->save();


                //question option and answer save
                $question_option = new QuestionOption();

                $question_option->question_id = $question->id;

                if ($request->type == 'written') {
                    $question_option->written_answer = $request->written_answer[$key];
                } else {
                    $question_option->option_1 = $request->option_1[$key] ?? '';
                    $question_option->option_2 = $request->option_2[$key] ?? '';
                    $question_option->option_3 = $request->option_3[$key] ?? '';
                    $question_option->option_4 = $request->option_4[$key] ?? '';
                    $question_option->option_5 = $request->option_5[$key] ?? '';
                    $question_option->answer = $request->answer[$key];

                    if (isset($chunk_image)) {
                        $question_option->image_option =  json_encode($chunk_image[$key]);
                    } else if (isset($Imgdata)) {
                        $question_option->image_option =  json_encode($Imgdata);
                    }
                }

                $question_option->save();

                //tag
                $tag = Tag::create([
                    'subject_id' => $request->subject,
                    'question_id' => $question->id,
                ]);
            }
        }

        Session::flash('success', 'Question created successfully');
        return redirect()->route('admin.question.index');
    }

    //edit question
    public function editQuestion($id)
    {

        $years = Year::all();
        $passages = Passage::all();
        $question = Question::find($id);
        //dd($question->toArray());
        $question_option = QuestionOption::where('question_id', $id)->first();
        $sub_category = SubCategory::where('id', $question->sub_category_id)->first();
        $subjects = Subject::where('sub_category_id', $question->sub_category_id)->get();
        //dd($question_options->toArray());
        return view('admin.question.edit_question', compact(['subjects', 'question', 'years', 'passages', 'question_option', 'sub_category']));
    }

    //update question
    public function update(Request $request)
    {
        //dd($request->all());
        $question = Question::where('id', $request->id)->update([
            'subject_id' => $request->subject,
            'sub_category_id' => $request->sub_category,
            'year_id' => $request->year,
            'passage_id' => $request->passage,
            'question_type' => $request->question_type,
            'hard_level' => $request->hard_level,
            'mark' => $request->mark,
            'question' => $request->question,
            'future_editable' => $request->future_editable,
            'lock_status' => $request->lock_status,
            'status' => $request->status,
            'updated_user_id' => Auth::guard('admin')->user()->id,
        ]);

        $question_option_data = [
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'option_5' => $request->option_5,
            'answer' => $request->mcq_answer,
            'written_answer' => $request->written_answer,
        ];

        $question_option = QuestionOption::where('question_id', $request->id)
            ->update($question_option_data);

        if ($question) {
            Session::flash('success', 'Question updated successfull');
            return redirect()->route('admin.question.index');
        } else {
            Session::flash('error', 'Question updated successfull');
            return redirect()->back();
        }

        // Session::flash('success', 'Question updated successfull');
        // return redirect()->route('admin.question.index');
    }

    //deleteQuestion
    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $question_option = QuestionOption::find($question->id);
        $question->delete();
        $question_option->delete();

        return response()->json([
            'success' => true,
            'message' => 'Question deleted successfully!'
        ], 200);
    }
}
