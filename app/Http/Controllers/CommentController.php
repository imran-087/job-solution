<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'comment' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            //create new category
            if (Auth::check()) {
                $question = Question::find($request->question_id);
                $question->comments()->create([
                    'content' => $request->comment,
                    'user_id' => Auth::user()->id,
                ]);

                if ($question) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Comment added successfully! Thanks for your comment....'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed!.'
                    ]);
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Please, login to add a comment'
                ]);
            }
        }
    }
}
