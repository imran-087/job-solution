<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    public function jobCategory(Request $request)
    {
        if($request->category)
        {
            $sub_categories = SubCategory::where('category_id', $request->category)->select('id', 'name')
                ->withCount('question')
                ->get();
            //dd($sub_categories);

            $subject_analytics = [];
            foreach ($sub_categories as $key => $sub_category) {

                $questions = Question::whereBelongsTo($sub_category)
                    ->select('id', 'subject_id', DB::raw('count(*) as total'))
                    ->groupBy('subject_id')->with(['subject' => function ($query) {
                        $query->select('id', 'name');
                    }])
                    ->get();
                $subject_analytics[$key] = $questions;
            }
            return view('jobs.sub_category', compact('sub_categories', 'subject_analytics'));   

        }else{

            $categories = Category::with('sub_categories')->where('main_category_id', '1')->get();
            return view('jobs.category', compact('categories'));
            
        }
        
    }
}
