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
        $data = [
            'exam' => $exam,
            'subject' => $subject,
        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        //dd(count($request->number_of_question));
        if (ExamDetail::where('exam_id', $request->exam_id)->whereIn('subject_id', $request->subject_id)->exists()) {
            return response()->json([
                'error' => true,
                'message' => 'This subject is already exists in this exam'
            ], 303);
        } else {
            foreach ($request->subject_id as $key => $value) {
                $exam_detail = new ExamDetail();
                $exam_detail->exam_id = $request->exam_id;
                $exam_detail->subject_id = $request->subject_id[$key];
                $exam_detail->number_of_question = $request->number_of_question[$key];
                $exam_detail->save();
            }
            return response()->json([
                'success' => true,
                'message' => 'Subject added into exam'
            ], 200);
        }
    }

    public function question(Request $request)
    {
        $exams = Exam::select('id', 'name')->get();

        return view('admin.exam.exam_details.add-question', compact('exams'));
    }

    public function examSubject($id)
    {

        $exam_detail = ExamDetail::with('subject')->where('exam_id', $id)->get();

        return response()->json($exam_detail);
    }

    public function getQuestion(Request $request)
    {
        // dd($request->all());
        $exam_detail = ExamDetail::where(['exam_id' => $request->exam_id, 'subject_id' => $request->subject])->first();
        $questions = Question::where('subject_id', $request->subject)->get();
        $view = view('admin.exam.exam_details.table_data', compact('questions', 'exam_detail'))->render();
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
                'messae' => 'Failed'
            ]);
        }
    }
}
