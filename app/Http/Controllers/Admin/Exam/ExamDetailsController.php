<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Models\Exam;
use App\Models\Passage;
use App\Models\Subject;
use App\Models\Question;
use App\Models\ExamDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ExamDetailsController extends Controller
{
    public function create()
    {

        $exams = Exam::doesnthave('examDetails')->select('id', 'name')->get();

        //dd($exams);
        return view('admin.exam.exam_details.add_subject', compact('exams'));
    }

    public function getSubject($id)
    {
        //dd($id);
        $exam = Exam::find($id);

        $subject = Subject::with('sub_category')->where('sub_category_id', $exam->sub_category_id)->get();

        if ($subject->count() > 0) {
            $data = [
                'exam' => $exam,
                'subject' => $subject,
            ];
            return response()->json($data);
        } else {
            $subject = Subject::with('main_category')->where(['sub_category_id' => 0, 'parent_id' => null])->get();
            $data = [
                'exam' => $exam,
                'subject' => $subject,
            ];
            return response()->json($data);
        }
    }

    public function store(Request $request)
    {
        //dd($request->all());
        //dd(count($request->number_of_question));
        $exam_detail = ExamDetail::where('exam_id', $request->exam_id)->whereIn('subject_id', $request->subject_id)->exists();
        //dd($exam_detail);
        if ($exam_detail) {
            return response()->json([
                'error' => true,
                'message' => 'This subject is already exists in this exam'
            ], 200);
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
        //dd($request->all());
        $exam_detail = ExamDetail::where(['exam_id' => $request->exam_id, 'subject_id' => $request->subject])->first();
        $passages = Passage::where('subject_id', $request->subject)->get();
        //dd($passages);
        $questions = Question::where('subject_id', $request->subject)->get();
        $view = view('admin.exam.exam_details.table_data', compact('questions', 'exam_detail', 'passages'))->render();
        return response()->json([
            'html' => $view
        ]);
    }

    public function addQuestion(Request $request)
    {
        //dd($request->all());
        $exam_detils = ExamDetail::where(['exam_id' => $request->exam_id, 'subject_id' => $request->subject_id])->first();
        // $data = [];
        // $val = collect($request->ids);
        // $val2 = $val->map(function ($passage_id, $question_id) {
        //     return [
        //         'passage_id' => $passage_id,
        //         'question_id' => $question_id
        //     ];
        // });
        //dd($val2->values()->toArray());

        // foreach ($request->ids as $id) {
        //     $data = [
        //         'question_id' => $id
        //     ];
        // }
        $exam_detils->question_ids = $request->ids;

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
