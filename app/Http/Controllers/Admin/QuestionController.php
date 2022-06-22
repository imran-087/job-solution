<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\User;
use App\Models\Year;
use App\Models\Passage;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Question;
use App\Models\Description;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\EditedQuestion;
use App\Models\QuestionOption;
use App\Models\PreviewQuestion;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionDescription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuestionAddNotification;

class QuestionController extends Controller
{
    public function index(Request $request)
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
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->editColumn('question_type', function ($row) {
                    if ($row->question_type == "mcq") {
                        $btn = '<div class="badge badge-light-primary fw-bolder">MCQ</div>';
                    } else if ($row->question_type == "samprotik") {
                        $btn = '<div class="badge badge-light-info fw-bolder">Current</div>';
                    } else if ($row->question_type == "image") {
                        $btn = '<div class="badge badge-light-dark fw-bolder">Image</div>';
                    } else {
                        $btn = '<div class="badge badge-light-warning fw-bolder">Writting</div>';
                    }
                    return $btn;
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
                        <a href="edit-question?id=' . $row->id . '&ques=' . $row->slug . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
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
                ->rawColumns(['action', 'status', 'sub_category_id', 'subject_id', 'created_at', 'question_type'])
                ->make(true);
        }
        $sub_categories = SubCategory::all();
        return view('admin.question.question_index', compact('sub_categories'));
    }

    public function create(Request $request)
    {
        $main_categories = MainCategory::select('id', 'name')->get();
        $years = Year::select('id', 'year')->get();
        $questions = Question::where('created_user_id', Auth::id())->select('created_user_id')->get();

        if ($request->has('sub_category')) {
            $sub_category = SubCategory::where('id', $request->sub_category)->first();

            $subjects = Subject::with('sub_category', 'main_category')
                ->where(['sub_category_id' => $request->sub_category, 'status' => 'active'])
                ->get();
            if ($subjects->count() > 0) {
                return view('admin.question.create', compact('sub_category', 'main_categories', 'subjects', 'years', 'questions'));
            } else {
                if ($sub_category->category->main_category->id == 1) {
                    $subjects = Subject::with('main_category')
                        ->where(['status' => 'active', 'parent_id' => null, 'main_category_id' => 1, 'sub_category_id' => 0])
                        ->get();
                    //dd($subject);
                    return view(
                        'admin.question.create',
                        compact('sub_category', 'subjects', 'years', 'main_categories', 'questions')
                    );
                } else {
                    $subjects = '';
                    return view('admin.question.create', compact('sub_category', 'main_categories', 'subjects', 'years', 'questions'));
                }
            }
        } else {
            return view('admin.question.create', compact('main_categories', 'years', 'questions'));
        }
    }

    public function createQuestionInput(Request $request)
    {
        // dd($request->all());
        $number = $request->number;
        $type = $request->type;
        $option = $request->option;
        $view = view('admin.question.input_layout', compact('number', 'type', 'option'))->render();

        return response([
            'html' => $view
        ]);
    }



    //preview question
    public function preview(Request $request)
    {
        //dd($request->all());

        //filter empty input field
        $collection = collect($request->all())->toArray();
        function array_filter_recursive($input)
        {
            foreach ($input as &$value) {
                if (is_array($value)) {
                    $value = array_filter_recursive($value);
                }
            }
            return array_filter($input);
        }

        $collection = array_filter_recursive($collection);

        $count_question = count($collection['question']);
        //dd($count_question);
        //if this is an image question
        if ($request->type == 'image') {
            $this->store($request);
            return redirect()->route(
                'admin.question.show',
                [
                    'sub_category' => $request->sub_category,
                    'subject' => $request->subject,
                    'latest_input' => $count_question
                ]
            )->with('message', 'Question saved correctly!!!');
        } else { //without image

            $data['myForm'] = $collection;
            $data['main_categories'] = MainCategory::select('id', 'name')->get();
            $data['years'] = Year::select('id', 'year')->get();
            $data['count_question'] = $count_question;
            //dd($data);

            return view('admin.question.preview', $data);
        }
    }

    //Question store
    public function store(Request $request)
    {
        //dd($request->all());

        //validation
        // $validator = Validator::make($request->all(), [
        //     'main_category' => ['required'],
        //     'sub_category' => ['required'],
        //     'subject' => ['required'],
        //     'year' => [$request->main_category == 3 ? 'nullable' : 'required'],
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'errors' => $validator->errors()
        //     ], 200);
        // } else {


        //dd('ok');
        //question option images
        if ($request->file('image') != null) {
            //dd('ok');
            foreach ($request->file('image') as $key => $file) {
                //dump($file);
                $name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                // dump($name);

                //destinationPath
                $path = public_path() . '/uploads/question-images/option-img/';

                //resize image
                $imgFile = Image::make($file->getRealPath());
                $imgFile->resize(75, 75, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . $name, 80);

                //$file->move($path, $name);

                $image_path = 'uploads/question-images/option-img/' . $name;
                $Imgdata[] = $image_path;
                //dump($Imgdata);
                $total_question = count($request->question);
                if ($total_question > 1) {
                    $chunk_image = array_chunk($Imgdata, ceil(count($Imgdata) / $total_question));
                    //dump($chunk_image);
                }
            }
        }

        //question image
        if ($request->file('question_image') != null) {
            //dd('ok');
            foreach ($request->file('question_image') as $key => $file) {
                //dump($file);
                $name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                //dump($name);

                //destinationPath
                $path = public_path() . '/uploads/question-images/';

                //resize image
                $imgFile = Image::make($file->getRealPath());
                $imgFile->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . $name, 80);

                //$file->move($path, $name);

                $image_path = 'uploads/question-images/' . $name;
                $ImgdataQues[] = $image_path;
                //dump($ImgdataQues);
            }
        }

        //save passage
        if ($request->type == 'passage') {
            $passage = new Passage();
            $passage->passage = $request->passage;
            $passage->title = $request->title;
            $passage->sub_category_id = $request->sub_category;
            $passage->subject_id = $request->subject;
            $passage->slug = Str::slug($request->title);
            $passage->created_user_id = Auth::guard('admin')->user()->id;
            $passage->save();
        }

        $latest_input_record_number = 0;
        //question save
        foreach ($request->question as $key => $value) {
            if (\strlen($value) > 1) {

                $latest_input_record_number += 1;

                if ($request->main_category == 3) {
                    $year = null;
                } else {
                    $year = $request->year;
                }
                //question save
                $question = new Question();
                $question->subject_id = $request->subject;
                $question->sub_category_id = $request->sub_category;
                $question->main_category_id = $request->main_category;
                $question->year_id = $year;
                $question->passage_id = $passage->id ?? null;
                $question->question_type = $request->type;
                $question->hard_level = 1;
                $question->mark = 1;
                $question->question = $request->question[$key];
                $question->future_editable = 1;
                $question->lock_status = 'unlock';
                $question->status = 1;
                $question->created_user_id = Auth::guard('admin')->user()->id;
                $question->slug = Str::slug($request->question[$key]);
                //dd('here');
                if ($question->save()) {
                    $question_option = new QuestionOption();

                    $question_option->question_id = $question->id;

                    $question_option->option_1 = $request->option_1[$key] ?? null;
                    $question_option->option_2 = $request->option_2[$key] ?? null;
                    $question_option->option_3 = $request->option_3[$key] ?? null;
                    $question_option->option_4 = $request->option_4[$key] ?? null;
                    $question_option->option_5 = $request->option_5[$key] ?? null;

                    $question_option->answer = $request->answer[$key];

                    if (isset($chunk_image)) {
                        $question_option->image_option =  $chunk_image[$key];
                    } else if (isset($Imgdata)) {
                        $question_option->image_option =  $Imgdata;
                    }

                    if (isset($ImgdataQues)) {
                        $question_option->image_question =  $ImgdataQues[$key] ?? null;
                    }

                    $question_option->save();
                }
            }
        }

        //dd($latest_input_record_number);
        return redirect()->route(
            'admin.question.show',
            [
                'sub_category' => $request->sub_category,
                'subject' => $request->subject,
                'latest_input' => $latest_input_record_number
            ]
        )->with('message', 'Question saved correctly!!!');
    }

    public function show(Request $request)
    {
        $subject = Subject::select('name', 'id')
            ->where('id', $request->subject)
            ->with('sub_category')->first();

        $questions = Question::with('question_option')
            ->latest()->take($request->latest_input)->get();

        return view('admin.mcq.latest_insert_show', compact('questions', 'subject'));
    }


    //edit question
    public function editQuestion(Request $request)
    {
        $id = $request->id;
        $years = Year::all();
        $question = Question::find($id);
        //dd($question->toArray());
        $question_option = QuestionOption::where('question_id', $id)->first();
        $sub_category = SubCategory::where('id', $question->sub_category_id)->first();
        $main_categories = MainCategory::all();
        $subjects = Subject::where('sub_category_id', $question->sub_category_id)->get();
        if ($subjects->count() == 0) {

            $subjects = Subject::where('sub_category_id', 0)->get();
        }
        //dd($subjects);
        //dd($question_options->toArray());
        return view('admin.question.edit_question', compact(['subjects', 'question', 'years', 'main_categories',  'question_option', 'sub_category']));
    }

    //update question
    public function update(Request $request)
    {
        dd($request->all());
        $question = Question::where('id', $request->id)->update([
            'subject_id' => $request->subject,
            'sub_category_id' => $request->sub_category,
            'year_id' => $request->year,
            'passage_id' => $request->passage,
            'question_type' => $request->question_type,
            'hard_level' => $request->hard_level,
            'mark' => $request->mark,
            'question' => $request->question,
            'updated_user_id' => Auth::guard('admin')->user()->id
        ]);

        $question_option_data = [
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'option_5' => $request->option_5,
            'answer' => $request->mcq_answer,
        ];

        $question_option = QuestionOption::where('question_id', $request->id)
            ->update($question_option_data);

        //save question description
        if ($request->description != null) {

            $description = new Description();
            $description->description = $request->description;
            $description->created_user_id =  Auth::guard('admin')->user()->id;
            $description->created_at = Carbon::now();

            $question = Question::find($request->id);

            $question->descriptions()->save($description);
        }

        if ($question && $question_option) {
            Session::flash('success', 'Question updated successfull');
            return redirect()->back();
        } else {
            Session::flash('error', 'Failed..Something went wrong !');
            return redirect()->back();
        }
    }

    //deleteQuestion
    public function deleteQuestion($id)
    {
        //dd($id);
        $question = Question::find($id);
        $question_option = QuestionOption::find($question->id);
        $question->delete();
        $question_option->delete();

        return response()->json([
            'success' => true,
            'message' => 'Question deleted successfully!'
        ], 200);
    }


    //new mcq folder
    public function getMainCategory()
    {
        $data = Category::where('main_category_id', 1)->with('main_category')->get();
        return view('admin.mcq.index', compact('data'));
    }

    public function getSubCategory(Request $request)
    {
        //dd($request->all());
        // if ($request->main_category == 1) {
        $sub_categories = SubCategory::where('category_id', $request->id)->select('id', 'name')
            ->withCount('question')
            ->get();

        $subject_analytics = [];
        foreach ($sub_categories as $sub_category) {

            $questions = Question::whereBelongsTo($sub_category)
                ->select('id', 'subject_id', DB::raw('count(*) as total'))
                ->groupBy('subject_id')->with(['subject' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->get();
            $subject_analytics = $questions;
        }
        dump($subject_analytics);
        dd('end');



        $view = view('admin.mcq.sub_category', compact('sub_categories', 'subject_analytics', 'subject_question_count', 'total_question'))->render();
        return response()->json([
            'success' => true,
            'html' => $view
        ]);
    }

    //all question
    public function allQuestion(Request $request)
    {
        dd($request->all());
        if ($request->has('sub_category')) {

            $sub_category = SubCategory::find($request->sub_category)->first();

            $questions = Question::with('subject')->where([
                'sub_category_id' => $request->sub_category
            ])->groupBy('subject_id')->get();
            $passages = Passage::with('questions')->where('sub_category_id', $request->sub_category)->get();
        } else {

            $sub_category = SubCategory::find($request->sub_cat)->first();

            $questions = Question::with('subject')->where([
                'sub_category_id' => $request->sub_cat,
                'subject_id' => $request->subject
            ])->groupBy('subject_id')->get();

            $passages = Passage::with('questions')->where([
                'sub_category_id' => $request->sub_cat,
                'subject_id' => $request->subject
            ])->get();
        }
        //dd($questions);
        return view('admin.mcq.view_question', compact('questions', 'passages', 'sub_category'));

        // for ajax pagination
        // if ($request->ajax()) {
        //     $view = view('admin.mcq.all-question', compact('questions'))->render();
        //     return response()->json(['html' => $view]);
        // }

    }

    //academy 
    public function academy()
    {
        $data = Category::where('main_category_id', 2)->get();
        return view('admin.mcq.academy.academy_index', compact('data'));
    }

    public function academySubCategory($id)
    {
        //dd($id);
        $sub_categories = SubCategory::where('category_id', $id)->get();
        // dd($categories);
        $view = view('admin.mcq.academy.sub_category', compact('sub_categories'))->render();
        return response()->json([
            'success' => true,
            'html' => $view
        ]);
    }

    public function academySubject($id)
    {
        $subjects = Subject::with('sub_category')->where(['sub_category_id' => $id, 'parent_id' => null])->get();
        $view = view('admin.mcq.academy.subject', compact('subjects'))->render();
        return response()->json([
            'success' => true,
            'html' => $view
        ]);
    }

    public function academySubjectMcq(Request $request)
    {
        $subject = Subject::find($request->subject);
        $subjects = Subject::descendantsAndSelf($request->subject)->pluck('id');
        //dd($subject);
        $questions = Question::whereIn('subject_id', $subjects)->with('question_option', 'descriptions')->get();
        //dd($questions);
        $passages = Passage::with('questions')->where([
            'subject_id' => $request->subject
        ])->get();
        return view('admin.mcq.academy.question', compact('questions', 'passages', 'subject'));
    }
}
