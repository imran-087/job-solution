<?php

namespace App\Http\Controllers;

use App\Models\Passage;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class JobMcqQuestionController extends Controller
{
    public function jobMcqQuestion(Request $request)
    {
        // dd($request->sub_category);
        //dd($request->all());
        if ($request->has('sub_category')) {

            $sub_category = SubCategory::find($request->sub_category);
            //dd($sub_category);
            $questions = Question::with('subject')->where([
                'sub_category_id' => $request->sub_category,
            ])->groupBy('subject_id')->get();
            $passages = Passage::with('questions')->where('sub_category_id', $request->sub_category)->get();
        } else {

            $sub_category = SubCategory::find($request->sub_cat);

            $questions = Question::with('subject')->where([
                'sub_category_id' => $request->sub_cat,
                'subject_id' => $request->subject,
            ])->groupBy('subject_id')->get();

            $passages = Passage::with('questions')->where([
                'sub_category_id' => $request->sub_cat,
                'subject_id' => $request->subject
            ])->get();
        }
      
        return view('jobs.mcq.index', compact('questions', 'passages', 'sub_category'));
    }
}
