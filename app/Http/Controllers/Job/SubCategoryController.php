<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $category = Category::where('id', $request->category)->select('id', 'name')->first();
        $sub_categories = SubCategory::where('category_id', $request->category)->select('id', 'name')->get();
        //dd($sub_categories);
        return view('job.job_subcategory', compact('category', 'sub_categories'));
    }
}
