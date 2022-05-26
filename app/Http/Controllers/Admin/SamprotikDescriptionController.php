<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Description;
use Illuminate\Http\Request;
use App\Models\SamprotikQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SamprotikDescriptionController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $description = new Description();
        $description->description = $request->description;
        $description->created_user_id =  Auth::guard('admin')->user()->id;
        $description->created_at = Carbon::now();

        $question = SamprotikQuestion::find($request->question);
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

    //update description
    public function update(Request $request)
    {
        //dd($request->all());
        $description = Description::where('id', $request->description_id)->update([
            'description' => $request->description,
            'updated_user_id' => Auth::guard('admin')->id(),
            'updated_at' => Carbon::now()
        ]);
        if ($description) {
            return response()->json([
                'success' => true,
                'message' => 'Description updated!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!.'
            ]);
        }
    }
}
