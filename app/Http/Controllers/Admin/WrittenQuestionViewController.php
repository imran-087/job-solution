<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\WrittenQuestion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Subject;

class WrittenQuestionViewController extends Controller
{
    public function index()
    {
        $data = Category::where('main_category_id', 1)->select('main_category_id', 'id', 'name')->get();
        return view('admin.written_ques.view.index', compact('data'));
    }

    public function getSubCategory(Request $request)
    {
        // dd($request->all());
        $sub_categories = SubCategory::where('category_id', $request->id)->select('id', 'name')->get();
        //dd($written_ques_subcat);

        $subject_analytics = [];
        foreach ($sub_categories as $key => $sub_category) {

            $questions = WrittenQuestion::whereBelongsTo($sub_category)
            ->select('id', 'subject_id')
            ->groupBy('subject_id')->with(['subject' => function ($query) {
                $query->select('id',
                    'name'
                );
            }])
            ->get();
            $subject_analytics[$key] = $questions;
        }
        // dump($subject_analytics);
        // dd('end');

    
        $view = view('admin.written_ques.view.sub_category', compact('sub_categories', 'subject_analytics'))->render();
        return response()->json([
            'success' => true,
            'html' => $view
        ]);
    }

    //Get Question with answer
    public function getQuestion(Request $request)
    {
        if ($request->has('sub_category')) {
            //dd('here');
            $detail_of_exam = SubCategory::find($request->sub_category);
            $subject = Subject::where('id', $request->subject)->value('name');
            $questions = WrittenQuestion::with(['answer', 'descriptions'])
            ->where(['sub_category_id' => $request->sub_category, 'subject_id' => $request->subject])->get()->toTree();
        }
        //dd($parent_instructions);
        return view('admin.written_ques.view.question_view', compact('questions', 'detail_of_exam', 'subject'));
    }
}
