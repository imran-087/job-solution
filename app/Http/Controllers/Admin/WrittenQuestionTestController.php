<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WrittenQuestion;

class WrittenQuestionTestController extends Controller
{
    public function getCategory()
    {
        $data = Category::with('main_category')->get();
        return view('admin.test.index', compact('data'));
    }

    public function getSubCategory(Request $request)
    {
        //dd($request->all());
        if ($request->main_category == 1) {
            $sub_categories = SubCategory::where('category_id', $request->id)->select('id', 'name')->get();
            $subjects = Subject::where(['main_category_id' => 1, 'sub_category_id' => 0, 'parent_id' => null])->select('id', 'name')->get();
        } else {
            $sub_categories = SubCategory::with('subject')->where('category_id', $request->id)->select('id', 'name')->get();
            $subjects = null;
        }


        $view = view('admin.test.sub_category', compact('sub_categories', 'subjects'))->render();
        return response()->json([
            'success' => true,
            'html' => $view
        ]);
    }

    public function getQuestion(Request $request)
    {
        // dd('here');
        if ($request->ajax()) {
            //dd($request->all());
            $sub_category_id = 1;
            $parent_id = $request->id == '#' ? null : $request->id;


            $questions = WrittenQuestion::where(['parent_id' => $parent_id, 'sub_category_id' => $sub_category_id])->get();
            //dd($question);
            return view('admin.test.tree_view', compact('questions'));
        }
        return view('admin.test.tree');
    }
}
