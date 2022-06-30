<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function create()
    {
        return view('resume.employment');
    }

    //employmentHistoryStore
    public function employmentHistoryStore(Request $request)
    {
        dd($request->all());
    }

}
