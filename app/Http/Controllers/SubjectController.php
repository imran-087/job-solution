<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;

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
            $subjects = Subject::whereIsRoot()->get();
            return view('subject.all_subject', compact('subjects'));
        }
    }
}
