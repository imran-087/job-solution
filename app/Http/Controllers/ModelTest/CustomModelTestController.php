<?php

namespace App\Http\Controllers\ModelTest;

use App\Models\Question;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomModelTestController extends Controller
{
    public function create()
    {
        $main_categories = MainCategory::select('id', 'name')->get();
        return view('modeltest.custom.create', compact('main_categories'));
    }

    public function getData(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        $questions = Question::where([
            'main_category_id' => $request->main_category,
            'sub_category_id' => $request->sub_category,
            'subject_id' => $request->subject,
        ])->inRandomOrder()->limit($request->number_of_question)->get();

        return view('modeltest.custom.model_test', compact('questions', 'data'));
    }
}
