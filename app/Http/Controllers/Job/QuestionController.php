<?php

namespace App\Http\Controllers\Job;

use App\Models\Passage;
use App\Models\Subject;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\EditedQuestion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $sub_category = SubCategory::where('id', $request->sub_cat)->with(['category' => function ($query) {
            $query->select('id', 'name');
        }])->select('id', 'name', 'category_id')->first();
        
        $sub_categories = SubCategory::where(
            'category_id', $sub_category->category->id
        )->where('id', '!=', $request->sub_cat)->select('id', 'name')->inRandomOrder()->limit(5)->get();
        //dd($sub_categories);

        $subjects = Question::whereBelongsTo($sub_category)
            ->select('id', 'subject_id', DB::raw('count(*) as total'))
            ->groupBy('subject_id')->with(['subject' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();
        // dd($subjects);

        $subject = Subject::where('id', $request->subject)->first();
        
        //all Question
        if($request->subject == 'all'){
            $questions = Question::where([
                'sub_category_id' => $request->sub_cat,
                'passage_id' => '0'
            ])->with('question_option')->get();

            $passages = Passage::where([
                'sub_category_id' => $request->sub_cat
                ])->with(['questions' => function ($query) {
                $query->with('question_option');
            }])->get();
        }else{
            //single subject Question
            $questions = Question::where([
                'sub_category_id' => $request->sub_cat,
                'subject_id' => $request->subject,
                'passage_id' => '0'
            ])->with('question_option')->get();
            // dd($questions); 

            $passages = Passage::where([
                'sub_category_id' => $request->sub_cat,
                'subject_id' => $request->subject
            ])->with(['questions' => function ($query) {
                $query->with('question_option');
            }])->get();
            //dd($passages);

        }
       

        return view('job.job_question', compact('subject', 'subjects', 'sub_category', 'sub_categories', 'questions', 'passages'));
    }

    public function singleQuestion(Request $request)
    {
        $question = Question::where('id', $request->ques_id)->with([
            'question_option', 'passage'
        ])->first();

        //increase view
        $question->view_count = $question->view_count + 1;
        $question->save();

        return view('job.job_single_ques', compact('question'));
    }

    /**Edit Question **/
    public function edit($id)
    {
        $question = Question::where('id', $id)->with('question_option')->first();
        $view = view('job.job_include.edit_question_modal', compact('question'))->render();
        return response([
            'html' => $view
        ]);
    }

    /**Store Edit **/
    public function update(Request $request)
    {
        //dd($request->all());

        if (!Auth::check()) {
            //dd('unthenticate');
            return response()->json([
                'error' => true,
                'message' => __('To edit a question you have to login')
            ]);
        } else {
            //dd($request->all());
            $question = new EditedQuestion();
            $question->question_id = $request->question_id;
            $question->question = $request->question;
            $question->user_id = Auth::user()->id;

            $question->option_1 = $request->option_1;
            $question->option_2 = $request->option_2;
            $question->option_3 = $request->option_3;
            $question->option_4 = $request->option_4;
            $question->option_5 = $request->option_5;
            $question->status = 'pending';
            $question->answer = $request->answer;
         
            if ($question->save()) {
                return response()->json([
                    'success' => true,
                    'message' => __('Question update request has been sent! Thanks for helping us...')
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => __('Failed!.')
                ]);
            }
        }
    }
}
