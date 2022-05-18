<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\WrittenAnswer;
use App\Models\WrittenQuestionTest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WrittenQuestionTestController extends Controller
{
    public function index()
    {
        $main_categories = MainCategory::all();
        $years = Year::all();
        return view('admin.written_ques_test.index', compact('main_categories', 'years'));
    }


    public function create(Request $request)
    {
        //dd($request->all());
        $number = $request->number;
        $view = view('admin.written_ques_test.input_layout', compact('number'))->render();

        return response([
            'html' => $view
        ]);
    }

    public function getInstruction(Request $request)
    {
        $instruction = WrittenQuestionTest::where([
            'sub_category_id' => $request->sub_category,
            'subject_id' => $request->subject,
            'question_instruction' => true
        ])->orderBy('id', 'desc')->get();

        return response()->json($instruction);
    }

    // //Written Question store
    public function store(Request $request)
    {
        //dd($request->all());

        //validation
        $validator = Validator::make($request->all(), [
            'main_category' => ['required'],
            'sub_category' => ['required'],
            'subject' => ['required'],
            'year' => [$request->main_category == 3 ? 'nullable' : 'required'],
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
                    $question = new WrittenQuestionTest();

                    $question->main_category_id = $request->main_category;
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
                            $written_ans->written_question_test_id = $question->id;
                            $written_ans->answer = $request->answer[$key];
                            $written_ans->save();
                        }
                    }

                    if ($request->instruction && $request->instruction !== '' && $request->instruction !== 'none') {
                        $parent = WrittenQuestionTest::find($request->instruction);
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

    //show question
    public function show(Request $request)
    {
        $sub_categories = WrittenQuestionTest::with('sub_category')->groupBy('sub_category_id')->get();
        $load = 'false';
        $exam_detail = null;
        $questions = null;
        //dd($questions);
        if ($request->has('sub_category')) {
            //dd('here');
            $exam_detail = SubCategory::find($request->sub_category);
            $questions = WrittenQuestionTest::with('answer')->where('sub_category_id', $request->sub_category)->get()->toTree();

            $load = 'true';
        }
        //dd($parent_instructions);
        return view('admin.written_ques_test.view_question', compact('questions', 'sub_categories', 'exam_detail', 'load'));
    }


    //edit question
    public function edit($id, $type)
    {

        $question = WrittenQuestionTest::with('answer')->where('id', $id)->first();
        //dd($question);
        $view = view('admin.written_ques_test.edit', compact('question', 'type'))->render();

        return response([
            'html' => $view
        ]);
    }

    public function update(Request $request)
    {
        //dd($request->all());

        $written_question = WrittenQuestionTest::find($request->question_id);
        $written_question->question = $request->question;

        if ($request->type == 0) {
            $written_ans = WrittenAnswer::where('written_question_test_id', $request->question_id)->first();
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
}
