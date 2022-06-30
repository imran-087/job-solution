<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotographController extends Controller
{
    public function create()
    {
        return view('resume.photograph');
    }

    // photographStore
    public function photographStore(Request $request)
    {
       dd($request->all());
    }
}
