<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Category;
use App\Models\Question;
use App\Models\SubCategory;
use App\Models\MainCategory;
use App\Models\Year;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getSubCategory($main_category, $category)
    {

        $main_category = MainCategory::where('slug', $main_category)->first();
        $category = Category::where('slug', $category)->first();
        $sub_categories = SubCategory::where('category_id', $category->id)->paginate(10);

        return view('category.sub_category', compact('sub_categories', 'category', 'main_category'));
    }

    public function getSubjectWithAllQuestion($category, $sub_category)
    {
        //dump($category);
        //dump($sub_category);
        //dd('ok');
        $category = Category::where('slug', $category)->first();
        $sub_category = SubCategory::where('slug', $sub_category)->first();
        //dd($sub_category);
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

    public function getCategory($slug)
    {
        $main_category = MainCategory::where('slug', $slug)->first();
        $categories = Category::where('main_category_id', $main_category->id)->get();
        //dd($categories);
        return view('category.category_index', compact('categories', 'main_category'));
    }

    public function getSubCategoryByYear($year)
    {

        if ($year == 'all') {
            $sub_categories = SubCategory::paginate(10);
        } else {
            $year = Year::where('year', $year)->first();
            $sub_categories = SubCategory::where('year_id', $year->id)->paginate(10);
        }


        return view('category.year_index', compact('sub_categories', 'year'));
    }
}
