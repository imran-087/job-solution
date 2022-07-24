<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $pages = Page::all();

        return view('faqs', compact('setting', 'pages'));
    }
}
