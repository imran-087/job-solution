<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Comment;
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
                $comment = new Comment();

                $comment->question_id = $request->question_id;
                $comment->comment = $request->comment;
                $comment->user_id =  Auth::user()->id;
                $comment->status =  'active';

                $comment->created_at = Carbon::now();


                if ($comment->save()) {
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
                    'message' => 'You have to login first!.'
                ]);
            }
        }
    }
}
