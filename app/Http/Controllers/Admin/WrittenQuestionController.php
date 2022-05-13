<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Reply;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\WrittenQuestion;
use App\Models\QuestionInstruction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionParentInstruction;

class WrittenQuestionController extends Controller
{
    public function index()
    {
        $main_categories = MainCategory::all();
        $years = Year::all();
        return view('admin.written_ques.index', compact('main_categories', 'years'));
    }

    public function create(Request $request)
    {
        //dd($request->all());

        $number = $request->number;
        $type = $request->type;
        $view = view('admin.written_ques.input_layout', compact('number', 'type'))->render();

        return response([
            'html' => $view
        ]);
    }

    //Written Question store
    public function store(Request $request)
    {
        //dd($request->all());
        // $request->validate([
        //     'main_category' => ['required'],
        //     'sub_category' => ['required'],
        //     'subject' => ['required'],
        //     'year' => [$request->main_category == 3 ? 'nullable' : 'required'],
        //     'question.*' => ['required'],
        //     'question_no.*' => ['required'],
        //     'answer.*' => ['required'],

        // ]);
        if ($request->instruction_no) {
            $instruction = QuestionInstruction::create([
                'question_parent_instruction_id' => $request->parent_instruction,
                'main_category_id' => $request->main_category,
                'sub_category_id' => $request->sub_category,
                'subject_id' => $request->subject,
                'year_id' => $request->year,
                'instruction_no' => $request->instruction_no,
                'instruction' => $request->instruction,
                'created_user_id' => Auth::guard('admin')->user()->id
            ]);
        }


        //question save
        foreach ($request->question as $key => $value) {

            if (\strlen($value) > 1) {
                if ($request->main_category == 3) {
                    $year = null;
                } else {
                    $year = $request->year;
                }
                //question save
                $question = new WrittenQuestion();

                if ($request->instruction_no) {
                    $question->question_instruction_id = $instruction->id;
                }
                if ($request->parent_instruction_no) {
                    $question->question_parent_instruction_id = $request->parent_instruction_no[$key];
                }
                $question->subject_id = $request->subject;
                $question->sub_category_id = $request->sub_category;
                $question->main_category_id = $request->main_category;
                $question->year_id = $year;
                $question->mark = $request->mark[$key];
                $question->question = $request->question[$key];
                $question->question_no = $request->question_no[$key];
                $question->question_or = $request->question_or[$key];
                $question->answer = $request->answer[$key];
                $question->status = 'active';
                $question->created_user_id = Auth::guard('admin')->user()->id;
                $question->slug = Str::slug(Str::limit($request->question[$key], 80));
                //dd($question->slug);
                $question->save();
            }
        }
        return redirect()->back()->with('success', 'Question created successfully');
    }

    public function show(Request $request)
    {
        $sub_categories = WrittenQuestion::with('sub_category')->groupBy('sub_category_id')->get();
        $load = 'false';
        $parent_instructions = null;
        $details = null;
        //dd($questions);
        if ($request->has('sub_category')) {
            //dd('here');
            $details = SubCategory::find($request->sub_category);
            $parent_instructions = QuestionParentInstruction::with('questions', 'question_instruction')->where('sub_category_id', $request->sub_category)->get();
            $load = 'true';
        }
        //dd($instructions);
        return view('admin.written_ques.view_question', compact('parent_instructions', 'sub_categories', 'details', 'load'));
    }


}
