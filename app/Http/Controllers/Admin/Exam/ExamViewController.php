<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Models\Exam;
use App\Models\Question;
use App\Models\ExamDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamViewController extends Controller
{
    public function show(Request $request)
    {
        $exam = Exam::find($request->exam_id);

        //dd($subject_id);
        if ($request->has('subject_id')) {
            $exam_details = ExamDetail::with('subject')
                ->where('exam_id', $request->exam_id)
                ->where('subject_id', $request->subject_id)
                ->get();
        } else {
            $exam_details = ExamDetail::with('subject')->where('exam_id', $request->exam_id)->get();
        }

        return view('admin.exam.show', compact('exam', 'exam_details'));
    }
}
