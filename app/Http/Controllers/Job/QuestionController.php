<?php

namespace App\Http\Controllers\Job;

use App\Models\Subject;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Passage;

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
}
