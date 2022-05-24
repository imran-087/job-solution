<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Description;
use Illuminate\Http\Request;
use App\Models\WrittenQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WrittenDescriptionController extends Controller
{
    //store description
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

            $description = new Description();
            $description->description = $request->description;
            $description->created_user_id =  Auth::guard('admin')->user()->id;
            $description->created_at = Carbon::now();

            $question = WrittenQuestion::find($request->question_id);
            //dd($question);

            if ($question->descriptions()->save($description)) {
                return response()->json([
                    'success' => true,
                    'message' => 'Description saved successfully!'
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
