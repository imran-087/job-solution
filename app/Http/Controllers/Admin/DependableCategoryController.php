<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\Category;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DependableCategoryController extends Controller
{
    public function getCategory($id)
    {
        $category = Category::where(['main_category_id' => $id, 'status' => 'active'])->get();

        return response()->json($category);
    }

    public function getSubCategory($id)
    {

        $sub_category = SubCategory::where(['category_id' => $id, 'status' => 'active'])->get();

        return response()->json($sub_category);
    }

    public function getSubject($id)
    {
        $sub_category = SubCategory::find($id);

        $subject = Subject::with('sub_category', 'main_category')
            ->where(['sub_category_id' => $id, 'status' => 'active'])
            ->get();
        if ($subject->count() > 0) {
            return response()->json($subject);
        } else {
            if ($sub_category->category->main_category->id == 1) {
                $subject = Subject::with('main_category', 'parentsub')
                    ->where(['status' => 'active', 'main_category_id' => 1, 'sub_category_id' => 0])
                    ->get();
                //dd($subject);
                return response()->json($subject);
            } else {
                $subject = '';
                return response()->json($subject);
            }
        }
    }

    public function getParentSubject($parent_id)
    {
        //dd($parent_id);
        $subject = Subject::with('parentsub')->where('parent_id', $parent_id)->get();
        //dd($subject);

        return response()->json($subject);
    }

    public function getQuestion($subject_id)
    {

        $questions = Question::where('subject_id', $subject_id)->get();

        $view = view('admin.description.all_question', compact('questions'))->render();

        return response([
            'html' => $view
        ]);
        //dd($question);
    }
}
