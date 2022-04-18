<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('subject')) {
            $subjects = Subject::where('parent_id', $request->id)->get();
        } else {
            $subjects = Subject::all();
        }
        return view('category.subject_index', compact('subjects'));
    }
}
