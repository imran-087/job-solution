<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;
use App\Models\Category;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() 
    {
        $setting = Setting::first();
        $main_categories = MainCategory::with('categories')->select('id', 'name')->get();
        $categories = Category::orderBy('created_at', 'desc')->select('id', 'name')->limit(10)->get();
        $pages = Page::all();
       
        return view('index2', compact('setting', 'main_categories', 'categories', 'pages'));

    }

    public function page($page)
    {
        $setting = Setting::first();
        $pages = Page::all();
        $page = Page::where('slug', $page)->first();
        return view('page', compact('page', 'setting', 'pages'));
    }

   
}
