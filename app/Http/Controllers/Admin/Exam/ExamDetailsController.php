<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Models\Exam;
use App\Models\Passage;
use App\Models\Subject;
use App\Models\Question;
use App\Models\ExamDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
                'message' => 'Choosen subject is already exists in this exam'
            ], 200);
        } else {
            foreach ($request->subject_id as $key => $value) {

                // if ($request->subject_id[$key] == isset($request->subject_id[$key + 1])) {
                //     return response()->json([
                //         'error' => true,
                //         'message' => 'you cannot add same subject into a exam'
                //     ], 200);
                // } else {
                // $subject = [
                //     'subject_id' => $request->subject_id[$key]
                // ];
                // dump($subject);
                $exam_detail = new ExamDetail();
                $exam_detail->exam_id = $request->exam_id;
                $exam_detail->subject_id = $request->subject_id[$key];
                $exam_detail->number_of_question = $request->number_of_question[$key];
                $exam_detail->save();
                // }
            }
            return response()->json([
                'success' => true,
                'message' => 'Subject added into exam'
            ], 200);
        }
    }

    //add question page view with exams
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

        //if someone want random question
        if ($request->ques_type == 'random') {
            $this->randomQuestion($request->exam_id, $request->subject, $request->question_number);
        }

        // for select question
        else if ($request->ques_type == 'select') {
            $exam_detail = ExamDetail::where(['exam_id' => $request->exam_id, 'subject_id' => $request->subject])->first();
            $passages = Passage::where('subject_id', $request->subject)->get();
            //dd($passages);
            $questions = Question::where('subject_id', $request->subject)->get();
            $view = view('admin.exam.exam_details.table_data', compact('questions', 'exam_detail', 'passages'))->render();
            return response()->json([
                'html' => $view
            ]);
        }

        //for manual input
        else if ($request->ques_type == 'manual') {
            //dd($request->all());
            $subject_id = $request->subject;
            $exam_id = $request->exam_id;
            $number = $request->question_number;
            $type = $request->type;
            $option = $request->option;
            $view = view(
                'admin.exam.exam_details.manual_input_layout',
                compact('subject_id', 'exam_id', 'number', 'type', 'option')
            )->render();
            return response()->json([
                'html' => $view
            ]);
        }
    }

    public function addQuestion(Request $request)
    {
        //dd($request->all());
        $exam_detils = ExamDetail::where(['exam_id' => $request->exam_id, 'subject_id' => $request->subject_id])->first();

        $exam_detils->question_ids = $request->ids;

        if ($exam_detils->update()) {
            return response()->json([
                'success' => true,
                'message' => 'Question added to this subject'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'messae' => 'Failed'
            ]);
        }
    }

    //random question from esxisting questions table
    public function randomQuestion($exam_id, $subject_id, $question_number)
    {
        //dd('here');
        $questions = Question::where(['subject_id' => $subject_id, 'passage_id' => null])
            ->inRandomOrder()
            ->limit($question_number)
            ->select('id')
            ->get();

        //dd($questions);
        if ($questions->count() == $question_number) {
            $exam_detail = ExamDetail::where(['exam_id' => $exam_id, 'subject_id' => $subject_id])->first();
            //$allVall = [];
            $exam_detail->question_ids = $questions;
            if ($exam_detail->update()) {
                return response()->route([
                    'success' => true,
                    'message' => 'Random question added to this subject'
                ]);
            }
        }
    }

    //manual question store
    public function manualQuestionStore(Request $request)
    {
        //dd($request->all());
        //question option images
        if ($request->file('image') != null) {
            //dd('ok');
            foreach ($request->file('image') as $key => $file) {
                //dump($file);
                $name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                // dump($name);

                //destinationPath
                $path = public_path() . '/uploads/question-images/option-img/';

                //resize image
                $imgFile = Image::make($file->getRealPath());
                $imgFile->resize(75, 75, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . $name, 80);

                //$file->move($path, $name);

                $image_path = 'uploads/question-images/option-img/' . $name;
                $Imgdata[] = $image_path;
                //dump($Imgdata);
                $total_question = count($request->question);
                if ($total_question > 1) {
                    $chunk_image = array_chunk($Imgdata, ceil(count($Imgdata) / $total_question));
                    //dump($chunk_image);
                }
            }
        }

        //question image
        if ($request->file('question_image') != null) {
            //dd('ok');
            foreach ($request->file('question_image') as $key => $file) {
                //dump($file);
                $name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                //dump($name);

                //destinationPath
                $path = public_path() . '/uploads/question-images/';

                //resize image
                $imgFile = Image::make($file->getRealPath());
                $imgFile->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . $name, 80);

                //$file->move($path, $name);

                $image_path = 'uploads/question-images/' . $name;
                $ImgdataQues[] = $image_path;
                //dump($ImgdataQues);
            }
        }

        //save passage
        if ($request->type == 'passage') {
            $passage = new Passage();
            $passage->passage = $request->passage;
            $passage->title = $request->title;
            $passage->sub_category_id = $request->sub_category;
            $passage->subject_id = $request->subject;
            $passage->slug = Str::slug($request->title);
            $passage->created_user_id = Auth::guard('admin')->user()->id;
            $passage->save();
        }



        //question save
        foreach ($request->question as $key => $value) {
            if (\strlen($value) > 1) {
                if ($request->main_category == 3) {
                    $year = null;
                } else {
                    $year = $request->year;
                }
                //question save
                $question = new Question();
                $question->subject_id = $request->subject_id;
                $question->exam_id = $request->exam_id;
                $question->sub_category_id = $request->sub_category ?? null;
                $question->main_category_id = $request->main_category ?? null;
                $question->year_id = $year ?? null;
                $question->passage_id = $passage->id ?? null;
                $question->question_type = $request->type;
                $question->hard_level = 1;
                $question->mark = 1;
                $question->question = $request->question[$key];
                $question->future_editable = 1;
                $question->lock_status = 'unlock';
                $question->status = 1;
                $question->created_user_id = Auth::guard('admin')->user()->id;
                $question->slug = Str::slug($request->question[$key]);
                //dd('here');
                if ($question->save()) {
                    $question_option = new QuestionOption();

                    $question_option->question_id = $question->id;

                    $question_option->option_1 = $request->option_1[$key] ?? null;
                    $question_option->option_2 = $request->option_2[$key] ?? null;
                    $question_option->option_3 = $request->option_3[$key] ?? null;
                    $question_option->option_4 = $request->option_4[$key] ?? null;
                    $question_option->option_5 = $request->option_5[$key] ?? null;

                    $question_option->answer = $request->answer[$key];

                    if (isset($chunk_image)) {
                        $question_option->image_option =  $chunk_image[$key];
                    } else if (isset($Imgdata)) {
                        $question_option->image_option =  $Imgdata;
                    }

                    if (isset($ImgdataQues)) {
                        $question_option->image_question =  $ImgdataQues[$key] ?? null;
                    }

                    $question_option->save();
                }
            }
        }

        //now save question_id into exam_details table
        $questions = Question::latest()->take($request->number)->select('id')->get();
        $exam_detail = ExamDetail::where(['exam_id' => $request->exam_id, 'subject_id' => $request->subject_id])->first();
        //$allVall = [];
        $exam_detail->question_ids = $questions;
        if ($exam_detail->update()) {
            return response()->json([
                'success' => true,
                'message' => 'Question aded to this subject'
            ]);
        }
    }
}
