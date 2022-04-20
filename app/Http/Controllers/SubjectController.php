<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::whereIsRoot()->get();

        return view('subject.subject_index', compact('subjects'));
    }

    public function subjectDetails(Request $request, $id)
    {

        $subject = Subject::find($id);
        $subject_topics = Subject::where('parent_id', $id)->get();

        return view('subject._subjectdetails', compact('subject_topics', 'subject'));
    }

    // public function subjectCategoryDetails(Request $request)
    // {
    //     if ($request->has('subject')) {
    //         $subject_topics = Subject::with('question')->where('parent_id', $request->id)->get();
    //     }
    //     return view('subject._subcategory_details', compact('subject_topics'));
    // }
}
