<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\QuestionDescription;
use App\Notifications\AddDescriptionNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $description = QuestionDescription::find($id);
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
}
