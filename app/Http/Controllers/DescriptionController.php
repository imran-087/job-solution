<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vote;
use App\Models\Admin;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionDescription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Notifications\AddDescriptionNotification;

class DescriptionController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            if (!Auth::check()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Login first to add a description!.'
                ]);
            } else {
                //create new description

                $question_des = new QuestionDescription();

                if ($request->samprotik == 'samprotik') {
                    $question_des->samprotik_ques_id = $request->question_id;
                } else {
                    $question_des->question_id = $request->question_id;
                }
                $question_des->description = $request->description;
                $question_des->created_user_id =  Auth::user()->id;
                $question_des->status =  'pending';

                $question_des->created_at = Carbon::now();


                if ($question_des->save()) {
                    //notification
                    $admin = Admin::where('id', 1)->first();
                    // dd($admin);
                    $admin->notify(new AddDescriptionNotification($question_des));

                    return response()->json([
                        'success' => true,
                        'message' => 'Description added successfully! Please wait for Admin Approval...'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed!.'
                    ]);
                }
            }
        }
    }

    public function like($id)
    {
        //dd($id);
        if (Auth::check()) {
            $description = QuestionDescription::find($id);

            $vote = Vote::where(['votable_id' => $id, 'votable_type' => 'App\Models\QuestionDescription', 'user_id' => Auth::user()->id])->first();
            if ($vote) {
                return response()->json([
                    'error' => true,
                    'message' => 'you already like this Description!'
                ]);
            } else {
                $description->votes()->create([
                    'user_id' => Auth::user()->id
                ]);

                $description->vote = $description->vote + 1;

                if ($description->save()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'You liked this Description!'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed!.'
                    ]);
                }
            }
        } else {
            return response()->json([
                'error' => true,
                'message' => 'You are unautheticate!.'
            ]);
        }
    }

    public function getdescription($id)
    {
        //dd($id);
        $question_des = QuestionDescription::find($id);
        $question = Question::where('id', $question_des->question_id)->first();

        $data = [
            'question_des' => $question_des,
            'question' => $question,
        ];
        return response($data);
    }

    //resubmit description
    public function resubmit(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            $question_des = QuestionDescription::find($request->question_des_id);

            $question_des->question_id = $request->question_id;
            $question_des->description = $request->description;
            $question_des->created_user_id =  Auth::user()->id;
            $question_des->status =  'pending';

            $question_des->created_at = Carbon::now();


            if ($question_des->save()) {
                //notification
                $admin = Admin::where('id', 1)->first();
                // dd($admin);
                $admin->notify(new AddDescriptionNotification($question_des));

                return response()->json([
                    'success' => true,
                    'message' => 'Description resubmission successfull! Please wait for Admin Approval...'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed!.'
                ]);
            }
        }
    }
}
