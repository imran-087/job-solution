<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamDetail;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamDetailsController extends Controller
{
    public function create()
    {
        $subjects = Subject::select('id', 'name')->where('parent_id', null)->get();
        $exams = Exam::select('id', 'name')->get();
        return view('admin.exam.exam_details.create', compact('exams', 'subjects'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $questions = Question::inRandomOrder()->limit($request->number_of_question)
            ->where('subject_id', $request->subject_id)
            ->select('id')->get();

        //dd($questions);

        $exam_detail = new ExamDetail();
        $exam_detail->exam_id = $request->exam_id;
        $exam_detail->subject_id = $request->subject_id;
        $exam_detail->number_of_question = $request->number_of_question;
        $exam_detail->question_ids = $questions;

        if ($exam_detail->save()) {
            return redirect()->back()->with('success', 'Created');
        } else {
            return redirect()->back()->with('error', 'Failed!');
        }
    }
}
