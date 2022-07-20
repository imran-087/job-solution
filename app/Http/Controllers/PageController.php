<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landingPage() 
    {
        $setting = Setting::first();
        return view('index', compact('setting'));

    }

    public function page($page)
    {
        $page = Page::where('slug', $page)->first();
        return view('page', compact('page'));
    }
}
