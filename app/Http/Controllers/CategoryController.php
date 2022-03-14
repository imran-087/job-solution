<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Category;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getSubCategory($category)
    {
        $category = Category::where('slug', $category)->first();
        $sub_categories = SubCategory::where('category_id', $category->id)->paginate(10);

        return view('category.sub_category', compact('sub_categories', 'category'));
    }

    public function getSubjectWithAllQuestion($category, $sub_category)
    {
        // dump($category);
        // dump($sub_category);
        // dd('ok');
        $category = Category::where('slug', $category)->first();
        $sub_category = SubCategory::where('slug', $sub_category)->first();
        $subjects = Subject::where('sub_category_id', $sub_category->id)->get();
        $questions = Question::where('sub_category_id', $sub_category->id)->paginate(5);

        return view('category.subject_and_question', compact(
            'questions',
            'sub_category',
            'subjects',
            'category'
        ));
    }

    public function getSubjectWiseQuestion($category, $sub_category, $subject)
    {
        //dump($category);
        //dump($sub_category);
        //dd('ok');
        $category = Category::where('slug', $category)->first();
        $sub_category = SubCategory::where('slug', $sub_category)->first();
        $subject = Subject::where('slug', $subject)->first();
        $subjects = Subject::where('sub_category_id', $sub_category->id)->get();
        //dd($subject->id);
        $questions = Question::where('subject_id', $subject->id)->paginate(5);

        return view('category.subject_and_question', compact('questions', 'sub_category', 'subjects', 'category'));
    }
}
