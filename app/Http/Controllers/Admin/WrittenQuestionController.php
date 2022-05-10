<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Reply;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\WrittenQuestion;
use App\Http\Controllers\Controller;
use App\Models\QuestionInstruction;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

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
        $view = view('admin.written_ques.input_layout', compact('number'))->render();

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

        $instruction = QuestionInstruction::create([
            'main_category_id' => $request->main_category,
            'sub_category_id' => $request->sub_category,
            'subject_id' => $request->subject,
            'year_id' => $request->year,
            'instruction_no' => $request->instruction_no,
            'instruction' => $request->instruction,
            'created_user_id' => Auth::guard('admin')->user()->id
        ]);

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

                $question->instruction_id = $instruction->id;
                $question->subject_id = $request->subject;
                $question->sub_category_id = $request->sub_category;
                $question->main_category_id = $request->main_category;
                $question->year_id = $year;
                $question->mark = $request->mark[$key];
                $question->question = $request->question[$key];
                $question->question_no = $request->question_no[$key];
                $question->answer = $request->answer[$key];
                $question->status = 'active';
                $question->created_user_id = Auth::guard('admin')->user()->id;
                $question->slug = Str::slug($request->question[$key]);
                //dd('here');
                $question->save();
            }
        }
        return redirect()->back()->with('success', 'Question created successfully');
    }

    public function show(Request $request)
    {
        $sub_categories = WrittenQuestion::with('sub_category')->groupBy('sub_category_id')->get();
        $load = 'false';
        $questions = null;
        $details = null;
        //dd($questions);
        if ($request->has('sub_category')) {
            //dd('here');
            $details = SubCategory::find($request->sub_category);
            $instructions = QuestionInstruction::with('questions')->where('sub_category_id', $request->sub_category)->get();
            $load = 'true';
        }
        //dd($instructions);
        return view('admin.written_ques.view_question', compact('instructions', 'sub_categories', 'details', 'load'));
    }
}
