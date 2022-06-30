<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function create()
    {
        return view('resume.education');
    }

    //academicSummaryStore
    public function academicSummaryStore(Request $request)
    {
        dd($request->all());
    }

    //trainingSummaryStore
    public function trainingSummaryStore(Request $request)
    {
        dd($request->all());
    }

    //professionalSummaryStore
    public function professionalSummaryStore(Request $request)
    {
        dd($request->all());
    }
}
