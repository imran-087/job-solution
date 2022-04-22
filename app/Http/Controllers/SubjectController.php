<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Question;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index($subject = 'all')
    {
        //dd($subject);
        if ($subject !== 'all') {

            $subject = Subject::find($subject);
            // dd($subject);
            $subject_topics = Subject::where('parent_id', $subject->id)->get();
            //dd($subject_topics);
            $subject_questions = Question::with('question_option')->where('subject_id', $subject->id)->paginate(15);
            return view('subject._subjectdetails', compact('subject_topics', 'subject', 'subject_questions'));
        } else {
            $type = MainCategory::where('slug', Auth::user()->user_type)->first();
            $subjects = Subject::whereIsRoot()->where('main_category_id', $type->id)->get();
            return view('subject.all_subject', compact('subjects'));
        }
    }
}
