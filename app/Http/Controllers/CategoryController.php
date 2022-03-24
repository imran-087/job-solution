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
