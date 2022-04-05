<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;

class QuestionActivityController extends Controller
{
    // view question 
    public function viewCount($id)
    {
        $question = Question::find($id);
        $question->view_count = $question->view_count + 1;

        $question->save();
    }

    //like question
    public function vote($id)
    {
        $question = Question::find($id);
        $question->vote = $question->vote + 1;

        if ($question->save()) {
            return response()->json([
                'success' => true,
                'message' => 'You liked this Question!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!.'
            ]);
        }
    }

    //check question answer
    public function checkAnswer($id, $option)
    {
        $question_option = QuestionOption::find($id);
        if ($question_option->answer == $option) {
            return response()->json([
                'success' => true,
                'message' => 'Correct answer'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Incorrect answer'
            ], 200);
        }
    }

    public function bookmark($id, $catid)
    {
        //dump($id);
        if (!Auth::check()) {
            //dd('ok');
            return response()->json([
                'error' => true,
                'message' => 'Please login in first.'
            ]);
        } else {
            $bookmark = Bookmark::where('question_id', $id)->first();
            if ($bookmark === null) {
                $bookmark = new Bookmark();
                $bookmark->question_id = $id;
                $bookmark->category_id = $catid;
                $bookmark->user_id = Auth::user()->id;

                if ($bookmark->save()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Bookmarked Added!'
                    ], 200);
                }
            } else {
                if ($bookmark->question_id == $id && $bookmark->user_id == Auth::user()->id) {
                    return response()->json([
                        'error' => true,
                        'message' => 'You alreday bookmarked this question!.'
                    ]);
                }
            }
        }
    }
}
