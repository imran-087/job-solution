<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Reply;
use App\Models\Subject;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\WrittenAnswer;
use App\Models\WrittenQuestion;
use App\Models\QuestionInstruction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionParentInstruction;
use Illuminate\Support\Facades\Validator;

class WrittenQuestionController extends Controller
{
    public function index(Request $request)
    {

        $years = Year::select('id', 'year')->get();
        $total_input_by_auth_user = Question::where('created_user_id', Auth::id())->select('created_user_id')->select('id')->get();

        if ($request->has('sub_category')) {
            $sub_category = SubCategory::where('id', $request->sub_category)->first();
            $main_category = $request->main_category;
            $subjects = Subject::with('sub_category', 'main_category')
                ->where(['sub_category_id' => $request->sub_category, 'status' => 'active'])
                ->get();
            if ($subjects->count() > 0) {
                return view('admin.written_ques.create', compact('sub_category', 'main_category', 'subjects', 'total_input_by_auth_user', 'years'));
            } else {
                if ($sub_category->category->main_category->id == 1) {
                    $subjects = Subject::with('main_category')
                        ->where(['status' => 'active', 'parent_id' => null, 'main_category_id' => 1, 'sub_category_id' => 0])
                        ->get();
                    //dd($subject);
                    return view(
                        'admin.written_ques.create',
                        compact('sub_category', 'subjects',  'total_input_by_auth_user', 'main_category', 'years')
                    );
                } else {
                    $subjects = '';
                    return view('admin.written_ques.create', compact('sub_category',  'main_category', 'subjects', 'total_input_by_auth_user', 'years'));
                }
            }
        } else {
            $main_categories = MainCategory::select('id', 'name')->get();
            return view('admin.written_ques.index', compact('main_categories', 'years'));
        }
    }


    public function create(Request $request)
    {
        //dd($request->all());
        $number = $request->number;
        $view = view('admin.written_ques.input_layout', compact('number'))->render();

        return response([
            'html' => $view
        ]);
    }

    public function getInstruction(Request $request)
    {
        $instruction = WrittenQuestion::where([
            'sub_category_id' => $request->sub_category,
            'subject_id' => $request->subject,
            'question_instruction' => true
        ])->orderBy('id', 'desc')->get();

        return response()->json($instruction);
    }

    // //Written Question store
    public function store(Request $request)
    {
        dd($request->all());

        //validation
        $validator = Validator::make($request->all(), [
            'main_category' => ['required'],
            'category' => ['required'],
            'sub_category' => ['required'],
            'subject' => ['required'],
            // 'year' => [$request->main_category == 3 ? 'nullable' : 'required'],
            'question.*' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            //question save
            foreach ($request->question as $key => $value) {
                //dd('ok');
                if (\strlen($value) > 1) {

                    //question save
                    $question = new WrittenQuestion();

                    $question->main_category_id = $request->main_category;
                    $question->category_id = $request->category;
                    $question->sub_category_id = $request->sub_category;
                    $question->subject_id = $request->subject;
                    $question->year_id = $request->year;

                    $question->question_no = $request->question_no[$key];
                    $question->question = $request->question[$key];

                    $question->question_or = $request->question_or[$key];
                    $question->mark = $request->mark[$key];
                    $question->created_user_id = Auth::guard('admin')->user()->id;
                    $question->slug = Str::slug(Str::limit($request->question[$key], 80));

                    //save as instruction or not an instruction
                    if ($request->answer[$key] == null) {
                        $question->question_instruction = 1;
                    }

                    if ($question->save()) {
                        //dd($question);
                        //save written answer
                        if ($request->answer[$key] !== null) {
                            $written_ans = new WrittenAnswer();
                            $written_ans->written_question_id = $question->id;
                            $written_ans->answer = $request->answer[$key];
                            $written_ans->save();
                        }
                    }

                    if ($request->instruction && $request->instruction !== '' && $request->instruction !== 'none') {
                        $parent = WrittenQuestion::find($request->instruction);
                        $parent->appendNode($question);
                    }
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'Question created successfully'
            ]);
        }
    }

    
    //edit question
    public function edit($id, $type)
    {

        $question = WrittenQuestion::with('answer')->where('id', $id)->first();
        //dd($question);
        $view = view('admin.written_ques.edit', compact('question', 'type'))->render();

        return response([
            'html' => $view
        ]);
    }

    //update question
    public function update(Request $request)
    {
        //dd($request->all());

        $written_question = WrittenQuestion::find($request->question_id);
        $written_question->question = $request->question;
        $written_question->question_no = $request->question_no;

        if ($request->type == 0) {
            $written_ans = WrittenAnswer::where('written_question_id', $request->question_id)->first();
            $written_ans->answer = $request->answer;

            if ($written_question->update() && $written_ans->update()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Question updated'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed!'
                ]);
            }
        } else {
            if ($written_question->update()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Instruction updated'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed!'
                ]);
            }
        }
    }

    //show question
    // public function show(Request $request)
    // {
    //     $sub_categories = WrittenQuestion::with('sub_category')->groupBy('sub_category_id')->get();
    //     $load = 'false';
    //     $exam_detail = null;
    //     $questions = null;
    //     //dd($questions);
    //     if ($request->has('sub_category')) {
    //         //dd('here');
    //         $exam_detail = SubCategory::find($request->sub_category);
    //         $questions = WrittenQuestion::with(['answer', 'descriptions'])->where('sub_category_id', $request->sub_category)->get()->toTree();

    //         $load = 'true';
    //     }
    //     //dd($parent_instructions);
    //     return view('admin.written_ques.view_question', compact('questions', 'sub_categories', 'exam_detail', 'load'));
    // }
}
