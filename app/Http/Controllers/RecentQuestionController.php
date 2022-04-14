<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Year;
use App\Models\Question;
use Illuminate\Http\Request;

class RecentQuestionController extends Controller
{

    public function recentQuestion(Request $request)
    {
        $years = Year::all();

        if ($request->has('today')) {
            //dd('today');
            $questions = Question::with('question_option')->where('question_type', 'samprotik')
                ->whereDate('created_at', Carbon::today())
                ->paginate(15);
        } elseif ($request->has('yesterday')) {
            //dd('yeaterday');
            $questions = Question::with('question_option')->where('question_type', 'samprotik')
                ->whereDate('created_at', Carbon::yesterday())
                ->paginate(15);
        } elseif ($request->has('last_7_days')) {
            //dd('last_7');
            $questions = Question::with('question_option')->where('question_type', 'samprotik')
                ->whereDate('created_at', Carbon::now()->subDays(7))
                ->paginate(15);
        } elseif ($request->has('last_30_days')) {
            //dd('last_30');
            $questions = Question::with('question_option')->where('question_type', 'samprotik')
                ->where('created_at', Carbon::now()->subDays(30))
                ->paginate(15);
        } elseif ($request->has('last_month')) {
            //dd('last_month');
            $questions = Question::with('question_option')->where('question_type', 'samprotik')
                ->whereBetween(
                    'created_at',
                    [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
                )
                ->paginate(15);
        } elseif ($request->has('this_month')) {
            //dd('this month');
            $questions = Question::with('question_option')->where('question_type', 'samprotik')
                ->whereMonth('created_at', Carbon::now()->month)
                ->paginate(15);
        } elseif ($request->has('year')) {
            //dd('year');
            $questions = Question::with('question_option')->where(['question_type' => 'samprotik', 'year_id' => $request->year])->paginate(15);
        } else {
            $questions = Question::with('question_option')->where('question_type', 'samprotik')->paginate(15);
        }

        //dd($questions);
        return view('question.samprotik-question', compact('questions', 'years'));
    }
}
