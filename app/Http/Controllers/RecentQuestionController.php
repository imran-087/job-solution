<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class RecentQuestionController extends Controller
{

    public function recentQuestion()
    {
        $questions = Question::with('question_option')->where('question_type', 'samprotik')->paginate(15);
        //dd($questions);
        return view('question.samprotik-question', compact('questions'));
    }
}
