<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landingPage() 
    {
        $setting = Setting::first();
        $categories = Category::where('main_category_id', 1)->get();
        return view('index', compact('setting', 'categories'));

    }

    public function page($page)
    {
        $page = Page::where('slug', $page)->first();
        return view('page', compact('page'));
    }
}
