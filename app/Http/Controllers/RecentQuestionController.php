<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Year;
use App\Models\Question;
use Illuminate\Http\Request;

class RecentQuestionController extends Controller
{

    public function recentQuestion()
    {
        $years = Year::all();
        $questions = Question::with('question_option')->where('question_type', 'samprotik')->paginate(15);
        //dd($questions);
        return view('question.samprotik-question', compact('questions', 'years'));
    }

    public function recentQuestionFilter(Request $request)
    {
        $years = Year::all();
        if ($request->range == null) {
            $questions = Question::with('question_option')->where(['question_type' => 'samprotik', 'year_id' => $request->year])->paginate(15);
        } elseif ($request->year == null) {
            if ($request->range == 'last_7') {
                //dd('here');
                $questions = Question::with('question_option')->where('question_type', 'samprotik')
                    ->whereDate('created_at', Carbon::now()->subDays(7))
                    ->paginate(15);
            }
            if ($request->range == 'last_30') {
                //dd('here');
                $questions = Question::with('question_option')->where('question_type', 'samprotik')
                    ->whereDate('created_at', Carbon::now()->subDays(30))
                    ->paginate(15);
            }
            if ($request->range == 'last_month') {
                //dd('here');
                $questions = Question::with('question_option')->where('question_type', 'samprotik')
                    ->whereBetween(
                        'created_at',
                        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
                    )
                    ->paginate(15);
            }
            if ($request->range == 'this_month') {
                //dd('here');
                $questions = Question::with('question_option')->where('question_type', 'samprotik')
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->paginate(15);
            }
            if ($request->range == 'today') {
                //dd('here');
                $questions = Question::with('question_option')->where('question_type', 'samprotik')
                    ->whereDate('created_at', Carbon::today())
                    ->paginate(15);
            }
            if ($request->range == 'yesterday') {
                //dd('here');
                $questions = Question::with('question_option')->where('question_type', 'samprotik')
                    ->whereDate('created_at', Carbon::yesterday())
                    ->paginate(15);
            }
        }
        return view('question.samprotik-question', compact('questions', 'years'));
    }
}
