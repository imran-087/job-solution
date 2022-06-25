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

        $request->validate([
            'main_category' => 'required',
            'sub_category' => 'required',
            'subject' => 'required',
            'duration' => 'required | numeric',
            'total_mark' => 'required | numeric',
            //'exam_starting_time' => 'required',
            'number_of_question' => 'required | numeric | max:200'
        ]);
        // dd('pass');

        if ($request->cut_mark > $request->total_mark) {
            //dd('here');
            return redirect()->back()->withInput($request->all())->with('cut_mark', 'Cut Mark cannot be greater than total mark');
        } else {

            $data = $request->all();
            $questions = Question::where([
                'main_category_id' => $request->main_category,
                'sub_category_id' => $request->sub_category,
                'subject_id' => $request->subject,
            ])->inRandomOrder()->limit($request->number_of_question)->get();

            if ($request->number_of_question > $questions->count()) {
                return redirect()->back()->withInput($request->all())->with('insufficent_data', 'Insufficent Data !! Please, Reduce the number of Question');
            } else {
                return view('modeltest.custom.model_test', compact('questions', 'data'));
            }
        }
    }
}
