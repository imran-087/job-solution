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
        $exams = Exam::select('id', 'name')->get();
        return view('admin.exam.exam_details.add_subject', compact('exams'));
    }

    public function getSubject($id)
    {
        $exam = Exam::find($id);

        $subject = Subject::with('sub_category')->where('sub_category_id', $exam->sub_category_id)->get();
        //dd($subject);
        return response()->json($subject);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        //dd(count($request->number_of_question));
        foreach ($request->subject_id as $key => $value) {
            $exam_detail = new ExamDetail();
            $exam_detail->exam_id = $request->exam_id;
            $exam_detail->subject_id = $request->subject_id[$key];
            $exam_detail->number_of_question = $request->number_of_question[$key];
            $exam_detail->save();
        }
        return redirect()->back()->with('success', 'Created');
    }

    public function question(Request $request)
    {
        $exams = Exam::select('id', 'name')->get();
        // $questions = Question::paginate(10);
        // if ($request->ajax()) {
        //     $view = view('admin.exam.exam_details.table_data', compact('questions'))->render();
        //     return response()->json([
        //         'html' => $view
        //     ]);
        // }
        return view('admin.exam.exam_details.add-question', compact('exams'));
    }

    public function examSubject($id)
    {
        $exam_detail = ExamDetail::with('subject')->where('exam_id', $id)->get();

        return response()->json($exam_detail);
    }

    public function getQuestion($id)
    {
        //dd($id);
        $questions = Question::where('subject_id', $id)->get();
        $view = view('admin.exam.exam_details.table_data', compact('questions'))->render();
        return response()->json([
            'html' => $view
        ]);
    }

    public function addQuestion(Request $request)
    {
        $exam_detils = ExamDetail::where(['exam_id' => $request->exam_id])->first();
        $data[] = $request->ids;
        $exam_detils->question_ids = $data;

        if ($exam_detils->update()) {
            return response()->json([
                'success' => true,
                'messae' => 'Question added to this subject'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'messae' => 'Question added to this subject'
            ]);
        }
    }
}
